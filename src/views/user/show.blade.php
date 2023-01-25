@extends('master')

@section('title','Detalle de ' . $user->name)

@section('contenido')
  <h2>{{$user->password}}</h2>
  <div class="row justify-content-around">
    <form action="/user/{{$user->id}}" method="POST" class="form-group justify-content-center mb-3">
      <input type="hidden" name="_METHOD" value="DELETE" class="form-control">
      <input type="submit" value="Eliminar" class="btn btn-danger form-control">
    </form>
    <a href="/user" class="col-5 btn btn-success mr-3">Listado de usuarios</a>
    <a href="/user/{{$user->id}}/edit" class="col-5 btn btn-success">Editar</a>
  </div>
@endsection