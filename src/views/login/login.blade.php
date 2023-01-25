@extends('master')

@section('title','Login')

@section('contenido')
  <h2>Datos validacion:</h2>
  <form method="POST" action="/login">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Usuario</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Log in</button>
  </form>
@endsection