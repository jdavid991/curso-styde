@extends('layouts')

   
    @section('content')
        <h1>{{ $title }}</h1> 
                <p>
                   <a href="{{ action('UserControllers@create')}}" class="btn btn-primary">Nuevo Usuario</a>
                </p>

            @if($users->isNotEmpty())
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody> 
                      @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                    
                                    <form action="{{ action('UserControllers@destroy',['id'=> $user->id]) }}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <a href="{{ action('UserControllers@show',['id'=> $user->id]) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                                        <a href="{{ action('UserControllers@edit',['id'=> $user->id]) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                                        <button type="submit" class="btn btn-link"><span class="oi oi-delete"></span></button>
                                    </form>
                            </td>

                        </tr> 
                      @endforeach
                    </tbody>
                  </table>
                  @else
                    <p>NO HAY REGITROS</p>
                @endif 


          
    @endsection
    @section('sidebar')
        <h2>Barra personalizada</h2>
    @endsection

    
   
