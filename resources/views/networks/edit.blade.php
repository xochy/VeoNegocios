@extends('layouts.app')    
@section('titulo', 'Editar dirección')
@section('content')
<h3>Edición del contacto correspondiente a {{$network->description}}</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
        <li class="breadcrumb-item"><a href="/categories/{{ $network->store->category->slug }}">{{$network->store->category->name}}</a></li>
        <li class="breadcrumb-item"><a href="/stores/{{ $network->store->slug }}">{{$network->store->name}}</a></li>
		<li class="breadcrumb-item active" aria-current="page">Contacto: {{$network->description}}</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de edición de contacto
        <small id="scheduleHelp" class="form-text text-muted">Los campos obligatorios están marcados con el símbolo <i class="fas fa-star-of-life colorFormRequiredIcon"></i></small>
    </div>
    <div class="card-body">
        <form class="form-group" method="POST" action="{{ route('networks.update', $network->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('networks.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Actualizar</button>
            <a href="{{ route('networks.cancelAction', $network) }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
</div>
@endsection