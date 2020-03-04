@extends('layouts.app')
@section('titulo', 'Detalles de categoría')
@section('content')
<h3>Detalles de la categoría {{$category->name}}</h3>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
		<li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
	</ol>
</nav>

@isset($statusSuccess)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{$statusSuccess}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset

@if (session('statusCancel'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('statusCancel') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="jumbotron text-center hoverable p-4">
    <div class="row">
        <div class="col-md-4 offset-md-1 mx-3 my-3">
            <div class="view overlay">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                    @foreach ($category->images as $image)
                        <div class="carousel-item 
                        @if ($loop->first)
                            active">
                        @else
                        ">
                        @endif <img src="/images/{{$image->url}}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach

                    </div>                    
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
        <div class="col-md-7 text-md-left ml-3 mt-3">
            <a href="#!" class="green-text">
                <h6 class="h6 pb-1"><i class="fas fa-store pr-1"></i> 30 Negocios registrados en esta categoría</h6>
            </a>

            <h4 class="h4 mb-4">{{$category->name}}</h4>

            <p class="font-weight-normal">{{$category->description}}</p>
            <p class="font-weight-normal">by <a><strong>Carine Fox</strong></a>, 19/08/2016</p>

            <a  class="btn btn-primary" href="{{ route('stores.createFromCategory', $category->slug) }}"><i class="far fa-plus-square"></i> Crear nuevo negocio</a>
            <a class="btn btn-warning" href="{{ route('categories.edit', $category->slug )}}" ><i class="far fa-edit"></i> Editar categoría</a>
            <a class="btn btn-danger" href="{{ route('categories.confirmAction', $category->slug )}}"><i class="far fa-trash-alt"></i> Eliminar categoría</a>
        </div>
    </div>
</div>
<h3 style="margin-bottom: -35px;">Lista de Negocios</h3>
@include('stores.list', ['stores' => $category->stores])
@endsection