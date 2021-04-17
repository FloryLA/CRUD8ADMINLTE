@extends('layouts.articulo')

@section('contenido')

<form action="/articulos/{{$articulo->id  /*route('articulos.update', $articulo->id )*/}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
@include('articulo.form',['Modo'=>'Actualizar'])

</form>

@endsection
