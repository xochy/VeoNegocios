@extends('layouts.app')    
@section('titulo', 'Crear categoría')
@section('content')
<h3>Registro de nueva categoría</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
		<li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
		<li class="breadcrumb-item active" aria-current="page">Crear nueva categoría</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de registro de categoría
        <small id="scheduleHelp" class="form-text text-muted">Los campos obligatorios están marcados con el símbolo <i class="fas fa-star-of-life colorFormRequiredIcon"></i></small>
    </div>
    <div class="card-body">
        <form class="form-group" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" id="createForm">
            @csrf
            @include('categories.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
        </form>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>