<div class="row">
    <div class="col-md-12">    
        <nav>
            <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                @forelse ($store->networks as $network)
                <a class="nav-item nav-link btn btn-{{App\Contact::where('id', $network->contact_id)->first()->color}} @if ($loop->first) active @endif" id="nav-{{$loop->iteration}}-tab" data-toggle="tab" href="#nav-{{$loop->iteration}}" role="tab"
                    aria-controls="nav-{{$loop->iteration}}" aria-selected="true"><i class="{{App\Contact::where('id', $network->contact_id)->first()->iconClass}}"></i> {{App\Contact::where('id', $network->contact_id)->first()->name}}</a>
                @empty
                    <h6 class="mt-3">No existen contactos 
                        @if (Auth::user()->authorizeRolesShow(['administrator', 'collector', 'costumer']))
                            <span class="badge badge-warning">Puede hacer clic en el botón de arriba para agregar un nuevo contacto</span>
                        @endif
                    </h6>
                @endforelse
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @foreach ($store->networks as $network)
                <div class="tab-pane fade @if($loop->first)show active @endif" id="nav-{{$loop->iteration}}" role="tabpanel" aria-labelledby="nav-{{$loop->iteration}}-tab">
                    <div class="card mb-3">
                        @if (App\Contact::where('name', 'YouTube')->first()->id == $network->contact_id)
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$network->description}}" allowfullscreen></iframe>
                            </div>
                        @elseif(App\Contact::where('name', 'Facebook')->first()->id == $network->contact_id)
                            <div class="col-xs-1 text-center">
                                <div class="fb-page" data-href="{{$network->description}}" data-tabs="timeline" data-width="350" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="{{$network->description}}" class="fb-xfbml-parse-ignore"><a href="{{$network->description}}">Radioactive Streaming</a></blockquote></div>
                            </div>
                        @else
                        <div class="container">
                            <h4>{{$network->description}}</h4>
                        </div>
                        @endif
                        @if (Auth::user() != null && Auth::user()->authorizeRolesShow(['administrator', 'collector', 'costumer']))
                            <div class="card-footer">
                                <small class="text-muted">Agregado el {{$network->created_at}} </small><br>
                                <small class="text-muted">Última modificación: {{$network->updated_at}} </small><br><br>
                                <a class="btn btn-outline-primary btn-sm" href="{{ route('networks.edit', $network->id )}}"><i class="far fa-edit"></i> Editar</a>
                                <a class="btn btn-outline-danger btn-sm" href="{{ route('networks.confirmAction', $network->id )}}"><i class="far fa-trash-alt"></i> Eliminar</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>