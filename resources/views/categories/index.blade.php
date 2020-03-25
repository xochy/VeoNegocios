@extends('layouts.app')
@section('titulo', 'Categorías')
@section('content')
<h3>Categorías</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
		<li class="breadcrumb-item active" aria-current="page">Categorías</li>
	</ol>
</nav>

@if (session('statusSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('statusSuccess') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('statusCancel'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('statusCancel') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (Auth::user()->authorizeRolesShow('administrator'))
    <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="far fa-plus-square"></i> Crear nueva categoría</a>
@endif

<div class="row mt-3">
    @foreach ($categories as $category)
    <div class="col-md-3 col-sm-6">
        <div class="product-grid2">
            <div class="product-image2">
                <a href="/categories/{{ $category->slug }}">
                    @foreach ($category->images as $image)
                        <img @if ($loop->first)
                            class="pic-1"
                        @else
                            class="pic-2"
                        @endif src="/images/{{$image->url}}">
                    @endforeach
                </a>
                <a class="add-to-cart" href="/categories/{{ $category->slug }}">Ver más...</a>
            </div>
            <div class="product-content">
                <h3 class="title"><a href="#">{{ $category->name }}</a></h3>
                <span class="price">{{ $category->description }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection