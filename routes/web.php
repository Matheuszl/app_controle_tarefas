<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MensagemTesteMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//rota responsavel pela verificação do email
//no momento da criação de uma nova conta, ela dispara um mail de confirmação
Auth::routes(['verify' => true]); 


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']) //rota principal 
    ->name('home')
    ->middleware('verified'); //adicionamos um middleware para as rotas

Route::resource('tarefa', App\Http\Controllers\TarefaController::class)
    ->middleware('verified');

Route::get('/mensagem-teste', function() { //rota de envio de email promocional
    // return new MensagemTesteMail();
    Mail::to('matheus.zzalamena@gmail.com')->send(new MensagemTesteMail());
    return 'Email enviado ao destinatario com sucesso';
});
