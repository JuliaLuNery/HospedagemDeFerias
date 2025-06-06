<?php

namespace App\Http\Controllers;

use App\Models\Localizacao;
use Illuminate\Http\Request;

class FiltroController extends Controller
{

public function pesquisa(Request $request) {

        $data_inicio = $request->input('data_inicio');
        $data_fim = $request->input('data_fim');
        $hospedes = $request->input('hospedes');
        $procurar = $request->input('search');

        $query = Localizacao::with(['bemLocavel.reservas']);

        // Filtro por texto (preço ou nº hóspedes) nos bens
        if ($procurar) {
            $query->whereHas('bemLocavel', function ($pes) use ($procurar) {
                $pes->where('preco_diario', 'like', "%{$procurar}%")
                  ->orWhere('numero_hospedes', 'like', "%{$procurar}%");
            });
        }

        // Filtro por nº de hóspedes
        if ($hospedes) {
            $query->whereHas('bemLocavel', function ($pes) use ($hospedes) {
                $pes->where('numero_hospedes', '>=', $hospedes);
            });
        }

        // Filtro por datas de reserva disponíveis
        if ($data_inicio && $data_fim) {
            $query->whereHas('bemLocavel.reservas', function ($pes) use ($data_inicio, $data_fim) {
                $pes->where(function ($reserva) use ($data_inicio, $data_fim) {
                    $reserva->where('data_inicio', '>', $data_fim)
                            ->orWhere('data_fim', '<', $data_inicio);
                });
            });
        }

        $bem_locavel = $query->get();

        return view('site.index', compact('bem_locavel'));
    }

}


