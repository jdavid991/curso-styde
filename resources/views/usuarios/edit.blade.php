

@extends('layouts')

@section('content')
<br>
<br><br><br>


editar
   <div class="alert alert-danger">
        <h6>mensajes de alerta abajo</h6>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>                        
                @endforeach
            </ul> 
        @endif
   </div>
   


       <form method="POST" action="{{ url('usuarios/crear') }}">

        {!! csrf_field()!!}
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{old('name',$user->name)}}">
        <br>
        <label for="email">Correo</label>
       <input type="email" name="email" id="email" placeholder="Correo" value="{{old('email',$user->email)}}">
        <br>
        <label for="password">Clave</label>
        <input  type="password" name="password" id="password" placeholder="clave">
        <br>
   
        <button type="submit">Actualizar usuario</button>

   </form>


    <a href="{{ route('usuarios.index') }}">Regresar al listado de usuarios</a>

@endsection