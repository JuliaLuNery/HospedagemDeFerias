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
    $local = $request->input('local');

        //Barra de Pesquisa
        $procurar = $request->input('search');
        $filtro = Localizacao::with('pesquisar')
                     ->when($procurar, function($query) use ($procurar) {
                         $query->where('id', 'like', "%{$procurar}%")
                         ->orWhere('preco_diario', 'like', "%{$procurar}%")
                         ->orWhere('numero_hospedes', 'like', "%{$procurar}%")
                         //Para outra tabela: orWhereHas
                               ->orWhereHas('pesquisar', function($query) use ($procurar) {
                                   $query->where('data_inicio', 'like', "%{$procurar}%");
                                   $query->orWhere('data_fim', 'like', "%{$procurar}%");
                               });
                     })
                    //  ->paginate(10);


        // $fatura=Fatura::with('cliente')-> paginate(30);
        return view ('site.index',compact('bem_locavel'));

}




}
