@extends('layouts.app')
@section('titulo', 'Editar usuario')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Registro de Usuario')}} 
                 @isset($prospecto) 
                    {{$prospecto}}         
                 @endisset </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        @include('users.formCreate')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
