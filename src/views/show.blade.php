@extends('master')

@section('title','Detalle de ' . $user->name)

@section('contenido')
  <h2>{{$user->password}}</h2>
  <a href="/user" class="btn btn-success">Listado de usuarios</a>
@endsection