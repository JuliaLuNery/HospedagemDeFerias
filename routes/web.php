<?php

use App\Http\Controllers\BensLocaveisController;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/reserva/{id}', [ReservasController::class, 'create'])->name('reserva.create');
    Route::post('/reserva', [ReservasController::class, 'store'])->name('reserva.store');
});

Route::get('/', function () {
    return view('site.index');
})->name('site.index');


Route::post('/enviar-mail', [MailController::class, 'sendReservationEmail'])
    ->middleware('auth')
    ->name('send.email');

/*Route::get('/home', function () {
    return view('site.index');
});*/

Route::get('/home', [BensLocaveisController::class, 'getadquirirInformacao'])->name('site');
// Route::get('/home', [BensLocaveisController::class, 'getadquirirInformacao'])->name('modelo_bem');

Route::get('/login', function () {
    return view('login.index');
});

Route::get('/pesquisar', [FiltroController::class, 'pesquisa'])->name('pesquisar');



require __DIR__ . '/auth.php';
