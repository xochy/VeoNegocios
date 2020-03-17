<div class="form-group">
    <label for="">Nombre</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="imageGroup1"><i class="fas fa-object-group"></i></span>
        </div>
        <input type="text" name="name" class="form-control" value="@isset($category->name){{$category->name}}@endisset">
    </div>   
</div>
<div class="form-group">
    <label for="">Descripción</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="imageGroup1"><i class="fas fa-tag"></i></span>
        </div>
        <input type="text" name="description" class="form-control" value="@isset($category->description){{$category->description}}@endisset">
    </div>    
</div>
<div class="form-row">
    <div class="form-group col-md-6">    
        <label for="">Imagen 1</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="imageGroup1"><i class="fas fa-file-image"></i></span>
            </div>
            <div class="custom-file">                
                <input type="file" class="custom-file-input" id="image1" lang="es" name="image1" aria-describedby="imageGroup1">
                <label class="custom-file-label" for="image1">Seleccionar Archivo</label>
            </div>    
        </div>        
    </div>
    <div class="form-group col-md-6">
        <label for="">Imagen 2</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="imageGroup2"><i class="fas fa-file-image"></i></span>
            </div>
            <div class="custom-file">                
                <input type="file" class="custom-file-input" id="image2" lang="es" name="image2" aria-describedby="imageGroup2">
                <label class="custom-file-label" for="image2">Seleccionar Archivo</label>
            </div>    
        </div>   
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <div class="col text-center">
            <figure class="figure">
                <img class="img-fluid img-thumbnail" id="previewImage1" style="width: 250px; height: 150px; object-fit:cover;"
                @isset($category->images) src="{{'/images/' . $category->images->where('position', 1)->first()->url}}" @endisset />
                <figcaption class="figure-caption">Vista previa de imagen 1</figcaption>
            </figure>
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col text-center">
            <figure class="figure">
                <img class="img-fluid img-thumbnail" id="previewImage2" style="width: 250px; height: 150px; object-fit:cover;"
                @isset($category->images) src="{{'/images/' . $category->images->where('position', 2)->first()->url}}" @endisset />
                <figcaption class="figure-caption">Vista previa de imagen 2</figcaption>
            </figure>
        </div>
    </div>
</div>

<script>
    $('#image1').change(function(){setFileName($(this));readURL(this, '#previewImage1');});
    $('#image2').change(function(){setFileName($(this));readURL(this, '#previewImage2');});

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