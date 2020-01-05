<?php

use Illuminate\Http\Request;

Route::apiresource('user', 'UserController');
Route::apiresource('planta', 'PlantaController');
Route::apiresource('categoria', 'CategoriaController');
Route::apiresource('equipo', 'EquipoController');