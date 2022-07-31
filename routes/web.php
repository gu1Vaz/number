<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/','App\Http\Controllers\NumerosController@index');

Route::get('/sobre', function () {
    return view('Sobre.sobre');
});


Route::get('gerarListaTelefonica', 'App\Http\Controllers\NumerosController@gerarListaTelefonica');
Route::get('verNumero/{idNumero}', 'App\Http\Controllers\NumerosController@verNumero');
Route::get('/meuPerfil', 'App\Http\Controllers\HomeController@meuPerfil');

Route::resource('numero','App\Http\Controllers\NumerosController');
Route::resource('favorito','App\Http\Controllers\FavoritoController');
Route::resource('ajuda','App\Http\Controllers\AjudaController');
Route::resource('feedback','App\Http\Controllers\FeedBackController');
Route::resource('busca','App\Http\Controllers\BuscaController');

