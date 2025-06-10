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
    public function create($id)
    {

        $bem = BensLocaveis::with('localizacao', 'marca')->findOrFail($id);
        return view('reservas.create', compact('bem'));

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

        Reservas::create([
            'user_id' => User::id(),
            'bem_locavel_id' => $request->bem_locavel_id,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
            'preco_total' => $request->preco_total,
            'status' => 'pendente',
        ]);

        return redirect()->route('dashboard')->with('success', 'Reserva criada com sucesso!');


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
