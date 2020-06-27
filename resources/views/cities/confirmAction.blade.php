@extends('layouts.app')
@section('titulo', 'Eliminar localidad')
@section('content')
<div class="container py-5">
    <h1>¿Desea eliminar la localidad {{ $city->name }}?</h1>
    <form method="POST" action="{{ route('cities.destroy', $city->slug) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="redondo btn btn-danger">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
        <a class="redondo btn btn-secondary" href="{{ route('cities.cancelAction', $city->slug) }}">
            <i class="fas fa-ban"></i> Cancelar
        </a>
    </form>
</div>
@endsection