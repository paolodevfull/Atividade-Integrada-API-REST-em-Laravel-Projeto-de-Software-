<?php

use App\Models\Music;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function (Request $request) {
    Log::info("Meu dado");
    return "Hello World";
});

Route::get('/home', function (Request $request) {
    return view('home', ['nome' => "renato"]);
});

Route::get("/users", function (Request $request) {
    $users = User::all(); 

    return $users;
});


Route::get("/create-test-music", function (Request $request) {
    Music::create([
        'name' => "Delírios",
        "album" => 'Baile',
        'artista' => 'FBC',
    ]);
});

Route::get("/musics", function (Request $request) {
    $musics = Music::all();
    return $musics;
});