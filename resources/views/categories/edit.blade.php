@extends('layouts.app')    
@section('titulo', 'Editar categoría')
@section('content')
<h3>Edición de categoría</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
		<li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
		<li class="breadcrumb-item active" aria-current="page">Edición de categoría</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de edición de categoría</div>
    <div class="card-body">
        @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('categories.update', $category) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('categories.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> Actualizar</button>
            <a href="{{ route('categories.cancelAction', $category->slug) }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
</div>
@endsection