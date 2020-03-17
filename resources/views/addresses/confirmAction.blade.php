@extends('layouts.app')
@section('titulo', 'Elminar dirección')
@section('content')
<div class="container py-5">
    <h1>¿Desea eliminar la dirección correspondiente a {{ $address->address_address }}?</h1>
    <form method="POST" action="{{ route('addresses.destroy', $address->slug) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="redondo btn btn-danger">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
        <a class="redondo btn btn-secondary" href="{{ route('addresses.cancelAction', $address->slug) }}">
            <i class="fas fa-ban"></i> Cancelar
        </a>
    </form>
</div>
@endsection