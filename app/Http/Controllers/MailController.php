<?php

namespace App\Http\Controllers;

use App\Mail\Mail as MailMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
        public function sendReservationEmail(Request $request)
    {
        $user = Auth::user();

        //recuperar o nome e o email do utilizador logado
        $clientName = $user->name;
        $email = $user->email;

        //pegar o que foi informado no campo do input
        $local = $request->input('pickup');  // 'Loja Central';

        //enviar o email
        Mail::to($email)
            ->send(new MailMail($clientName, $local));

        //retorna a página anterior (back) com a mensagem
        return back()->with('success', 'E-mail enviado com sucesso!');
    }
}
