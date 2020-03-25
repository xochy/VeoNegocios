@extends('layouts.app')    
@section('titulo', 'Editar dirección')
@section('content')
<h3>Edición de dirección correspondiente a {{$product->name}}</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
        <li class="breadcrumb-item"><a href="/categories/{{ $product->store->category->slug }}">{{$product->store->category->name}}</a></li>
        <li class="breadcrumb-item"><a href="/stores/{{ $product->store->slug }}">{{$product->store->name}}</a></li>
		<li class="breadcrumb-item active" aria-current="page">Producto: {{$product->name}}</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de edición de dirección
        <small id="scheduleHelp" class="form-text text-muted">Los campos obligatorios están marcados con el símbolo <i class="fas fa-star-of-life colorFormRequiredIcon"></i></small>
    </div>
    <div class="card-body">
        @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('products.update', $product->slug) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('products.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Actualizar</button>
            <a href="{{ route('products.cancelAction', $product) }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
</div>
@endsection