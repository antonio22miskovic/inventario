<?php

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/info', 'HomeController@Info')->name('info');
Route::get('/filtro/{filtro}', 'HomeController@filtro')->name('filtro');
Route::get('/select', 'HomeController@select')->name('select');
Route::resource('user', 'UserController');
Route::resource('planta', 'PlantaController');
Route::resource('categoria', 'CategoriaController');
Route::resource('equipo', 'EquipoController');
Route::resource('departamento', 'DepartamentoController');
Route::get('equipo/listado/{depa?}','EquipoController@index');

