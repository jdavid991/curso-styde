@extends('layouts')

@section('content')
<br><br>
    <br><br>
    <div class="card">
            <h4 class="card-header">Editar Usuario</h4>
            <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
                <h6>mensajes de alerta abajo</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>                        
                @endforeach
            </ul> 
        </div>

        @endif
   


   <form method="POST" action="{{ url("usuarios/{$user->id}") }}">
        {{ method_field('PUT') }}
        {!! csrf_field()!!}
    <div class="form-group"> 
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control" value="{{old('name',$user->name)}}">
    </div> 
    <div class="form-group">
        <label for="email">Correo</label>
       <input type="email" name="email" id="email" placeholder="Correo" class="form-control" value="{{old('email',$user->email)}}">
    </div> 
    <div class="form-group">
        <label for="password">Clave</label>
        <input  type="password" name="password" id="password" class="form-control" placeholder="clave">
    </div> 
        <button type="submit" class="btn btn-primary">Actualizar usuario</button>
        <a href="{{ route('usuarios.index') }}"class="btn btn-link">Regresar al listado de usuarios</a>

   </form>

    </div>
</div>

@endsection