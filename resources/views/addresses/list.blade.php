<div class="row">
    <div class="col-md-12">        
        <nav>
            <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                @forelse ($store->addresses as $address)
                    @if ($loop->first)
                        <a class="nav-item nav-link active btn btn-info" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Sucursal 1</a>
                    @else
                        <a class="nav-item nav-link btn btn-info" id="nav-profile-tab{{$address->slug}}" data-toggle="tab" href="#nav-profile{{$address->slug}}" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Sucursal {{$loop->iteration}}</a>
                    @endif
                @empty
                <h6 class="mt-3">No existen direcciones <span class="badge badge-warning">Puede hacer clic en el botón de arriba para agregar una nueva dirección</span></h6>
                @endforelse         
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @foreach ($store->addresses as $address)
                <div class="tab-pane fade @if($loop->first)show active @endif" @if($loop->first) id="nav-home" @else id="nav-profile{{$address->slug}}" @endif role="tabpanel" @if($loop->first) aria-labelledby="nav-home-tab" @else aria-labelledby="nav-profile-tab{{$address->slug}}" @endif>
                    <div class="card mb-3">
                        <div style="height: 300px">
                            <div id="{{$address->slug}}" class="map"></div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$address->address_address}}</h5>
                            <p class="card-text">{{$address->reference}}</p>
                            <p class="card-text"><small class="text-muted"><i class="fas fa-clock"></i> {{$address->schedule}}</small></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Agregado el {{$address->created_at}} </small><br>
                            <small class="text-muted">Última modificación: {{$address->created_at}} </small><br><br>
                            <a class="btn btn-outline-primary btn-sm" href="{{ route('addresses.edit', $address->slug )}}"><i class="far fa-edit"></i> Editar</a>
                            <a class="btn btn-outline-danger btn-sm" href="{{ route('addresses.confirmAction', $address->slug )}}"><i class="far fa-trash-alt"></i> Eliminar</a>
                        </div>
                    </div>                    
                </div>
            @endforeach
        </div>         
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRs1LSFxl7j1LCaiOU_CNO3r5N0PTxCY4&libraries=places&callback=initMap" async defer ></script>
<script>
function initMap() {
    
    var addresses = @json($store->addresses);
    var storeName = @json($store->name);

    addresses.forEach(address => {
        myLatlng = new google.maps.LatLng(address.address_latitude, address.address_longitude);

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

            map = new google.maps.Map(document.getElementById(address.slug), myOptions);

            marker = new google.maps.Marker({ 
                position: myLatlng, 
                draggable: false, 
                title:"Coloca este marcador en la ubicación de " + storeName
            });

            marker.setMap(map); 
    });
    
}
</script>