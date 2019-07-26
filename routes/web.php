<?php

Route::get('/', function () {
    return 'hola';
});

Route::get('/usuario', function(){
    return 'Usuarios';
});

// ruta con url amigable 
Route::get('/usuario/{id}', function($id){
    return "Mostrando detelle de usuario: {$id}";
})->where ('id','[0-9]+');

Route::get('/usuario/nuevo', function(){
    return 'Crear Nuevo Usuario';
});