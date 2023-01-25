@extends('master')

@section('title','Modificar Usuario')

@section('contenido')
  <h2>Datos del usuario a modificar:</h2>
  <form method="POST" action="/user/{{$user->id}}">
    <input type="hidden" name="_METHOD" value="PUT">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre usuario</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$user->name}}">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{$user->password}}">
    </div>
    <button type="submit" class="btn btn-primary">Modificar</button>
  </form>
@endsection