<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\UsuariosController;

Route::get('/', function () {
    return view('welcome');
});


//-------------------------------------------
// Aluno
//-------------------------------------------

Route::get('/select', [AlunoController::class, 'select'])
->name('select'); // nome da rota

Route::get('/insert', [AlunoController::class, 'insert'])
->name('insert'); // nome da rota

Route::get('/update', [AlunoController::class, 'update'])
->name('update'); // nome da rota

Route::get('/delete', [AlunoController::class, 'delete'])
->name('delete'); // nome da rota

Route::get('/sql', [AlunoController::class, 'sql'])
->name('sql'); // nome da rota




//-------------------------------------------
// Usuários
//-------------------------------------------



// Route::    -> Chama a classe responsável por gerir as rotas da aplicação.
// get(...)   -> Define que esta rota responde apenas a requisições do tipo GET (visualização).
// "/usuario-form" -> É o endereço (URL) que o utilizador digita no navegador.

// [UsuariosController::class, 'usuarioForm'] 
//            -> Indica ao Laravel: "Vai à classe UsuariosController e executa a função usuarioForm".
Route::get("/usuario-form", [UsuariosController::class, 'usuarioForm'])
->name("usuario-form");
// ->name("usuario-form") 

Route::post("/usuario-form-submit", [UsuariosController::class, 'usuarioFormSubmit'])
->name("usuario-form-submit");

Route::get("/usuario-lista", [UsuariosController::class, 'usuarioLista'])
->name("usuario-lista");


Route::get("/usuario-edit/{id}", [UsuariosController::class, 'usuarioEdit'])
->name("usuario-edit");


Route::post("/usuario-edit-submit", [UsuariosController::class, 'usuarioEditSubmit'])
->name("usuario-edit-submit");

Route::get("/usuario-delete/{id}",[UsuariosController::class,'usuarioDelete'])->name("usuario-delete");


Route::get("/usuario-delete-submit/{id}",[UsuariosController::class,'usuarioDeleteSubmit'])->name("usuario-delete-submit");


Route::get('/index', function () {
    return view ('welcome');
});