<?php

Route::get('/', function () {
    return 'Home';
 });

Route::get('/usuarios', 'UserControllers@index')
    ->name('usuarios.index');

// ruta con url amigable 
Route::get('/usuarios/{user}', 'UserControllers@show')
    ->where ('user','[0-9]+')
    ->name('usuarios.show');


Route::get('/usuarios/nuevo', 'UserControllers@create');

Route::get('/usuarios/{user}/editar','UserControllers@edit');

Route::post('/usuarios/crear', 'UserControllers@store');

Route::put('/usuarios/{user}', 'UserControllers@update');


Route::get('/saludo/{name}/{nickname?}', 'welcomeUserController');
 