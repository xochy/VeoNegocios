@extends('layouts.app')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://www.kayak.com.mx/news/wp-content/uploads/sites/29/2015/11/explorekayak-1920x600.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Conoce las principales categorías de negocios</h5>
                <p>Tenemos registradas las principales categorías de negocios del país.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://en.visiomed-group.com/wp-content/uploads//2017/09/visiomed-banner-contact-1920x600.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tus productos organizados</h5>
                <p>Lleva un control de tus productos con nuestro sistema.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://oportunia.cat/wp-content/uploads/2018/04/header-contact-1920x600.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>El lugar de tus productos</h5>
                <p>Crea un control de tu negocio asociado a nuestras categorías.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<hr class="featurette-divider">

<div class="jumbotron" style="margin-top: 20px;">
    <h1 class="display-4">¡VeoNegocios!</h1>
    <p class="lead">Bienvenido a VeoNegocios, ya puedes registrar tus productos con nosotros.</p>
    <hr class="my-4">
    <p>Si eres dueño de un establecimiento y te gustaría llevar el control de tus productos en las principales categorías de negocios, estás en el lugar correcto.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('categories.index') }}" role="button">Ver categorías</a>
    <a class="btn btn-success btn-lg" href="{{ route('stores.loadFromCity', 'an') }}" role="button">Antúnez</a>
    <a class="btn btn-success btn-lg" href="{{ route('stores.loadFromCity', 'ap') }}" role="button">Apatzingán</a>
</div>

<hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->
@endsection
