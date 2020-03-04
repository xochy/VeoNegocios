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
    <div class="card-header">Formulario de registro de categoría</div>
    <div class="card-body">
        @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            @csrf
            @include('categories.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
        </form>
    </div>
</div>
@endsection