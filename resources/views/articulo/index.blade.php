@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Lista de articulos</h1>
    <a href="articulos/create" class="btn btn-primary">Registrar articulo</a>
@stop

@section('content')


@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<table id="articulos" class="table table-hover table-striped shadow-lg mb-6 ">
    <thead class="bg-prymary text-while">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Foto</th>
        <th scope="col">Codigo</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      @foreach ( $articulos as $articulo)
        <td>{{ $articulo->id }}</td>
        <td><img src=" {{ asset('storage').'/'.$articulo->foto }}" alt="{{ $articulo->descripcion }}" width="100" class="img-thumbail img-circle  img-fluid"> </td>
        <td>{{ $articulo->codigo}}</td>
        <td>{{ $articulo->descripcion }}</td>
        <td>{{ $articulo->cantidad }}</td>
        <td>{{ $articulo->precio }}</td>
        <td>
        <a href="/articulos/{{$articulo->id}}/edit{{--route('articulos.edit',$articulo->id) --}}" class="btn btn-success">Editar</a>

              <form action="{{route('articulos.destroy',$articulo->id) }}" style="display:inline" method="post">
           @csrf
           @method('DELETE')
           <button type="submit" onclick="return confirm('¿Esta seguro de que quire Borrar permanetemente?');" class="btn btn-danger">Eliminar</button>
           </form>

        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

@stop

@section('js')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
  $(document).ready( function () {
    $('#articulos').DataTable();
} );
</script>
@stop
