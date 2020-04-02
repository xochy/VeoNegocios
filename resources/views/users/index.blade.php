@extends('layouts.app')
@section('titulo', 'Usuarios')
@section('content')
<h3>Usuarios</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
		<li class="breadcrumb-item active" aria-current="page">Usuarios</li>
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

@if (Auth::user() != null && Auth::user()->authorizeRolesShow(['administrator', 'collector']))
    <a href="{{ route('users.create') }}" class="btn btn-primary" style="margin-bottom: 20px;"><i class="far fa-plus-square"></i> Crear nuevo usuario</a>
@endif

<table class="table">
    <thead>
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Tipo de Usuario</th>
        <th scope="col">Correo Electrónico</th>
        <th scope="col">Fecha de Creación</th>
        <th scope="col">Última actualización</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
</thead>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->roles()->first()->description}}
                @if ($user->roles()->first()->description == 'Cliente')
                    @if ($user->stores()->first() != null)
                        @if ($user->stores()->first()->activated == true)
                            <span class="badge badge-success">Negocio Activado</span>
                        @else
                            <span class="badge badge-warning">Negocio Desactivado</span>
                        @endif
                    @else
                        <span class="badge badge-danger">Sin Negocio</span>  
                    @endif                  
                @endif
            </td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a></td>
			<td><a href="{{ route('users.confirmAction', $user->id) }}" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Eliminar</a></td>
        </tr>
    @endforeach
</tbody>
</table>
{{$users}}

@endsection