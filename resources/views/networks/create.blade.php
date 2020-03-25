@extends('layouts.app')    
@section('titulo', 'Crear contacto')
@section('content')
<h3>Registro de contacto</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
        <li class="breadcrumb-item"><a href="/categories/{{ $store->category->slug }}">{{$store->category->name}}</a></li>
        <li class="breadcrumb-item"><a href="/stores/{{ $store->slug }}">{{$store->name}}</a></li>
		<li class="breadcrumb-item active" aria-current="page">Agregar nuevo contacto</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de registro de contacto
        <small id="scheduleHelp" class="form-text text-muted">Los campos obligatorios están marcados con el símbolo <i class="fas fa-star-of-life colorFormRequiredIcon"></i></small>
    </div>
    <div class="card-body">
        <form class="form-group" method="POST" action="{{ route('networks.storeFromStore', $store->slug) }}" enctype="multipart/form-data">
            @csrf
            @include('networks.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
        </form>
    </div>
</div>

@endsection