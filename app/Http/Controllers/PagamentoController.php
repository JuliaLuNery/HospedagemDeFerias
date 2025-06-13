<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\Reservas;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{

public function processar(Request $request)
{
    $reserva = Reservas::findOrFail($request->reserva_id);

    switch ($reserva->forma_pagamento) {
        case 'paypal':
            return redirect()->route('pagamento.sucesso', ['reserva_id' => $reserva->id]);
        case 'cartao':
            return redirect()->route('pagamento.sucesso', ['reserva_id' => $reserva->id]);
        case 'multibanco':
            return view('pagamento.mb-pagamento', ['reserva' => $reserva]);
    }
}


    // public function processar(Request $r)
    // {
    //     $data = $r->all();
    //     switch($data['forma_pagamento']) {
    //         case 'paypal':
    //             return redirect()->route('pagamento.sucesso'); // temporário
    //         case 'cartao':

    //             return redirect()->route('pagamento.sucesso');
    //         case 'multibanco':

    //             return redirect()->route('pagamento.sucesso');
    //     }
    // }

    public function sucesso(Request $request)
    {
    $reserva = Reservas::findOrFail($request->reserva_id);
    $reserva->estado = 'paga';
    $reserva->save();

    return view('pagamento.sucesso', ['reserva' => $reserva]);
    }


    public function cancelar(Request $request)
    {
    $reserva = Reservas::findOrFail($request->reserva_id);
    $reserva->estado = 'cancelada';
    $reserva->save();

    return view('pagamento.cancelado', ['reserva' => $reserva]);
    }



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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pagamento $pagamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pagamento $pagamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pagamento $pagamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pagamento $pagamento)
    {
        //
    }
}
