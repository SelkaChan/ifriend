@extends('master')

@section('title','Modificar partida')

@section('contenido')
  <h2>Datos de la partida a modificar:</h2>
  <form method="POST" action="/party/{{$party->id}}">
    <input type="hidden" name="_METHOD" value="PUT">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$party->name}}">
    </div>
    <div class="mb-3">
      <h3>Participantes</h3>
        @foreach ($users as $user)
        <br>
        <span class="m-2">
          <input type="checkbox" name="participants[]" id="user{{$user->id}}" value="{{$user->id}}"
          @if (str_contains($assignment, $user->id))
              {{ "checked" }}
          @endif>
          <label for="user{{$user->id}}">{{$user->name}}</label>
        </span>
        @endforeach

    </div>
    <button type="submit" class="btn btn-primary">Modificar</button>
  </form>
@endsection