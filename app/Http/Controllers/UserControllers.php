<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\{User, UserProfile};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
    public function store(CreateUserRequest $request){

        $request->createUser();

        //User::createUser($data);
        

        return redirect()->route('usuarios.index');

    }
    public function edit(User $user){
        return view('usuarios.edit',['user'=> $user]);

    }
   

    public function update(User $user){

        $data=request()->validate([
            'name'  => 'required',
            'email' => ['required','email',Rule::unique('users')->ignore($user->id)],
            'password' => '',
        ]);

        if($data['password'] != null){
            $data['password']=bcrypt($data['password']);
        }else{
            unset($data['password']);
        }


        $user->update($data);
        
        return redirect("usuarios/{$user->id}");
    }
    function destroy(User $user){

        $user->delete();

        return redirect()->route('usuarios.index');
    }
}