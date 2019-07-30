@extends('layouts')

   
    @section('content')
        <h1>{{ $title }}</h1> 
            <ul>
                @forelse($users as $user) 
                    <li>{{ $user }}</li>
                    @empty
                        <p>No Hay Registros</p>
                    @endforelse
            </ul>
    @endsection
    @section('sidebar')
        <h2>Barra personalizada</h2>
    @endsection

    
   
