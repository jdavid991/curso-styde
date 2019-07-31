<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserControllers extends Controller
{
    public function index(){

       if(request()->has('empty')){
           $users=[];
       }else{
            $users=[
                'juan', 'pedro', 'maria', 'victor'
                ];
    
        }

        
        $title='Listado de Usuarios';

        return view('usuarios.index', compact('title','users'));    
    }
    public function show($id){

        return view('usuarios.show',compact('id'));

    }
    public function create(){
        return  "Crear Nuevo Usuario";
    }
}