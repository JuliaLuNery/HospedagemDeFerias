<?php

namespace App\Http\Controllers;

use App\Models\BensLocaveis;
use App\Repository\BensLocaveisRepository;
use Illuminate\Http\Request;

class BensLocaveisController extends Controller
{

  protected $bensLocaveis;


    public function __construct()
    {
        $this->bensLocaveis = new BensLocaveisRepository();
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
    public function show(BensLocaveis $bensLocaveis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BensLocaveis $bensLocaveis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BensLocaveis $bensLocaveis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BensLocaveis $bensLocaveis)
    {
        //
    }
}
