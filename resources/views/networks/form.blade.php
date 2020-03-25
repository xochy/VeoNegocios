<div class="form-group">
    <div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fas fa-exclamation-triangle"></i>  
        Si la información de contacto que desea agregar corresponde a las redes sociales de <strong><i class="fab fa-facebook-square"></i> Facebook</strong> o 
        <strong><i class="fab fa-youtube"></i> YouTube</strong>, solo es necesario copiar en el enlace (de una página de Facebook o vídeo de YouTube respectivamente)
         desde la barra de direcciones de su navegador  <i class="fas fa-exclamation-triangle"></i></label>
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label for="contacts">Tipo de contacto</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-portrait"></i></div>
            </div>
            <select name="contacts" id="contact" class="form-control" onchange="changeInputPlaceHolder(event)">
                @foreach ($contacts as $contact)
                    <option @isset($selectedContact)
                        @if ($contact == $selectedContact) selected @endif
                    @endisset
                    value="{{ $contact->id }}">{{ $contact->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-9">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="pac-input">Descripción</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-tag"></i></div>
            </div>
            <input type="text" id="pac-input" name="description" class="form-control @error('description') is-invalid @enderror"
            value="@if(isset($network->description)){{$network->description}}@else{{ old('description') }}@endif">

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <small id="scheduleHelp" class="form-text text-muted">Debe especificar de forma clara la descripción del tipo de contacto, pues los usuarios verán esta información en el apartado de categorías, y en el perfil del mismo negocio.</small>
    </div>
</div>

<script>

    $( document ).ready(function() {
        setTextPlaceHolder(1);
    });

    function changeInputPlaceHolder(e) {

        var idContact = e.target.value;
        setTextPlaceHolder(idContact);
    }

    function setTextPlaceHolder(index){
        var contacts  = @json($contacts);
        var contact   = contacts[index - 1];

        document.getElementById("pac-input").placeholder = contact.placeholder;
    }

</script>