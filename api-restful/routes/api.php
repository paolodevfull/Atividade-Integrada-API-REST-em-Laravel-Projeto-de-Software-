<?php

use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\MusicApiController;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function (Request $request) {
    return "Olá mundo!";
});

Route::get('/musics', [MusicApiController::class, 'index'] );
Route::post('/musics', [MusicApiController::class, 'store'] );



Route::put('/musics/{id}', [MusicApiController::class, 'update'] );

Route::delete('/musics/{id}', [MusicApiController::class, 'destroy'] );

// Rotas do Estoque (Moisés) — gera automaticamente index, store, show, update e destroy
Route::apiResource('estoques', EstoqueController::class);
