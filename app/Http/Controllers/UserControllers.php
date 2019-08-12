<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserControllers extends Controller
{
    public function index(){
        $users = User::all();
        $title='Listado de Usuarios';
        return view('usuarios.index', compact('title','users'));    
    }
    public function show(User $user){

       return view('usuarios.show',compact('user'));

    }
    public function create(){
          return view('usuarios.create');
    }
    public function store(){

        $data=request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email'],
            'password' =>'required',

        ],[
            'name.required'=> 'Campo Nombre Obligatorio'
        ]);

        // if(empty($data['name'])){
        //     return redirect('usuarios/nuevo')->withErrors([
        //         'name' => 'Campo Obligatorio'
        //     ]);
        // }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        return redirect()->route('usuarios.index');

    }
    public function edit(User $user){
        return view('usuarios.edit',['user'=> $user]);
    }
    public function update(User $user){

        $data=request()->validate([
            'name'  => 'required',
            'email' => '',
            'password' => '',
        ]);

        $data['password']=bcrypt($data['password']);

        $user->update($data);
        
        return redirect("usuarios/{$user->id}");
    }
}