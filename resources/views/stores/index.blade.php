@extends('layouts.app')
@section('titulo', 'Negocios')
@section('content')
    <h3 class="display-5 text-center"> Negocios </h3>
    <hr class="bg-dark mb-4 w-25">
    @include('stores.list', ['stores' => $stores->where('activated', true)])
@endsection