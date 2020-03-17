@extends('layouts.app')
@section('titulo', 'Elminar producto')
@section('content')
<div class="container py-5">
    <h1>¿Desea eliminar el producto {{ $product->name }}?</h1>
    <form method="POST" action="{{ route('products.destroy', $product->slug) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="redondo btn btn-danger">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
        <a class="redondo btn btn-secondary" href="{{ route('products.cancelAction', $product->slug) }}">
            <i class="fas fa-ban"></i> Cancelar
        </a>
    </form>
</div>
@endsection