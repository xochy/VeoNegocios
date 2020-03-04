<div class="form-group">
    <label for="">Nombre</label>
    <input type="text" name="name" class="form-control" value="@isset($category->name){{$category->name}}@endisset">
</div>
<div class="form-group">
    <label for="">Descripción</label>
    <input type="text" name="description" class="form-control" value="@isset($category->description){{$category->description}}@endisset">
</div>
<div class="form-group">
    <div class="form-row">
        <div class="col">
            <label for="">Imagen 1</label>
            <div class="custom-file">                
                <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="image1">
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
        </div>
        <div class="col">
            <label for="">Imagen 2</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="image2">
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
        </div>
    </div>
</div>