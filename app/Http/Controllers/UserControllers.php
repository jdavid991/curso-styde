<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserControllers extends Controller
{
    public function index(){

    //    if(request()->has('empty')){
    //        $users=[];
    //    }else{
    //         $users=[
    //             'juan', 'pedro', 'maria', 'victor'
    //             ];
    
    //     }

       // $users = DB::table('users')->get();

          $users = User::all();

          if ($users == null){
              return view('error,404');
          }

        
        $title='Listado de Usuarios';

        // return view('usuarios.index')
        //     ->with('users', User::all())
        //     ->with('title', 'Listado de Usuarios');  

        return view('usuarios.index', compact('title','users'));    
    }
    public function show($id){

        $user = User::find($id);
       // dd($user);
        return view('usuarios.show',compact('user'));

    }
    public function create(){
        return  "Crear Nuevo Usuario";
    }
}