@extends('master')

@section('title','Detalle de ' . $party->name)

@section('contenido')
  <div class="row justify-content-around">
    <form action="/party/{{$party->id}}" method="POST" class="form-group justify-content-center mb-3">
      <input type="hidden" name="_METHOD" value="DELETE" class="form-control">
      <input type="submit" value="Eliminar" class="btn btn-danger form-control">
    </form>
    <a href="/party" class="col-5 btn btn-success mr-3">Listado de parties</a>
    <a href="/party/{{$party->id}}/edit" class="col-5 btn btn-success">Editar</a>
    <table class="table mt-3">
      <thead>
        <tr>
          <th scope="col">From</th>
          <th scope="col">To</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($assignment as $assign)
        <tr>
        <td scope="row">
          @foreach ($users as $user)
              @if ($user->id == $assign->user_from)
                  {{$user->name}}
              @endif
          @endforeach
        </td>
          <td>          
          @foreach ($users as $user)
            @if ($user->id == $assign->user_to)
                {{$user->name}}
            @endif
          @endforeach
      </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
  