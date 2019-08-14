@extends('layouts')

    @section('content')
    <br><br>
    <br><br>
    <div class="card">
            <h4 class="card-header">Crear Usuario</h4>
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
    
     
    
            <form method="POST" action="{{ url('usuarios/crear') }}">
                {!! csrf_field()!!}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" value="{{old('name')}}">
                </div> 
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo" value="{{old('email')}}">
                </div> 
                <div class="form-group">   
                        <label for="password">Clave</label>
                        <input  type="password" name="password" id="password" class="form-control" placeholder="clave">
                </div>
                <div class="form-group">   
                        <label for="bio">Bio</label>
                        <textarea  name="bio" id="bio" class="form-control" placeholder="Bio">{{old('bio')}}</textarea>
                </div> 
                <div class="form-group">   
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" id="instagram" class="form-control" placeholder="instagram" value="{{old('instagram')}}">

                </div> 
                <div class="form-group"> 
                    <button type="submit" class="btn btn-primary">Crear usuario</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-link">Regresar al listado de usuarios</a>
                </div> 
    
           </form>

            </div>
    </div>

            



    @endsection