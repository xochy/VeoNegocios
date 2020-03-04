@extends('layouts.app')    
@section('titulo', 'Crear negocio')
@section('content')
<h3>Registro de nuevo negocio</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{$category->name}}</a></li>
		<li class="breadcrumb-item active" aria-current="page">Crear nuevo negocio</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de registro de negocio</div>
    <div class="card-body">
        @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('stores.storeFromCategory', $category->slug) }}" enctype="multipart/form-data">
            @csrf
            @include('stores.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
        </form>
    </div>
</div>
@endsection