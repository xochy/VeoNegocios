@extends('layouts.app')    
@section('titulo', 'Crear categoría')
@section('content')
<h3>Registro de producto</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
        <li class="breadcrumb-item"><a href="/categories/{{ $store->category->slug }}">{{$store->category->name}}</a></li>
        <li class="breadcrumb-item"><a href="/stores/{{ $store->slug }}">{{$store->name}}</a></li>
		<li class="breadcrumb-item active" aria-current="page">Agregar nuevo producto</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de registro de producto
        <small id="scheduleHelp" class="form-text text-muted">Los campos obligatorios están marcados con el símbolo <i class="fas fa-star-of-life colorFormRequiredIcon"></i></small>
    </div>
    <div class="card-body">
        @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('products.storeFromStore', $store->slug) }}" enctype="multipart/form-data">
            @csrf
            @include('products.form')
            <button id="guardar" type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
        </form>
<div class="progress">
  <div id="progreso" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function() {

    $("#guardar").click(function(){
    $("#guardar").css('disabled','true');  
    $("#progreso").css('width','5%');

        setTimeout(function(){
            $("#progreso").css('width','20%');
            setTimeout(nextNotice, 2000);
             
        },2000)

        function nextNotice()
        {
        $("#progreso").css('width','35%');
        setTimeout(nextNotice2, 2000);
        }

        function nextNotice2()
        {
        $("#progreso").css('width','40%');
        setTimeout(nextNotice3, 2000);
        }

         function nextNotice3()
        {
        $("#progreso").css('width','45%');
        setTimeout(nextNotice4, 2000);
        }

         function nextNotice4()
        {
        $("#progreso").css('width','47%');
        setTimeout(nextNotice5, 2000);
        }
        function nextNotice5()
        {
        $("#progreso").css('width','50%');
        setTimeout(nextNotice6, 2000);
        }
        function nextNotice6()
        {
        $("#progreso").css('width','52%');
        setTimeout(nextNotice7, 2000);
        }
        function nextNotice7()
        {
        $("#progreso").css('width','55%');
        setTimeout(nextNotice8, 2000);
        }
        function nextNotice8()
        {
        $("#progreso").css('width','60%');
        setTimeout(nextNotice9, 2000);
        }
        function nextNotice9()
        {
        $("#progreso").css('width','62%');
        setTimeout(nextNotice10, 2000);
        }
        function nextNotice10()
        {
        $("#progreso").css('width','64%');
        setTimeout(nextNotice11, 2000);
        }
        function nextNotice11()
        {
        $("#progreso").css('width','65%');
        setTimeout(nextNotice12, 2000);
        }
        function nextNotice12()
        {
        $("#progreso").css('width','70%');
        setTimeout(nextNotice13, 2000);
        }
        function nextNotice13()
        {
        $("#progreso").css('width','75%');
        setTimeout(nextNotice14, 2000);
        }
         function nextNotice14()
        {
        $("#progreso").css('width','80%');
        setTimeout(nextNotice15, 2000);
        }
         function nextNotice15()
        {
        $("#progreso").css('width','85%');
        setTimeout(nextNotice16, 2000);
        }
         function nextNotice16()
        {
        $("#progreso").css('width','90%');
        setTimeout(nextNotice17, 2000);
        }
         function nextNotice17()
        {
        $("#progreso").css('width','95%');
        setTimeout(nextNotice18, 2000);
        }
         function nextNotice18()
        {
        $("#progreso").css('width','100%');
        
        }

    });

});
</script>
@endsection