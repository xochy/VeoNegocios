<div class="row" id="accordionStore">     
    @foreach ($stores as $store)
        <div class="col-md-4 mt-5">
            <div class="card text-center">
                <img class="card-img-top" src="/images/{{$store->images->first()->url}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$store->name}}</h5>
                    <hr>
                    <div class="card">
                        <div class="card-header" id="heading{{$store->slug}}">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapse{{$store->slug}}" aria-expanded="false" aria-controls="collapse{{$store->slug}}">
                                    Ver detalles de sucursal...
                                </button>
                            </h2>
                        </div>
                        <div id="collapse{{$store->slug}}" class="collapse" aria-labelledby="heading{{$store->slug}}"
                            data-parent="#accordionStore">
                            <p class="font-weight-normal mt-3">Descripcion</p>
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseMap{{$store->slug}}"
                                    role="button" aria-expanded="false" aria-controls="collapseMap{{$store->slug}}">
                                    <i class="fas fa-map"></i> Mapa
                                </a>
                            </p>
                            <div class="collapse" id="collapseMap{{$store->slug}}">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                <a href="https://goo.gl/maps/drPW7JdCdy62">
                                    <address class="font-italic">Piazza del Colosseo, 1, 00184 Roma RM</address>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col">
                            <a href=""><i class="fas fa-map"></i></a>
                        </div>
                        <div class="col">
                            <a href="mailto:test@test.com"><i class="fas fa-envelope"></i></a>
                        </div>
                        <div class="col">
                            <a href="tel:+123456789"><i class="fas fa-phone"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

