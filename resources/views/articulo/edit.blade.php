@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar articulo</h1>
@stop

@section('content')

<form action="/articulos/{{$articulo->id  /*route('articulos.update', $articulo->id )*/}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
@include('articulo.form',['Modo'=>'Actualizar'])

</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
