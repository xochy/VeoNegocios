@extends('layouts.app')
@section('titulo', 'Detalles de categoría')
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
                                            <h4>
                                                @if(isset($image->tittle)){{$image->tittle}}@endif
                                            </h4>
                                            <p>
                                                @if(isset($image->description)){{$image->description}}@endif
                                            </p>
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
                        <h2 class="card-title">{{$store->name}}</h2>
                        <p class="card-text">{{$store->description}}</p>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">Agregado el {{$store->created_at}} </small><br>
                        <small class="text-muted">Última modificación: {{$store->created_at}} </small><br><br>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('stores.edit', $store->slug )}}" ><i class="far fa-edit"></i> Editar</a>
                        <a class="btn btn-outline-danger btn-sm" href="{{ route('stores.confirmAction', $store->slug )}}"><i class="far fa-trash-alt"></i> Eliminar</a>
                    </div>
                </div>

                <div class="mt-3 mb-3">          
                    <h3 class="display-5 text-center"> Contactos y Redes sociales </h3>
                    <hr class="bg-dark mb-4 w-25">
                    <nav>
                        <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link btn btn-info active" id="nav-phone-tab" data-toggle="tab" href="#nav-phone" role="tab"
                                aria-controls="nav-phone" aria-selected="true"><i class="fas fa-phone"></i> Teléfono</a>

                            <a class="nav-item nav-link btn btn-success" id="nav-whatsapp-tab" data-toggle="tab" href="#nav-whatsapp" role="tab"
                                aria-controls="nav-whatsapp" aria-selected="false"><i class="fab fa-whatsapp"></i> WhatsApp</a>

                            <a class="nav-item nav-link btn btn-primary" id="nav-facebook-tab" data-toggle="tab" href="#nav-facebook" role="tab"
                                aria-controls="nav-facebook" aria-selected="false"><i class="fab fa-facebook-square"></i></i> Facebook</a>

                            <a class="nav-item nav-link btn btn btn-danger" id="nav-youtube-tab" data-toggle="tab" href="#nav-youtube" role="tab"
                                aria-controls="nav-youtube " aria-selected="false"><i class="fab fa-youtube"></i> YouTube</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-phone" role="tabpanel" aria-labelledby="nav-phone-tab">
                            <div class="container">
                                Números telefónicos    
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-whatsapp" role="tabpanel" aria-labelledby="nav-whatsapp-tab">Whastapp</div>
                        <div class="tab-pane fade" id="nav-facebook" role="tabpanel" aria-labelledby="nav-facebook-tab">link de facebook</div>
                        <div class="tab-pane fade" id="nav-youtube" role="tabpanel" aria-labelledby="nav-youtube-tab">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 mb-3">
                    <h3 class="display-5 text-center"> Direcciones </h3>
                    <hr class="bg-dark mb-4 w-25">
                    <a  class="btn btn-outline-success btn-sm" style="margin-bottom: 10px;" href="{{ route('addresses.createFromStore', $store->slug) }}"><i class="far fa-plus-square"></i> Agregar nueva dirección</a>
                    @include('addresses.list')
                </div>
            </div>
            <div class="col-md-4">
                <h3>
                    Comentarios.
                </h3>
                <ul class="list-unstyled">
                    <li class="media">
                        <img class="mr-3"
                            src="https://lh3.googleusercontent.com/M9-avA9aqLib9ttMBP1Jj_wTYSPAWG4JeuRTvjl35gtd9iixjV1Kald8utc8TZP6v4JMFA=s64"
                            alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">List-based media object</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
                            vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                            lacinia congue felis in faucibus.
                        </div>
                    </li>
                    <li class="media my-4">
                        <img class="mr-3"
                            src="https://lh3.googleusercontent.com/M9-avA9aqLib9ttMBP1Jj_wTYSPAWG4JeuRTvjl35gtd9iixjV1Kald8utc8TZP6v4JMFA=s64"
                            alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">List-based media object</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
                            vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                            lacinia congue felis in faucibus.
                        </div>
                    </li>
                    <li class="media">
                        <img class="mr-3"
                            src="https://lh3.googleusercontent.com/M9-avA9aqLib9ttMBP1Jj_wTYSPAWG4JeuRTvjl35gtd9iixjV1Kald8utc8TZP6v4JMFA=s64"
                            alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">List-based media object</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
                            vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                            lacinia congue felis in faucibus.
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="display-5 text-center"> Productos/Servicios </h3>
                    <hr class="bg-dark mb-4 w-25">
                    <a  class="btn btn-outline-success btn-sm" style="margin-bottom: 10px;" href="{{ route('products.createFromStore', $store->slug) }}"><i class="far fa-plus-square"></i> Agregar nuevo producto</a>
                    @include('products.list')
            </div>
        </div>
    </div>
</div>
@endsection