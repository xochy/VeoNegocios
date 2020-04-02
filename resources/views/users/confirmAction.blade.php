@extends('layouts.app')
@section('titulo', 'Elminar usuario')
@section('content')
<div class="container py-5">
    <h1>¿Desea eliminar el usuario {{ $user->name }}?</h1>
    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="redondo btn btn-danger">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
        <a class="redondo btn btn-secondary" href="{{ route('users.cancelAction', $user->id) }}">
            <i class="fas fa-ban"></i> Cancelar
        </a>
    </form>
</div>
@endsection