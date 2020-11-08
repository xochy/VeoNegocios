@extends('layouts.app')
@section('titulo', 'Negocios')
@section('content')

    @if ($city->images->count() > 0)
    <div class="row">
        <div class="col-12">
            <!--SECTION START-->
            <section class="row">
                <!--Start slider news-->
                <div class="col-12 col-md-12 pb-0 pb-md-3 pt-2 pr-md-1">
                    <div id="featured" class="carousel slide carousel" data-ride="carousel">
                        <!--dots navigate-->
                        <ol class="carousel-indicators top-indicator">
                            @foreach ($city->images->where('position', '<', 5) as $image)
                                <li data-target="#featured" data-slide-to="{{$loop->index}}" @if ($loop->first) class="active" @endif></li>
                            @endforeach
                        </ol>

                        <!--carousel inner-->
                        <div class="carousel-inner">

                            @foreach ($city->images->where('position', '<', 5) as $image)
                                <!--Item slider-->
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <div class="card border-0 rounded-0 text-light overflow zoom">
                                        <div class="position-relative">
                                            <!--thumbnail img-->
                                            <div class="ratio_left-cover-1 image-wrapper">
                                                <a href="#">
                                                    <img class="img-fluid w-100"
                                                        src="/storage/{{$image->url}}"
                                                        alt="Bootstrap news template">
                                                </a>
                                            </div>
                                            <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                                <!--title-->
                                                <a href="#">
                                                    <h2 class="h3 post-title text-white my-1">@if(isset($image->tittle)){{$image->tittle}}@endif</h2>
                                                </a>
                                                <!-- meta title -->
                                                <div class="news-meta">
                                                    <span class="news-date">@if(isset($image->description)){{$image->description}}@endif</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end item slider-->
                            @endforeach
                        </div>
                        <!--end carousel inner-->
                    </div>

                    <!--navigation-->
                    <a class="carousel-control-prev" href="#featured" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#featured" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
                <!--End slider news-->

                <!--Start box news-->
                <div class="col-12 col-md-6 pt-2 pl-md-1 mb-3 mb-lg-4">
                    <div class="row">
                        <!--news box-->
                        @foreach ($city->images->where('position', '>', 4) as $image)
                        <div class="col-6 pb-1
                            @switch($loop->iteration)
                                @case(1)
                                    pr-1 pt-0
                                    @break
                                @case(2)
                                    pl-1 pt-0
                                    @break
                                @case(3)
                                    pr-1 pt-1
                                    @break
                                @case(4)
                                    pl-1 pt-1
                                    @break
                                @default
                            @endswitch
                            ">
                            <div class="card border-0 rounded-0 text-white overflow zoom">
                                <div class="position-relative">
                                    <!--thumbnail img-->
                                    <div class="ratio_right-cover-2 image-wrapper">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="/storage/{{$image->url}}"
                                                alt="simple blog template bootstrap">
                                        </a>
                                    </div>
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!-- category -->
                                        <a class="p-1 badge badge-primary rounded-0" href="#">@if(isset($image->tittle)){{$image->tittle}}@endif</a>

                                        <!--title-->
                                        <a href="#">
                                            <h2 class="h5 text-white my-1">@if(isset($image->description)){{$image->description}}@endif</h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endif
    @include('stores.list', ['stores' => $stores])
@endsection

<style>
    .b-0 {
    bottom: 0;
    }
    .bg-shadow {
        background: rgba(76, 76, 76, 0);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(179, 171, 171, 0)), color-stop(49%, rgba(48, 48, 48, 0.37)), color-stop(100%, rgba(19, 19, 19, 0.8)));
        background: linear-gradient(to bottom, rgba(179, 171, 171, 0) 0%, rgba(48, 48, 48, 0.71) 49%, rgba(19, 19, 19, 0.8) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=0 );
    }
    .top-indicator {
        right: 0;
        top: 1rem;
        bottom: inherit;
        left: inherit;
        margin-right: 1rem;
    }
    .overflow {
        position: relative;
        overflow: hidden;
    }
    .zoom img {
        transition: all 0.2s linear;
    }
    .zoom:hover img {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>
