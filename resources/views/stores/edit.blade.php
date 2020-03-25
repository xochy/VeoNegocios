@extends('layouts.app')    
@section('titulo', 'Editar negocio')
@section('content')
<h3>Edición de negocio {{$store->name}}</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
        <li class="breadcrumb-item"><a href="/categories/{{ $store->category->slug }}">{{$store->category->name}}</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{$store->name}}</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de edición de negocio
        <small id="scheduleHelp" class="form-text text-muted">Los campos obligatorios están marcados con el símbolo <i class="fas fa-star-of-life colorFormRequiredIcon"></i></small>
    </div>
    <div class="card-body">
        <form class="form-group" method="POST" action="{{ route('stores.update', $store->slug) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('stores.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Actualizar</button>
            <a href="{{ route('stores.cancelAction', $store) }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
</div>
@endsection