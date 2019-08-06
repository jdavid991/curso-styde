

@extends('layouts')

    @section('content')
    <br>
    <br><br><br>
        Nombre de usuario: {{ $user->name }}


        <a href="{{ url('/usuario/') }}">Atras</a>

    @endsection