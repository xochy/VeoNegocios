@extends('layouts.app')
@section('titulo', 'Detalles de categoría')
@section('content')
<div class="container py-5">
    <h1>¿Desea eliminar la categoría de {{ $category->name }}?</h1>
    <form method="POST" action="{{ route('categories.destroy', $category->slug) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="redondo btn btn-danger">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
        <a class="redondo btn btn-secondary" href="{{ route('categories.cancelAction', $category->slug) }}">
            <i class="fas fa-ban"></i> Cancelar
        </a>
    </form>
</div>
@endsection