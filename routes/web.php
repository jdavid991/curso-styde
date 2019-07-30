<?php

Route::get('/', function () {
    return 'Home';
 });

Route::get('/usuario', 'UserControllers@index');

// ruta con url amigable 
Route::get('/usuario/{id}', 'UserControllers@show')
    ->where ('id','[0-9]+');

Route::get('/usuario/nuevo', 'UserControllers@create');

Route::get('/saludo/{name}/{nickname?}', 'welcomeUserController');
