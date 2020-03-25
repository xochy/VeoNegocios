@extends('layouts.app')    
@section('titulo', 'Crear comentario')
@section('content')
<h3>Crear comentario</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
        <li class="breadcrumb-item"><a href="/categories/{{ $store->category->slug }}">{{$store->category->name}}</a></li>
        <li class="breadcrumb-item"><a href="/stores/{{ $store->slug }}">{{$store->name}}</a></li>
		<li class="breadcrumb-item active" aria-current="page">Agregar nuevo comentario</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de registro de comentario
        <small id="scheduleHelp" class="form-text text-muted">Los campos obligatorios están marcados con el símbolo <i class="fas fa-star-of-life colorFormRequiredIcon"></i></small>
    </div>
    <div class="card-body">
        @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('comments.storeFromStore', $store->slug) }}" enctype="multipart/form-data">
            @csrf
            @include('comments.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
        </form>
    </div>
</div>
@endsection