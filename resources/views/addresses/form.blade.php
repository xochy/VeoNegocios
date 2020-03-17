<div class="form-row">
    <div class="form-group col-md-3">
        <label for="selectCity">Ciudad</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-map-marked-alt"></i></i></div>
            </div>
            <select name="cities" id="city" class="form-control">
                @foreach ($cities as $city)
                    <option @isset($selectedCity)
                        @if ($city == $selectedCity) selected @endif
                    @endisset
                    value="{{ $city->slug }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-9">
        <label for="pac-input">Dirección</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
            </div>
            <input type="text" id="pac-input" name="address_address" class="form-control" placeholder="Ej. Av. Lázaro Cárdenas #31, Col. Centro"
            value="@isset($address->address_address){{$address->address_address}}@endisset">
        </div>
    </div>
</div>

<div class="form-group">
    <label id="msjmarker" class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i>  
        Si es necesario, deberá <strong>colocar el puntero ( <i class="fas fa-map-marker-alt" style="color: #ff0000;"></i> ) del mapa</strong> en el lugar correcto para marcar su ubicación de forma más exacta  <i class="fas fa-exclamation-triangle"></i></label>
	<div id="map-canvas"></div>
</div>

<div class="form-group">
    <div class="form-row">
        <div class="col">            
            <label>Latitud</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-map-pin"></i></div>
                </div>
                <input id="cordenadax" name="address_latitude" class="form-control form-control-sm" type="text" readonly>
            </div>
        </div>
        <div class="col">
            <label>Longitud</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-map-pin"></i></div>
                </div>
                <input id="cordenaday" name="address_longitude" class="form-control form-control-sm" type="text" readonly>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="">Referencias</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-hand-point-right"></i></div>
        </div>
        <input type="text" name="reference" class="form-control" placeholder="Ej. Aún lado de la Escuela Primaria Ignacio López Rayón; entre calles Independencia y Revolución"
        value="@isset($address->reference){{$address->reference}}@endisset">
    </div>
    <small id="scheduleHelp" class="form-text text-muted">Es recomendable especificar referencias claras respecto a su domicilio, pues será más sencillo para las personas conocer su ubicación.</small>
</div>

<div class="form-group">
    <label for="">Horario</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-clock"></i></div>
        </div>
        <input type="text" name="schedule" class="form-control" placeholder="Ej. Lunes a Viernes de 09:00 am a 07:00 pm; Sábados 09:00 am a 02:00 pm" aria-describedby="scheduleHelp"
        value="@isset($address->reference){{$address->reference}}@endisset">        
    </div>
    <small id="scheduleHelp" class="form-text text-muted">Es recomendable especificar si los horarios cambian en relación a los días, así como si existen días no laborables entre semana.</small>
</div>

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
        },
    'ni': {
        center: {lat: 19.023942784662943, lng: -102.09309380340576},
        zoom: 13,
        name: 'Apatzingán'
        }
    };

    function getCoords(marker){ 
        document.getElementById("cordenadax").value= marker.getPosition().lat(); 
        document.getElementById("cordenaday").value= marker.getPosition().lng(); 
    }

    function initMap() {
        
        @if(isset($selectedCity))
            var latitude = @json($address->address_latitude);
            var longitude = @json($address->address_longitude);

            myLatlng = new google.maps.LatLng(latitude, longitude);
        @else
            myLatlng = new google.maps.LatLng(19.01680206256661, -102.20621865081787);
        @endif        

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