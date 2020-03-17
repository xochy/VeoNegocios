@extends('layouts.app')    
@section('titulo', 'Crear categoría')
@section('content')
<h3>Registro de producto</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
        <li class="breadcrumb-item"><a href="/categories/{{ $store->category->slug }}">{{$store->category->name}}</a></li>
        <li class="breadcrumb-item"><a href="/stores/{{ $store->slug }}">{{$store->name}}</a></li>
		<li class="breadcrumb-item active" aria-current="page">Agregar nuevo producto</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de registro de producto
        <small id="scheduleHelp" class="form-text text-muted">Los campos obligatorios están marcados con el símbolo <i class="fas fa-star-of-life colorFormRequiredIcon"></i></small>
    </div>
    <div class="card-body">
        @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('products.storeFromStore', $store->slug) }}" enctype="multipart/form-data">
            @csrf
            @include('products.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
        </form>
    </div>
</div>
@endsection