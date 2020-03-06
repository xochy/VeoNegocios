<div class="form-row">
    <div class="form-group col-md-3">
        <label for="selectCity">Ciudad</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-map-marked-alt"></i></i></div>
            </div>
            <select id="city" class="form-control">
                <option value="an">Antúnez</option>
                <option value="ap">Apatzingán</option>
            </select>
        </div>
    </div>

    <div class="form-group col-md-9">
        <label for="pac-input">Dirección</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
            </div>
            <input type="text" id="pac-input" name="name" class="form-control" placeholder="Ej. Av. Lázaro Cárdenas #31, Col. Centro"
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
                <input id="cordenadax" name="x" class="form-control form-control-sm" type="text" readonly>
            </div>
        </div>
        <div class="col">
            <label>Longitud</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-map-pin"></i></div>
                </div>
                <input id="cordenaday" name="y" class="form-control form-control-sm" type="text" readonly>
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
        <input type="text" name="description" class="form-control" placeholder="Ej. Aún lado de la Escuela Primaria Ignacio López Rayón; entre calles Independencia y Revolución"
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
        <input type="text" name="description" class="form-control" placeholder="Ej. Lunes a Viernes de 09:00 am a 07:00 pm; Sábados 09:00 am a 02:00 pm" aria-describedby="scheduleHelp"
        value="@isset($address->reference){{$address->reference}}@endisset">        
    </div>
    <small id="scheduleHelp" class="form-text text-muted">Es recomendable especificar si los horarios cambian en relación a los días, así como si existen días no laborables entre semana.</small>
</div>