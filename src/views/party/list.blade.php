@extends('master')

@section('title','Listado de partidas')

@section('contenido')
  <a href="/party/create" class="btn btn-outline-warning mb-3 mt-3">Crear Partida</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Propietario</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($parties as $party)
      <tr>
        <th scope="row">{{$party->id}}</th>
        <td>{{$party->name}}</td>
        <td>{{$party->admin_id}}</td>
        <td>
          <a href="/party/{{$party->id}}" class="btn btn-outline-info">Mostrar</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection