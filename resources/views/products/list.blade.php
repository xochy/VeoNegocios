<div class="row">
    @forelse ($products as $product)
        <div class="col-md-4 mt-3">
            <div class="card h-100 d-flex flex-column justify-content-between">
                <div class="card-img">
                    <img class="card-img-top" src="/storage/{{$product->Images->first()->url}}" alt="Card image cap">
                    @if($product->offered == 1) <span><h4>Oferta</h4></span> @endif
                </div>
                <div class="card-block p-3" >
                    <h5 class="card-title">{{$product->name}}</h5>
                    <div>
                    <p class="card-text">{{$product->description}}</p>
                    </div>
                    @if($product->price != '$0.00') <h2>{{$product->price}}</h2> @endif
                    {{-- <a href="#" class="btn btn-primary mb-2">Ver más...</a> --}}
                </div>
                @if (Auth::user() != null && (Auth::user()->authorizeRolesShow(['administrator', 'collector']) ||
                    (Auth::user()->roles()->first()->name == 'costumer' && Auth::user()->id == $store->user_id)))
                    <div class="card-footer">
                        <small class="text-muted">Agregado el {{$product->created_at}} </small><br>
                        <small class="text-muted">Última modificación: {{$product->updated_at}} </small><br><br>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('products.edit', $product->slug )}}"><i class="far fa-edit"></i> Editar</a>
                        <a class="btn btn-outline-danger btn-sm" href="{{ route('products.confirmAction', $product->slug )}}"><i class="far fa-trash-alt"></i> Eliminar</a>
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="container">
            <h6>No existen productos
                @if (Auth::user() != null && (Auth::user()->authorizeRolesShow(['administrator', 'collector']) ||
                    (Auth::user()->roles()->first()->name == 'costumer' && Auth::user()->id == $store->user_id)))
                    <span class="badge badge-warning">Puede hacer clic en el botón de arriba para agregar un nuevo producto</span>
                @endif
            </h6>
        </div>
    @endforelse
</div>

<div class="mt-3">
    {{$products->links()}}
</div>
