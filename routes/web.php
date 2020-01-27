<?php

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/info', 'HomeController@Info');
Route::get('/filtro/{filtro}', 'HomeController@filtro');
Route::get('/select/categoria', 'HomeController@selectcategoria');
Route::get('/select', 'HomeController@select');

Route::group(['middleware'=>'auth'], function() {

Route::resource('user', 'UserController');
Route::resource('planta', 'PlantaController');
Route::resource('categoria', 'CategoriaController');
Route::resource('equipo', 'EquipoController');
Route::resource('departamento', 'DepartamentoController');
Route::get('equipo/listado/{depa?}','EquipoController@index');

});
