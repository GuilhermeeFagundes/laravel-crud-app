<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

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