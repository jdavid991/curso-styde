<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

use App\User;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required',
            'email' => ['required','email','unique:users,email'],
            'password' =>'required',
            'bio' => 'required',
            'instagram' => '',
        ];
    }
    public function messages(){
        return [
            'name.required'=> 'Campo Nombre Obligatorio'
        ];
    }
    public function createUser(){
        DB::transaction(function(){
            $data = $this->validated();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);

            $user->profile()->create([
                'bio' => $data['bio'],
                'instagram' => $data['instagram'],
            ]);
        });    }
}
