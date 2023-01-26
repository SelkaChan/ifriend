@extends('master')

@section('title','Bienvenido a blade')

@section('contenido')
  <h2> Tu gestor del amigo invisible</h2>
  @isset($_SESSION['id'])
  <a href="/user" class="btn btn-success mt-3">Listado de usuarios</a>
  <a href="/party" class="btn btn-success mt-3">Listado de partidas</a>
  @endisset
@endsection