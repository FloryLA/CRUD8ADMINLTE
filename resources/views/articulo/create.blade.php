@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registrar articulo</h1>
@stop

@section('content')

@if($errors->any())
<div class="alert alert-danger">

<ul>@foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
{{ session('status') }}
</div>
@endif

<form action="/articulos" method="POST" enctype="multipart/form-data">
@csrf
@include('articulo.form',['Modo'=>'Registrar'])

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


