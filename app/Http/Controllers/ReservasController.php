<?php

namespace App\Http\Controllers;

use App\Models\BensLocaveis;
use App\Models\Reservas;
use App\Models\User;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $r)
    {

        // $bem = BensLocaveis::with('localizacao', 'marca')->findOrFail($id);
        // return view('reservas.create', compact('bem'));

        $data_inicio = $r->input('data_inicio') ?? \Carbon\Carbon::now();
        $data_fim = $r->input('data_fim') ?? \Carbon\Carbon::now()->addDays(1);
        $imagem = $r->input('imagem');
        $modelo = $r->input('modelo');
        $cidade = $r->input('cidade');
        $filial = $r->input('filial');
        $quartos = $r->input('quartos');
        $hospedes = $r->input('hospedes');
        $banheiros = $r->input('banheiros');
        $camas = $r->input('camas');
        $preco_diario = $r->input('preco_diario');
        // Captura dados do modal via query strings

        // Calcula dias
      // $inicio = \Carbon\Carbon::parse($dados['data_inicio']) ?? \Carbon\Carbon::now();
      //  $fim = \Carbon\Carbon::parse($dados['data_fim']) ?? \Carbon\Carbon::now()->addDays(1);
        $dias = $data_fim->diffInDays($data_inicio);
        $dados['dias'] = $dias;
        $preco_total = $dias * $preco_diario;

        $dados = ([ $data_inicio, $data_fim, $imagem, $modelo, $cidade, $filial, $quartos, $hospedes, $banheiros, $camas, $preco_total]);
    //    'modelo', 'cidade', 'filial', 'quartos', 'hospedes', 'banheiros', 'camas', 'preco_diario', 'data_inicio', 'data_fim']);


        return view('reservas.create', ['dados' => $dados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'data_inicio' => 'required|date|after_or_equal:today',
            'data_fim' => 'required|date|after:data_inicio',
            'bem_locavel_id' => 'required|exists:bens_locaveis,id',
            'preco_total' => 'required|numeric',
        ]);

        $reserva = Reservas::create([
            'user_id' => User::id(),
            'bem_locavel_id' => $request->bem_locavel_id,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
            'preco_total' => $request->preco_total,
            'status' => 'pendente',
        ]);

        // return redirect()->route('dashboard')->with('success', 'Reserva criada com sucesso!');

        // Validação
        $request->validate([
            'modelo' => 'required',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
            'forma_pagamento' => 'required|in:multibanco,cartao,paypal',
        ]);

        // Redireciona para pagamento com ID da reserva
        return redirect()->route('pagamento.processar', ['reserva_id' => $reserva->id]);

        // // Aqui você gravaria no banco...

        // return redirect()->route('pagamento.processar')->with($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservas $reservas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservas $reservas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservas $reservas)
    {
        //
    }
}
