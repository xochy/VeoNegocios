<div class="row" id="accordionStore">     
    @foreach ($stores as $store)
        <div class="col-md-4 mt-5">
            <div class="card text-center h-100 d-flex flex-column justify-content-between">
                <div class="card-img">
                    <a href="/stores/{{ $store->slug }}">
                        <img class="card-img-top" src="{{$public_dir_images . $store->images->first()->url}}" alt="Card image cap">
                        <span style="background: #2e84d1;"><h4><i class="fas fa-star"></i> {{number_format((float)$store->score, 1, '.', '')}}</h4></span>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{$store->name}}</h4>
                    <button style="margin: 10px 0 10px 0; width: 100%;" type="button" class="btn btn-primary" data-toggle="modal" 
                    data-target="#example{{$store->slug}}" onclick="loadMap({{$store->addresses}})">
                        <i class="fas fa-info-circle fa-lg"></i> Ver detalles de sucursales...
                    </button>

                    <div class="modal fade" id="example{{$store->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$store->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="font-weight-normal mt-3">{{$store->description}}</p>
                                    <nav>
                                        <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                                            @foreach ($store->addresses as $address)
                                                @if ($loop->first)
                                                    <a class="nav-item nav-link active btn btn-info" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                                    aria-controls="nav-home" aria-selected="true">Sucursal 1</a>
                                                @else
                                                    <a class="nav-item nav-link btn btn-info" id="nav-profile-tab{{$address->slug}}" data-toggle="tab" href="#nav-profile{{$address->slug}}" role="tab"
                                                    aria-controls="nav-profile" aria-selected="false">Sucursal {{$loop->iteration}}</a>
                                                @endif
                                            @endforeach        
                                        </div>
                                    </nav>
                                    <div class="tab-content">
                                        @foreach ($store->addresses as $address)
                                            <div class="tab-pane fade @if($loop->first)show active @endif" @if($loop->first) id="nav-home" @else id="nav-profile{{$address->slug}}" @endif role="tabpanel" @if($loop->first) aria-labelledby="nav-home-tab" @else aria-labelledby="nav-profile-tab{{$address->slug}}" @endif>
                                                <div class="card mb-3">
                                                    <div style="height: 250px">
                                                        <div id="{{$address->slug}}" class="map"></div>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{$address->address_address}}</h5>
                                                        <p class="card-text">{{$address->reference}}</p>
                                                        <p class="card-text"><small class="text-muted"><i class="fas fa-clock"></i> {{$address->schedule}}</small></p>
                                                    </div>
                                                </div>                    
                                            </div>
                                        @endforeach
                                    </div>  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <a href="/stores/{{ $store->slug }}" role="button" class="btn btn-success">Visitar {{$store->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        @forelse ($store->networks as $network)

                            @if (App\Contact::where('name', 'YouTube')->first()->id == $network->contact_id || App\Contact::where('name', 'Facebook')->first()->id == $network->contact_id)
                                <div class="col">
                                    <a href="{{$network->description}}"><i class="{{App\Contact::where('id', $network->contact_id)->first()->iconClass}} colorStoreRequiredIcon fa-lg"></i></a>
                                </div>
                            @else
                                <div class="col">
                                    <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="{{App\Contact::where('id', $network->contact_id)->first()->name}}"
                                        data-content="{{$network->description}}">
                                        <i class="{{App\Contact::where('id', $network->contact_id)->first()->iconClass}} colorStoreRequiredIcon fa-lg"></i></a>
                                </div>
                            @endif
                        @empty
                            <div class="col">
                                <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Contactos/Redes Sociales" data-content="No se han agregado contanctos ni redes sociales"><i class="fas fa-phone-slash colorStoreRequiredIcon fa-lg"></i></a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@if($stores instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <hr>
    {{ $stores->links() }}
@endif


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRs1LSFxl7j1LCaiOU_CNO3r5N0PTxCY4&libraries=places" async defer ></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    function loadMap(addresses, slug) {
        addresses.forEach(address => {
            myLatlng = new google.maps.LatLng(address.address_latitude, address.address_longitude);

            var myOptions = { 
                    zoom: 15, 
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
                    draggable: false
                });

                marker.setMap(map); 
        });
    }
</script>

