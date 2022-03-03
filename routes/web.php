<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MensagemTesteMail;
use App\Mail\NovoCliente;
use App\Http\Middleware\LogAcessoMiddleware;

use App\Jobs\jobNovoCliente;

//Rota default
Route::get('/', function () {
    return view('welcome');
});

//rota responsavel pela verificação do email
//no momento da criação de uma nova conta, ela dispara um mail de confirmação
Auth::routes(['verify' => true]);


//rota xlsx/csv
Route::get('tarefa/exportacao/{extensao}', 'App\Http\Controllers\TarefaController@exportacao')
    ->name('tarefa.exportacao');

//rota podf
Route::get('tarefa/exportar', 'App\Http\Controllers\TarefaController@exportar')
    ->name('tarefa.exportar');

//rotas das tarefas
Route::resource('tarefa', App\Http\Controllers\TarefaController::class)
    ->middleware('verified');

//rotas das fornecedores
Route::resource('fornecedor', App\Http\Controllers\FornecedorController::class)
    ->middleware('verified');

//rotas das  clientes
Route::resource('cliente', App\Http\Controllers\ClienteController::class)
    ->middleware('verified');

//rota do usuario
Route::resource('user', App\Http\Controllers\UserController::class)
    ->middleware('verified');


//Rota de callback/contingencial evita que o usuario acesse uma pagina com erro 404 ba tela
Route::fallback(function () {
    return 'Ola visitante, a pagina que esta tentntando acessarl não existe! Se quiser, entre na nossa <a href="/">Pagina Inicial:</a>';
});


//Rota -> dispara um Job -> Facede de Email
//Dispara um email para um cliente recem cadastrado no sistema
Route::get('/envio-email-novo-cliente/{nome}/teste/{email}', function($nome, $email) {
    jobNovoCliente::dispatch($nome, $email);
});





// Route::get('/mensagem-teste', function() { //rota de envio de email promocional
//     // return new MensagemTesteMail();
//     for ($i=0; $i < 15; $i++) { 
//         Mail::to('matheus.zzalamena@gmail.com')->send(new MensagemTesteMail());
//     }
//     return 'Email enviado ao destinatario com sucesso';
// });

// Route::get('/dashboardadmin', function () {
//     return view('dashboard-admin.dashboard-admin'); 
// });
