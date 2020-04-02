@extends('layouts.app')
@section('titulo', 'Editar usuario')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edición de Usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @method('PUT')
                        @csrf
                        @include('users.formEdit')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{ route('users.cancelAction', $user) }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection