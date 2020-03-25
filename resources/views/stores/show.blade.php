@extends('layouts.app')
@section('titulo', 'Detalles de negocio')
@section('content')
<h3>Detalles del negocio {{$store->name}}</h3>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
        <li class="breadcrumb-item"><a href="/categories/{{ $store->category->slug }}">{{$store->category->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$store->name}}</li>
    </ol>
</nav>
  
@if(session('statusSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('statusSuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset

@if(session('statusCancel'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('statusCancel')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="carousel slide" id="carousel-667320">
                        <ol class="carousel-indicators">    
                            @foreach ($store->images->where('position', '>', 0) as $image)
                                @if ($store->images->where('position', '>', 0)->count() > 1)                       
                                    <li data-slide-to="{{$image->position - 1}}" data-target="#carousel-667320" @if($loop->first) class="active" @endif>
                                @endif                 
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($store->images->where('position', '>', 0) as $image)
                                <div class="carousel-item @if ($loop->first)
                                    active
                                @endif">
                                    <img class="d-block w-100" alt="Carousel Bootstrap First" src="/images/{{$image->url}}" />
                                    @if (isset($image->tittle) || isset($image->description))
                                        <div class="carousel-caption panel-transparent">
                                            <h4>@if(isset($image->tittle)){{$image->tittle}}@endif</h4>
                                            <p>@if(isset($image->description)){{$image->description}}@endif</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div> 

                        @if ($store->images->where('position', '>', 0)->count() > 1)
                            <a class="carousel-control-prev" href="#carousel-667320" data-slide="prev"><span class="carousel-control-prev-icon"></span> 
                                <span class="sr-only">Anterior</span></a> <a class="carousel-control-next" href="#carousel-667320" data-slide="next">
                                <span class="carousel-control-next-icon"></span> <span class="sr-only">Siguiente</span>
                            </a>
                        @endif                      
                       
                    </div>
                    <div class="card-body">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight"><h2 class="card-title">{{$store->name}}</h2></div>
                            <div class="p-2 bd-highlight"><h2>{{number_format((float)$store->score, 1, '.', '')}}</h2></div>
                            <div class="p-2 bd-highlight">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="align-middle fa fa-star fa-lg @if($store->score >= $i) checked @endif" id="star{{$i}}"></span>
                                @endfor
                            </div>
                        </div>
                        <p class="card-text">{{$store->description}}</p>
                        <a href="#productList" class="card-text green-text">
                            <h6 class="h6 pb-1"><i class="fas fa-cash-register"></i> {{$store->products->count()}} productos/servicios que ofrece este negocio</h6>
                        </a>
                    </div>
                    @if (Auth::user()->authorizeRolesShow(['administrator', 'collector', 'costumer']))
                        <div class="card-footer">
                            <small class="text-muted">Agregado el {{$store->created_at}} </small><br>
                            <small class="text-muted">Última modificación: {{$store->updated_at}} </small><br><br>
                            <a class="btn btn-outline-primary btn-sm" href="{{ route('stores.edit', $store->slug )}}" ><i class="far fa-edit"></i> Editar</a>
                            <a class="btn btn-outline-danger btn-sm" href="{{ route('stores.confirmAction', $store->slug )}}"><i class="far fa-trash-alt"></i> Eliminar</a>
                        </div>
                    @endif
                </div>

                <div class="mt-3 mb-3">          
                    <h3 class="display-5 text-center"> Contactos y Redes sociales </h3>
                    <hr class="bg-dark mb-4 w-25">

                    @if ($store->networks()->count() < 4)
                        @if (Auth::user()->authorizeRolesShow(['administrator', 'collector', 'costumer']))
                            <a class="btn btn-outline-success btn-sm" style="margin-bottom: 10px;" href="{{ route('networks.createFromStore', $store->slug) }}"><i class="far fa-plus-square"></i> Agregar nuevo contacto</a>
                        @endif
                    @endif

                    @include('networks.list')
                </div>

                <div class="mt-4 mb-3">
                    <h3 class="display-5 text-center"> Direcciones </h3>
                    <hr class="bg-dark mb-4 w-25">

                    @if ($store->addresses()->count() < 3)
                        @if (Auth::user()->authorizeRolesShow(['administrator', 'collector', 'costumer']))
                            <a class="btn btn-outline-success btn-sm" style="margin-bottom: 10px;" href="{{ route('addresses.createFromStore', $store->slug) }}"><i class="far fa-plus-square"></i> Agregar nueva dirección</a>
                        @endif
                    @endif

                    @include('addresses.list')
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="display-5 text-center"> Comentarios </h3>
                <hr class="bg-dark mb-4 w-25">                
                @include('comments.list')
                @if (Auth::user()->authorizeRolesShow(['administrator', 'viewer']))
                    <a class="btn btn-outline-success btn-sm" style="margin: 10px 0 10px 0; width: 100%;" href="{{ route('comments.createFromStore', $store->slug) }}"><i class="far fa-plus-square"></i> Agregar comentario</a>
                @endif
            </div>
        </div>
        <div id="productList" class="row">
            <div class="col-md-12">
                <h3 class="display-5 text-center"> Productos/Servicios </h3>
                    <hr class="bg-dark mb-4 w-25">
                    @if (Auth::user()->authorizeRolesShow(['administrator', 'collector', 'costumer']))
                        <a class="btn btn-outline-success btn-sm" style="margin-bottom: 10px;" href="{{ route('products.createFromStore', $store->slug) }}"><i class="far fa-plus-square"></i> Agregar nuevo producto</a>
                    @endif
                    @include('products.list')
            </div>
        </div>        
    </div>
</div>
@endsection

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v6.0"></script>