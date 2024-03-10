<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TestamentoController;
use \App\Http\Controllers\LivroController;
use \App\Http\Controllers\VersiculoController;
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
//Route::apiResource('versiculo', VersiculoController::class);
//Route::apiResource('livro', LivroController::class);
//Route::apiResource('testamento', TestamentoController::class);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResources([
        'versiculo' => VersiculoController::class,
        'livro' => LivroController::class,
        'testamento' => TestamentoController::class
    ]);
    Route::get('/versiculos/{livroId}/{capituloId}', [VersiculoController::class, 'showCapituloVersiculo']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

