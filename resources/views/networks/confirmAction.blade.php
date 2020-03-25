@extends('layouts.app')
@section('titulo', 'Elminar contacto')
@section('content')
<div class="container py-5">
    <h1>¿Desea eliminar el contacto correspondiente a {{ $network->description }}?</h1>
    <form method="POST" action="{{ route('networks.destroy', $network->id) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="redondo btn btn-danger">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
        <a class="redondo btn btn-secondary" href="{{ route('networks.cancelAction', $network->id) }}">
            <i class="fas fa-ban"></i> Cancelar
        </a>
    </form>
</div>
@endsection