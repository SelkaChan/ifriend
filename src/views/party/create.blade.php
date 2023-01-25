@extends('master')

@section('title','Crear partida')

@section('contenido')
  <h2>Datos de la nueva partida:</h2>
  <form method="POST" action="/party">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
    </div>
    <div class="mb-3">
      <h3>Participantes</h3>
      @foreach ($users as $user)
      <span class="m-2">
        <input type="checkbox" name="participants[]" id="user{{$user->id}}" value="{{$user->id}}">
        <label for="user{{$user->id}}">{{$user->name}}</label>
      </span>
      @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
  </form>
@endsection