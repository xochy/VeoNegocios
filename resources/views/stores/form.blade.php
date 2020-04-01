{{-- campo para el nombre del negocio --}}
<div class="form-group">
    <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Nombre</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Ej. VeoNegocios"
    value="@if(isset($store->name)){{$store->name}}@else{{ old('name') }}@endif" autofocus>

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>
<div class="form-group">
    <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Descripción</label>
    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Ej. Somos una empresea dedicada a la publicidad"
    value="@if(isset($store->description)){{$store->description}}@else{{ old('description') }}@endif">

    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Deberá seleccionar <strong>una imagen</strong> <i class="fas fa-image"></i> que represente a su negocio. Ésta será mostrada como<strong> imagen de perfil </strong>dentro de su categoría correspondiente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<div class="form-group">
    <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de perfil de negocio</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-image"></i></i></span>
        </div>
        <div class="custom-file">                
            <input type="file" class="custom-file-input @error('profileImage') is-invalid @enderror" id="profileImage" lang="es" name="profileImage" aria-describedby="imageGroup1">
            <label class="custom-file-label" for="profileImage">Seleccionar Archivo</label>

            @error('profileImage')
                <span class="invalid-tooltip" role="alert">{{ $message }}</span>
            @enderror  
        </div>    
    </div>  
</div>
<div class="form-group">
    <div class="col text-center">
        <figure class="figure"> 
            {{-- Vista previa de la imagen de perfil del negocio --}}
            <img class="img-fluid img-thumbnail profileImage" id="previewProfileImage" 
            @isset($store->images)@if($store->hasCoverImage(0)) src="{{$public_dir_images . $store->images->where('position', 0)->first()->url}}" @endif @endisset/>
            <figcaption class="figure-caption">Vista previa de imagen de perfil de negocio</figcaption>
        </figure>    
    </div>
