<?php

use App\Http\Controllers\BensLocaveisController;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/reserva/create', [ReservasController::class, 'create'])->name('reserva.create');
    Route::post('/reserva/store', [ReservasController::class, 'store'])->name('reserva.store');
});


Route::get('/pagamento/{reserva_id}', [PagamentoController::class, 'processar'])->name('pagamento.processar');
Route::post('/pagamento/sucesso/{reserva_id}', [PagamentoController::class, 'sucesso'])->name('pagamento.sucesso');
Route::post('/pagamento/cancelado/{reserva_id}', [PagamentoController::class, 'cancelar'])->name('pagamento.cancelado');

Route::post('/pagamento/confirmar', [PagamentoController::class, 'confirmarPagamento'])->name('pagamento.confirmar');

Route::post('/pagamento/confirmar/{reserva_id}', [PagamentoController::class, 'confirmar'])
    ->middleware('auth')
    ->name('pagamento.confirmar');

Route::get('/minhas-reservas', [ReservasController::class, 'minhasReservas'])
    ->middleware('auth')
    ->name('reservas.minhas');

Route::get('/reserva/{id}', [ReservasController::class, 'detalhe'])->name('reserva.detalhe');


Route::get('/reservas/{reserva}/download', [ReservasController::class, 'download'])->name('reserva.download');
Route::post('/reservas/{reserva}/enviar-email', [ReservasController::class, 'enviarEmail'])->name('reserva.email');



Route::post('/enviar-mail', [MailController::class, 'sendReservationEmail'])
    ->middleware('auth')
    ->name('send.email');

/*Route::get('/home', function () {
    return view('site.index');
});*/

Route::get('/', [BensLocaveisController::class, 'getadquirirInformacao'])->name('site');


// Route::get('/home', [BensLocaveisController::class, 'getadquirirInformacao'])->name('modelo_bem');

// Route::get('/login', function () {
//     return view('login.index');
// });

Route::get('/pesquisar', [FiltroController::class, 'pesquisa'])->name('pesquisar');



require __DIR__ . '/auth.php';
