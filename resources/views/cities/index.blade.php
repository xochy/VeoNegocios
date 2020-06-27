@extends('layouts.app')
@section('titulo', 'Localidades')
@section('content')
<h3>Localidades</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
		<li class="breadcrumb-item active" aria-current="page">Localidades</li>
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

<a href="{{ route('cities.create') }}" class="btn btn-primary" style="margin-bottom: 20px;"><i class="far fa-plus-square"></i> Agregar localidad</a>

@if ($cities->count() > 0)
<div class="table-responsive">
    <table class="table table-sm table-striped">
        <caption>Lista de Localidades</caption>
        <thead>
        <tr>
            <th scope="col"># Localidad</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de creación</th>
            <th scope="col">Última actualización</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
            @foreach ($cities as $city)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><a href="{{ route('cities.show', $city->slug) }}"><h5 class="font-weight-bold font-italic">
                        {{ $city->name }} <i class="fas fa-mouse-pointer fa-xs"></i></h5></a></td>
                    <td>{{ $city->created_at }}</td>
                    <td>{{ $city->updated_at }}</td>
                    <td><a href="{{ route('cities.edit', $city->slug) }}" class="btn btn-warning btncolorblanco btn-sm"><i class="fa fa-edit"></i> Editar</a></td>
                    <td><a href="{{ route('cities.confirmAction', $city->slug) }}" class="btn btn-danger btncolorblanco btn-sm"><i class="fa fa-trash-alt"></i> Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$cities}}
</div>
@else
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        No hay localidades registradas, para registrar un nuevo país haga <strong>clic en el botón de arriba</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>    
@endif

@endsection