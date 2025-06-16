<?php

namespace App\Http\Controllers;

use App\Models\BensLocaveis;
use App\Models\Localizacao;
use Illuminate\Http\Request;

class FiltroController extends Controller
{

    public function pesquisa(Request $request)
    {

        $data_inicio = $request->input('data_inicio');
        $data_fim = $request->input('data_fim');
        $hospedes = $request->input('hospedes');
        $local = $request->input('local');

        $query = BensLocaveis::with('localizacao')
            ->whereHas('localizacao', function ($q) use ($local) {
                if ($local) {
                    $q->where('cidade', 'like', "%{$local}%")
                        ->orWhere('filial', 'like', "%{$local}%");
                }
            });

        if ($hospedes) {
            $query->where('numero_hospedes', '>=', $hospedes);
        }

        // Eliminar apartamentos com reservas conflitantes
        if ($data_inicio && $data_fim) {
            $query->whereDoesntHave('reservas', function ($q) use ($data_inicio, $data_fim) {
                $q->where(function ($reserva) use ($data_inicio, $data_fim) {
                    $reserva->where('data_inicio', '<=', $data_fim)
                        ->where('data_fim', '>=', $data_inicio);
                });
            });
        }

        $bem_locavel = $query->get();

        return view('site.index', compact('bem_locavel'));
    }



    // $data_inicio = $request->input('data_inicio');
    // $data_fim = $request->input('data_fim');
    // $hospedes = $request->input('hospedes');
    // $local = $request->input('local');

    // //-----------------------------------------------

    // // $bem_locavel = BensLocaveis::where('numero_hospedes', '>=', $hospedes)
    // //     ->whereHas('localizacao', function ($query) use ($local) {
    // //         $query->where('cidade', $local)
    // //               ->orWhere('filial', $local);
    // //     })
    // //     ->whereDoesntHave('reservas', function ($query) use ($data_inicio, $data_fim) {
    // //         $query->where(function ($reserva) use ($data_inicio, $data_fim) {
    // //             $reserva->where('data_inicio', '<=', $data_fim)
    // //                     ->where('data_fim', '>=', $data_inicio);
    // //         });
    // //     })
    // //     ->with('localizacao') // Se quiser levar a localização junto
    // //     ->get();



    // // $query = Localizacao::with('bemLocavel')
    // //     ->whereHas('bemLocavel', function ($q) use ($hospedes) {
    // //         if ($hospedes) {
    // //             $q->where('numero_hospedes', '>=', $hospedes);
    // //         }
    // //     });

    // // // Filtrar por local (cidade/filial, se necessário)
    // // if ($local) {
    // //     $query->where(function ($q) use ($local) {
    // //         $q->where('cidade', 'like', "%{$local}%")
    // //             ->orWhere('filial', 'like', "%{$local}%");
    // //     });
    // // }

    // //-----------------------------------------------

    // $query = BensLocaveis::with('localizacao')
    //     ->where(function ($q) use ($hospedes) {
    //         if ($hospedes) {
    //             $q->where('numero_hospedes', '>=', $hospedes);
    //         }
    //     })
    //     ->whereHas('localizacao', function ($q) use ($local) {
    //         if ($local) {
    //             $q->where('cidade', 'like', "%{$local}%")
    //                 ->orWhere('filial', 'like', "%{$local}%");
    //         }
    //     });

    // $bem_locavel = $query->get();

    // return view('site.index', compact('bem_locavel'));


    // // Eliminar apartamentos com reservas conflitantes
    // if ($data_inicio && $data_fim) {
    //     $query->whereDoesntHave('bemLocavel.reservas', function ($q) use ($data_inicio, $data_fim) {
    //         $q->where(function ($reserva) use ($data_inicio, $data_fim) {
    //             $reserva->where('data_inicio', '<=', $data_fim)
    //                 ->where('data_fim', '>=', $data_inicio);
    //         });
    //     });
    // }

    // $filtro = $query->get();
    // //-----------------------------------------------
    // // $bem_locavel = $filtro->flatMap->bemLocavel;
    // // $bem_locavel = BensLocaveis::with('localizacao')->get();
    // // $bem_locavel = Localizacao::with('bemLocavel')->get();

    // // Filtra os BensLocaveis a partir das localizações encontradas
    // //-----------------------------------------------
    // $bem_locavel = $filtro->flatMap(function ($localizacao) {
    //     return $localizacao->bemLocavel->map(function ($bem) use ($localizacao) {
    //         $bem->local = $localizacao; // associa manualmente a localização
    //         return $bem;
    //     });
    // });

    // return view('site.index', compact('bem_locavel'));
}
