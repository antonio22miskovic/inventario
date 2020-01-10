<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/info', 'HomeController@Info')->name('info');
Route::resource('user', 'UserController');
Route::resource('planta', 'PlantaController');
Route::resource('categoria', 'CategoriaController');
Route::resource('equipo', 'EquipoController');

