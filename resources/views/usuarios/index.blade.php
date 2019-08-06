@extends('layouts')

   
    @section('content')
        <h1>{{ $title }}</h1> 
            <ul>
                @forelse($users as $user) 
                    <li>
                        {{ $user->name }}, ({{ $user->email }})
                        <a href="{{ url('/usuario/'.$user->id) }}">Ver detalle</a>
                        <a href="{{ action('UserControllers@show',['id'=> $user->id]) }}">2r detalle</a>
                    </li>
                    @empty
                        <p>No Hay Registros</p>
                    @endforelse
            </ul>
    @endsection
    @section('sidebar')
        <h2>Barra personalizada</h2>
    @endsection

    
   
