@extends('layouts.app')    
@section('titulo', 'Editar localidad')
@section('content')
<h3>Edición de localidad {{$city->name}}</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
		<li class="breadcrumb-item"><a href="{{ route('cities.index') }}">Localidades</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$city->name}}</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de edición de localidad
        <small id="scheduleHelp" class="form-text text-muted">Los campos obligatorios están marcados con el símbolo <i class="fas fa-star-of-life colorFormRequiredIcon"></i></small>
    </div>
    <div class="card-body">
        <form class="form-group" method="POST" action="{{ route('cities.update', $city) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('cities.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> Actualizar</button>
            <a href="{{ route('cities.cancelAction', $city) }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
</div>
@endsection