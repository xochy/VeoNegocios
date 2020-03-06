@extends('layouts.app')    
@section('titulo', 'Crear categoría')
@section('content')
<h3>Registro de dirección</h3>

<div class="card">
    <div class="card-header">Formulario de registro de dirección</div>
    <div class="card-body">
        @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('addresses.store') }}" enctype="multipart/form-data">
            @csrf
            @include('addresses.form')
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
        </form>
    </div>
</div>

@endsection

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRs1LSFxl7j1LCaiOU_CNO3r5N0PTxCY4&libraries=places&callback=initMap" async defer >
</script>

<script>
    var map;
    var myLatlng;
    var cities = {
    'an': {
        center: {lat: 19.01680206256661, lng: -102.20621865081787},
        zoom: 13,
        name: 'Antúnez'
        },
    'ap': {
        center: {lat: 19.08695726576024, lng: -102.3545578994751},
        zoom: 13,
        name: 'Apatzingán'
        }
    };

    function getCoords(marker){ 
        document.getElementById("cordenadax").value='Latitud: '+marker.getPosition().lat(); 
        document.getElementById("cordenaday").value='Longitud: '+marker.getPosition().lng(); 
    }

    function initMap() {
        
        myLatlng = new google.maps.LatLng(19.01680206256661, -102.20621865081787);

        var myOptions = { 
            zoom: 13, 
            center: myLatlng,   
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControl: true,
            mapTypeControl: false,
            disableDefaultUI: true,
            types: ['(cities)'],
            componentRestrictions: {country: 'mx'}
        } 

        map = new google.maps.Map(document.getElementById("map-canvas"), myOptions); 
     
        marker = new google.maps.Marker({ 
            position: myLatlng, 
            draggable: true, 
            title:"Coloca este marcador en la ubicación de tu negocio" 
        });

        google.maps.event.addListener(marker, "dragend", function() { 
            getCoords(marker); 
        }); 
     
        marker.setMap(map); 
        getCoords(marker); 

        var input = document.getElementById('pac-input');
        autocomplete = new google.maps.places.Autocomplete(input, myOptions);

        

        //! Add a DOM event listener to react when the user selects a country.
        document.getElementById('city').addEventListener(
            'change', setAutocompleteCountry);
    }

    function setAutocompleteCountry() {
        var city = document.getElementById('city').value;
        map.setCenter(cities[city].center);
        map.setZoom(cities[city].zoom);
        
        myLatlng = new google.maps.LatLng(cities[city].center.lat, cities[city].center.lng);
        marker.setPosition(myLatlng);

        getCoords(marker);
    }   
</script>