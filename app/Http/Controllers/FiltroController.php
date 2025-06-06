<?php

namespace App\Http\Controllers;

use App\Models\BensLocaveis;
use App\Models\Localizacao;
use Illuminate\Http\Request;

class FiltroController extends Controller
{

public function pesquisa(Request $request) {

        $data_inicio = $request->input('data_inicio');
        $data_fim = $request->input('data_fim');
        $hospedes = $request->input('hospedes');
        $local = $request->input('local');

        $query = Localizacao::with('bemLocavel')
    ->whereHas('bemLocavel', function ($q) use ($hospedes) {
        if ($hospedes) {
            $q->where('numero_hospedes', '>=', $hospedes);
        }
    });

// Filtrar por local (cidade/filial, se necessário)
if ($local) {
    $query->where(function ($q) use ($local) {
        $q->where('cidade', 'like', "%{$local}%")
          ->orWhere('filial', 'like', "%{$local}%");
    });
}

// Eliminar apartamentos com reservas conflitantes
if ($data_inicio && $data_fim) {
    $query->whereDoesntHave('bemLocavel.reservas', function ($q) use ($data_inicio, $data_fim) {
        $q->where(function ($reserva) use ($data_inicio, $data_fim) {
            $reserva->where('data_inicio', '<=', $data_fim)
                    ->where('data_fim', '>=', $data_inicio);
        });
    });
}

$bem_locavel = BensLocaveis::with('localizacao')->get();
// $bem_locavel = Localizacao::with('bemLocavel')->get();


return view('site.index', compact('bem_locavel'));
    }

}

