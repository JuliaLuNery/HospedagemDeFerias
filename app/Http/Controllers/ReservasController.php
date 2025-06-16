<?php

namespace App\Http\Controllers;

use App\Mail\Mail;
use App\Models\BensLocaveis;
use App\Models\Reservas;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;

class ReservasController extends Controller
{


    public function minhasReservas()
    {
        $usuario = auth()->user();

        $reservas = \App\Models\Reservas::where('user_id', $usuario->id)
            ->with(['bemLocavel', 'bemLocavel.localizacao', 'bemLocavel.marca'])
            ->orderByDesc('created_at')
            ->get();

        return view('reservas.minhas', compact('reservas'));
    }


    public function detalhe($id)
    {
        $reserva = \App\Models\Reservas::with(['bemLocavel', 'bemLocavel.localizacao', 'bemLocavel.marca'])
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('reservas.detalhe', compact('reserva'));
    }

    public function download(Reservas $reserva)
    {

        $pdf = Pdf::loadView('reservas.pdf', ['reserva' => $reserva]);
        return $pdf->download('reserva_' . $reserva->id . '.pdf');
    }

    public function enviarEmail(Request $request, Reservas $reserva)
    {
        $user = Auth::user();

        Mail::to($user->email)->send(new FacadesMail($user->name, $reserva->bemLocavel->localizacao->cidade, $reserva->preco_total, $reserva->data_inicio, $reserva->data_fim ?? 'Não Informado'));

        return back()->with('success', 'E-mail enviado com sucesso!');
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
    public function create(Request $request)
    {

        $bem_locavel_id = $request->input('bem_locavel_id');
        $data_inicio = Carbon::parse($request->input('data_inicio'));
        $data_fim = Carbon::parse($request->input('data_fim'));
        $dias = $data_inicio->diffInDays($data_fim);
        $preco_diario = floatval($request->input('preco_diario'));
        $preco_total = $dias * $preco_diario;
        $taxa_fixa = 10;
        $preco_com_taxa = $preco_total + $taxa_fixa;

        $dados = [
            //  'bem_locavel_id' => $bem_locavel_id,
            'bem_locavel_id' => $request->input('bem_locavel_id'),
            'imagem' => $request->input('imagem'),
            'modelo' => $request->input('modelo'),
            'cidade' => $request->input('cidade'),
            'filial' => $request->input('filial'),
            'quartos' => $request->input('quartos'),
            'hospedes' => $request->input('hospedes'),
            'banheiros' => $request->input('banheiros'),
            'camas' => $request->input('camas'),
            'preco_diario' => $preco_diario,
            'data_inicio' => $data_inicio->format('Y-m-d'),
            'data_fim' => $data_fim->format('Y-m-d'),
            'dias' => $dias,
            'preco_total' => $preco_total,
            'preco_com_taxa' => $preco_com_taxa,
        ];

        return view('reservas.create', compact('dados'));
    }



    // -------------------------------------------------------------------------------------


    // $bem = BensLocaveis::with('localizacao', 'marca')->findOrFail($id);
    // return view('reservas.create', compact('bem'));

    //     $data_inicio = $r->input('data_inicio') ?? \Carbon\Carbon::now();
    //     $data_fim = $r->input('data_fim') ?? \Carbon\Carbon::now()->addDays(1);
    //     $imagem = $r->input('imagem');
    //     $modelo = $r->input('modelo');
    //     $cidade = $r->input('cidade');
    //     $filial = $r->input('filial');
    //     $quartos = $r->input('quartos');
    //     $hospedes = $r->input('hospedes');
    //     $banheiros = $r->input('banheiros');
    //     $camas = $r->input('camas');
    //     $preco_diario = $r->input('preco_diario');
    //     // Captura dados do modal via query strings

    //     // Calcula dias
    //   // $inicio = \Carbon\Carbon::parse($dados['data_inicio']) ?? \Carbon\Carbon::now();
    //   //  $fim = \Carbon\Carbon::parse($dados['data_fim']) ?? \Carbon\Carbon::now()->addDays(1);
    //     $dias = $data_fim->diffInDays($data_inicio);
    //     $dados['dias'] = $dias;
    //     $preco_total = $dias * $preco_diario;

    //     $dados = ([ $data_inicio, $data_fim, $imagem, $modelo, $cidade, $filial, $quartos, $hospedes, $banheiros, $camas, $dias, $preco_total]);

    //     return view('reservas.create', ['dados' => $dados]);
    // }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'data_inicio' => 'required|date|after_or_equal:today',
            'data_fim' => 'required|date|after:data_inicio',
            'preco_total' => 'required|numeric',
            'forma_pagamento' => 'required|in:multibanco,cartao,paypal',
        ]);

        $reserva = Reservas::create([
            'user_id' => Auth::id(),
            'bem_locavel_id' => $request->input('bem_locavel_id'),
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
            'preco_total' => $request->preco_total + 10, // acrescenta a taxa fixa de 10
            'status' => 'pendente',
        ]);

        return redirect()->route('pagamento.processar', ['reserva_id' => $reserva->id]);



        // ---------------------------------------------------------------

        // $request->validate([
        //     'data_inicio' => 'required|date|after_or_equal:today',
        //     'data_fim' => 'required|date|after:data_inicio',
        //     'bem_locavel_id' => 'required|exists:bens_locaveis,id',
        //     'preco_total' => 'required|numeric',
        // ]);

        // $reserva = Reservas::create([
        //     'user_id' => User::id(),
        //     'bem_locavel_id' => $request->bem_locavel_id,
        //     'data_inicio' => $request->data_inicio,
        //     'data_fim' => $request->data_fim,
        //     'preco_total' => $request->preco_total,
        //     'status' => 'pendente',
        // ]);

        // // return redirect()->route('dashboard')->with('success', 'Reserva criada com sucesso!');

        // // Validação
        // $request->validate([
        //     'modelo' => 'required',
        //     'data_inicio' => 'required|date',
        //     'data_fim' => 'required|date|after:data_inicio',
        //     'forma_pagamento' => 'required|in:multibanco,cartao,paypal',
        // ]);

        // // Redireciona para pagamento com ID da reserva
        // return redirect()->route('pagamento.processar', ['reserva_id' => $reserva->id]);

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
