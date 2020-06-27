<div class="form-group">
    <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="pac-input">Nombre</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-comment"></i></span>
        </div>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
        value="@if(isset($city->name)){{$city->name}}@else{{ old('name') }}@endif" autofocus>
    
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <small id="scheduleHelp" class="form-text text-muted">El nombre de la localidad deberá tener un mínimo de 3 caracteres y un máximo de 40 caracteres.</small>
</div>

<div class="form-group">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Debe seleccionar <strong>tres imágenes</strong> <i class="fas fa-images"></i>. Éstas serán mostradas como publicidad en la localidad seleccionada (los títulos y descripciones son opcionales,
        pero tenga en cuenta que, <strong>sin la imagen seleccionada</strong>, <strong>los títulos y descripciones no se almacenarán</strong>).
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<div class="form-group">
    <div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fas fa-exclamation-triangle"></i> 
        <strong>Es obligatorio</strong> seleccionar las tres imágnes <i class="fas fa-images"></i>.<i class="fas fa-exclamation-triangle"></i> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de publicidad 1</label>
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
            <img class="img-fluid img-thumbnail coverImagePublicity" id="previewCoverImage1"
            @isset($store->images)@if($store->hasCoverImage(1)) src="{{$public_dir_images . $store->images->where('position', 1)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de publicidad 1</figcaption>
        </figure>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de publicidad 2</label>
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
            <img class="img-fluid img-thumbnail coverImagePublicity" id="previewCoverImage2"
            @isset($store->images)@if($store->hasCoverImage(2)) src="{{$public_dir_images . $store->images->where('position', 2)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de publicidad 2</figcaption>
        </figure>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de publicidad 3</label>
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
            <img class="img-fluid img-thumbnail coverImagePublicity" id="previewCoverImage3"
            @isset($store->images)@if($store->hasCoverImage(3)) src="{{$public_dir_images . $store->images->where('position', 3)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de publicidad 3</figcaption>
        </figure>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de publicidad 4</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-image"></i></span>
            </div>
            <div class="custom-file">                
                <input type="file" class="custom-file-input" id="coverImage4" lang="es" name="coverImage4">
                <label class="custom-file-label" for="coverImage4">Seleccionar Archivo</label>
            </div>    
        </div> 
    </div> 
    <div class="form-group col-md-3">
        <label for="">Título</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-object-group"></i></span>
            </div>
            <input type="text" name="tittleCoverImage4" class="form-control @error('tittleCoverImage4') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasTittleCoverImage(4)) value="{{$store->images->where('position', 4)->first()->tittle}}" @endif
            @else
                value="{{ old('tittleCoverImage4') }}"
            @endif>

            @error('tittleCoverImage4')
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
            <input type="text" name="descriptionCoverImage4" class="form-control @error('descriptionCoverImage4') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasDescriptionCoverImage(4)) value="{{$store->images->where('position', 4)->first()->description}}" @endif
            @else
                value="{{ old('descriptionCoverImage4') }}"
            @endif>

            @error('descriptionCoverImage4')
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
            <img class="img-fluid img-thumbnail coverImagePublicity" id="previewCoverImage4"
            @isset($store->images)@if($store->hasCoverImage(4)) src="{{$public_dir_images . $store->images->where('position', 4)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de publicidad 4</figcaption>
        </figure>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de publicidad 5</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-image"></i></span>
            </div>
            <div class="custom-file">                
                <input type="file" class="custom-file-input @error('coverImage5') is-invalid @enderror" id="coverImage5" lang="es" name="coverImage5">
                <label class="custom-file-label" for="coverImage5">Seleccionar Archivo</label>

                @error('coverImage5')
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
            <input type="text" name="tittleCoverImage5" class="form-control @error('tittleCoverImage5') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasTittleCoverImage(5)) value="{{$store->images->where('position', 5)->first()->tittle}}" @endif
            @else
                value="{{ old('tittleCoverImage5') }}"
            @endif>
        
            @error('tittleCoverImage5')
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
            <input type="text" name="descriptionCoverImage5" class="form-control @error('descriptionCoverImage5') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasDescriptionCoverImage(5)) value="{{$store->images->where('position', 5)->first()->description}}" @endif
            @else
                value="{{ old('descriptionCoverImage5') }}"
            @endif>
        
            @error('descriptionCoverImage5')
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
            <img class="img-fluid img-thumbnail coverImageMiniPublicity" id="previewCoverImage5"
            @isset($store->images)@if($store->hasCoverImage(5)) src="{{$public_dir_images . $store->images->where('position', 5)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de publicidad 5</figcaption>
        </figure>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de publicidad 6</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-image"></i></span>
            </div>
            <div class="custom-file">                
                <input type="file" class="custom-file-input" id="coverImage6" lang="es" name="coverImage6">
                <label class="custom-file-label" for="coverImage6">Seleccionar Archivo</label>
            </div>    
        </div> 
    </div> 
    <div class="form-group col-md-3">
        <label for="">Título</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-object-group"></i></span>
            </div>
            <input type="text" name="tittleCoverImage6" class="form-control @error('tittleCoverImage6') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasTittleCoverImage(6)) value="{{$store->images->where('position', 6)->first()->tittle}}" @endif
            @else
                value="{{ old('tittleCoverImage6') }}"
            @endif>

            @error('tittleCoverImage6')
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
            <input type="text" name="descriptionCoverImage6" class="form-control @error('descriptionCoverImage6') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasDescriptionCoverImage(6)) value="{{$store->images->where('position', 6)->first()->description}}" @endif
            @else
                value="{{ old('descriptionCoverImage6') }}"
            @endif>

            @error('descriptionCoverImage6')
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
            <img class="img-fluid img-thumbnail coverImageMiniPublicity" id="previewCoverImage6"
            @isset($store->images)@if($store->hasCoverImage(6)) src="{{$public_dir_images . $store->images->where('position', 6)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de publicidad 6</figcaption>
        </figure>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de publicidad 7</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-image"></i></span>
            </div>
            <div class="custom-file">                
                <input type="file" class="custom-file-input" id="coverImage7" lang="es" name="coverImage7">
                <label class="custom-file-label" for="coverImage7">Seleccionar Archivo</label>
            </div>    
        </div> 
    </div> 
    <div class="form-group col-md-3">
        <label for="">Título</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-object-group"></i></span>
            </div>
            <input type="text" name="tittleCoverImage7" class="form-control @error('tittleCoverImage7') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasTittleCoverImage(7)) value="{{$store->images->where('position', 7)->first()->tittle}}" @endif
            @else
                value="{{ old('tittleCoverImage7') }}"
            @endif>

            @error('tittleCoverImage7')
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
            <input type="text" name="descriptionCoverImage7" class="form-control @error('descriptionCoverImage7') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasDescriptionCoverImage(7)) value="{{$store->images->where('position', 7)->first()->description}}" @endif
            @else
                value="{{ old('descriptionCoverImage7') }}"
            @endif>

            @error('descriptionCoverImage7')
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
            <img class="img-fluid img-thumbnail coverImageMiniPublicity" id="previewCoverImage7"
            @isset($store->images)@if($store->hasCoverImage(7)) src="{{$public_dir_images . $store->images->where('position', 7)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de publicidad 7</figcaption>
        </figure>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de publicidad 8</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-image"></i></span>
            </div>
            <div class="custom-file">                
                <input type="file" class="custom-file-input" id="coverImage8" lang="es" name="coverImage8">
                <label class="custom-file-label" for="coverImage8">Seleccionar Archivo</label>
            </div>    
        </div> 
    </div> 
    <div class="form-group col-md-3">
        <label for="">Título</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-object-group"></i></span>
            </div>
            <input type="text" name="tittleCoverImage8" class="form-control @error('tittleCoverImage8') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasTittleCoverImage(8)) value="{{$store->images->where('position', 8)->first()->tittle}}" @endif
            @else
                value="{{ old('tittleCoverImage8') }}"
            @endif>

            @error('tittleCoverImage8')
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
            <input type="text" name="descriptionCoverImage8" class="form-control @error('descriptionCoverImage8') is-invalid @enderror"
            @if (isset($store->images))
                @if($store->hasDescriptionCoverImage(8)) value="{{$store->images->where('position', 8)->first()->description}}" @endif
            @else
                value="{{ old('descriptionCoverImage8') }}"
            @endif>

            @error('descriptionCoverImage8')
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
            <img class="img-fluid img-thumbnail coverImageMiniPublicity" id="previewCoverImage8"
            @isset($store->images)@if($store->hasCoverImage(8)) src="{{$public_dir_images . $store->images->where('position', 8)->first()->url}}" @endif @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de publicidad 8</figcaption>
        </figure>
    </div>
</div>

<script>
    $('#coverImage1').change(function(){setFileName($(this));readURL(this, '#previewCoverImage1');});
    $('#coverImage2').change(function(){setFileName($(this));readURL(this, '#previewCoverImage2');});
    $('#coverImage3').change(function(){setFileName($(this));readURL(this, '#previewCoverImage3');});
    $('#coverImage4').change(function(){setFileName($(this));readURL(this, '#previewCoverImage4');});
    $('#coverImage5').change(function(){setFileName($(this));readURL(this, '#previewCoverImage5');});
    $('#coverImage6').change(function(){setFileName($(this));readURL(this, '#previewCoverImage6');});
    $('#coverImage7').change(function(){setFileName($(this));readURL(this, '#previewCoverImage7');});
    $('#coverImage8').change(function(){setFileName($(this));readURL(this, '#previewCoverImage8');});

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