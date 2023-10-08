<?php

use App\Http\Controllers\GestaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('management', [GestaoController::class, 'gestao']);

Route::post('management/update', [GestaoController::class, 'gestaoUpdate']);

Route::delete('management/delete/{id}', [GestaoController::class, 'gestaoDelete']);

Route::get('management/find/{id}', [GestaoController::class, 'gestaoId']);

Route::post('management/find/title', [GestaoController::class, 'gestaoTitulo']);