</div>
<div class="form-group">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Puede seleccionar <strong>tres imágenes</strong> <i class="fas fa-images"></i>. Éstas serán mostradas como imágenes de portada en el perfil de su negocio (los títulos y descripciones son opcionales,
        pero tenga en cuenta que, <strong>sin la imagen seleccionada</strong>, <strong>los títulos y descripciones no se almacenarán</strong>).
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<div class="form-group">
    <div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fas fa-exclamation-triangle"></i> 
        <strong>No es necesario</strong> seleccionar las tres imágnes <i class="fas fa-images"></i>, pero si <strong>es obligatorio seleccionar al menos una (imagen 1 de portada)</strong>.<i class="fas fa-exclamation-triangle"></i> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de portada 1</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-image"></i></span>
            </div>
            <div class="custom-file">                
                <input type="file" class="custom-file-input @error('coverImage1') is-invalid @enderror" id="coverImage1" lang="es" name="coverImage1">
                <label class="custom-file-label" for="coverImage1">Seleccionar Archivo</label>

                @error('coverImage1')
                    <span class="invalid-tooltip" role="alert">{{ $message }}</span>
                @enderror  
            </div>    
        </div> 
    </div> 
    <div class="form-group col-md-3">
        <label for="">Título</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-object-group"></i></span>
            </div>
            <input type="text" name="tittleCoverImage1" class="form-control @error('tittleCoverImage1') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasTittleCoverImage(1)) value="{{$store->images->where('position', 1)->first()->tittle}}" @endif
            @else
                value="{{ old('tittleCoverImage1') }}"
            @endif>
        
            @error('tittleCoverImage1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>  
    </div>
    <div class="form-group col-md-6">
        <label for="">Descripción</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-tag"></i></span>
            </div>
            <input type="text" name="descriptionCoverImage1" class="form-control @error('descriptionCoverImage1') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasDescriptionCoverImage(1)) value="{{$store->images->where('position', 1)->first()->description}}" @endif
            @else
                value="{{ old('descriptionCoverImage1') }}"
            @endif>
        
            @error('descriptionCoverImage1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>    
    </div>
</div>
<div class="form-group">
    <div class="col text-center">
        <figure class="figure">
            <img class="img-fluid img-thumbnail coverImage" id="previewCoverImage1"
            @isset($store->images)@if($store->hasCoverImage(1)) src="{{$public_dir_images . $store->images->where('position', 1)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de portada 1</figcaption>
        </figure>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label for="">Imagen de portada 2</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-image"></i></span>
            </div>
            <div class="custom-file">                
                <input type="file" class="custom-file-input" id="coverImage2" lang="es" name="coverImage2">
                <label class="custom-file-label" for="coverImage2">Seleccionar Archivo</label>
            </div>    
        </div> 
    </div> 
    <div class="form-group col-md-3">
        <label for="">Título</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-object-group"></i></span>
            </div>
            <input type="text" name="tittleCoverImage2" class="form-control @error('tittleCoverImage2') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasTittleCoverImage(2)) value="{{$store->images->where('position', 2)->first()->tittle}}" @endif
            @else
                value="{{ old('tittleCoverImage2') }}"
            @endif>

            @error('tittleCoverImage2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>  
    </div>
    <div class="form-group col-md-6">
        <label for="">Descripción</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-tag"></i></span>
            </div>
            <input type="text" name="descriptionCoverImage2" class="form-control @error('descriptionCoverImage2') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasDescriptionCoverImage(2)) value="{{$store->images->where('position', 2)->first()->description}}" @endif
            @else
                value="{{ old('descriptionCoverImage2') }}"
            @endif>

            @error('descriptionCoverImage2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>    
    </div>
</div>
<div class="form-group">
    <div class="col text-center">
        <figure class="figure">
            <img class="img-fluid img-thumbnail coverImage" id="previewCoverImage2"
            @isset($store->images)@if($store->hasCoverImage(2)) src="{{$public_dir_images . $store->images->where('position', 2)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de portada 2</figcaption>
        </figure>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label for="">Imagen de portada 3</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-image"></i></span>
            </div>
            <div class="custom-file">                
                <input type="file" class="custom-file-input" id="coverImage3" lang="es" name="coverImage3">
                <label class="custom-file-label" for="coverImage3">Seleccionar Archivo</label>
            </div>    
        </div> 
    </div> 
    <div class="form-group col-md-3">
        <label for="">Título</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-object-group"></i></span>
            </div>
            <input type="text" name="tittleCoverImage3" class="form-control @error('tittleCoverImage3') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasTittleCoverImage(3)) value="{{$store->images->where('position', 3)->first()->tittle}}" @endif
            @else
                value="{{ old('tittleCoverImage3') }}"
            @endif>

            @error('tittleCoverImage3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>  
    </div>
    <div class="form-group col-md-6">
        <label for="">Descripción</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-tag"></i></span>
            </div>
            <input type="text" name="descriptionCoverImage3" class="form-control @error('descriptionCoverImage3') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasDescriptionCoverImage(3)) value="{{$store->images->where('position', 3)->first()->description}}" @endif
            @else
                value="{{ old('descriptionCoverImage3') }}"
            @endif>

            @error('descriptionCoverImage3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>    
    </div>
</div>
<div class="form-group">
    <div class="col text-center">
        <figure class="figure">
            <img class="img-fluid img-thumbnail coverImage" id="previewCoverImage3"
            @isset($store->images)@if($store->hasCoverImage(3)) src="{{$public_dir_images . $store->images->where('position', 3)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de portada 3</figcaption>
        </figure>
    </div>
</div>

<script>
    $('#profileImage').change(function(){setFileName($(this));readURL(this, '#previewProfileImage');});
    $('#coverImage1').change(function(){setFileName($(this));readURL(this, '#previewCoverImage1');});
    $('#coverImage2').change(function(){setFileName($(this));readURL(this, '#previewCoverImage2');});
    $('#coverImage3').change(function(){setFileName($(this));readURL(this, '#previewCoverImage3');});

    function setFileName(input){
        var fileName = input.val();
        input.next('.custom-file-label').html(fileName.replace(/^.*\\/, ""));
    }

    function readURL(input, frame) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function(e) {
                $(frame).attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>