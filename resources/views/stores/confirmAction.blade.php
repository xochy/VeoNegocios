@extends('layouts.app')
@section('titulo', 'Elminar negocio')
@section('content')
<div class="container py-5">
    <h1>¿Desea eliminar el negocio {{ $store->name }}?</h1>
    <form method="POST" action="{{ route('stores.destroy', $store->slug) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="redondo btn btn-danger">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
        <a class="redondo btn btn-secondary" href="{{ route('stores.cancelAction', $store->slug) }}">
            <i class="fas fa-ban"></i> Cancelar
        </a>
    </form>
</div>
@endsection