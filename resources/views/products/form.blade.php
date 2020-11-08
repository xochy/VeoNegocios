<div class="form-row">
    <div class="form-group col-md-8">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Nombre</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="imageGroup1"><i class="fas fa-object-group"></i></span>
            </div>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="@if(isset($product->name)){{$product->name}}@else{{ old('name') }}@endif" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <small id="scheduleHelp" class="form-text text-muted">Debe especificar el nombre correcto del producto o servicio que ofrece.</small>
    </div>
    <div class="form-group col-md-4">
        <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Precio</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="imageGroup1"><i class="fas fa-dollar-sign"></i></span>
            </div>
            <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="$100.00"
            value="@if(isset($product->price)){{$product->price}}@else{{ old('price') }}@endif">

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <small id="scheduleHelp" class="form-text text-muted">Debe especificar el precio del producto o servicio que ofrece.</small>
    </div>
</div>
<div class="form-group">
    <label for="">Descripción</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="imageGroup1"><i class="fas fa-tag"></i></span>
        </div>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
        value="@if(isset($product->description)){{$product->description}}@else{{ old('description') }}@endif">

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <small id="scheduleHelp" class="form-text text-muted">Es recomendable especificar una descripción del producto o servicio, de esta manera los usuarios conocerán más detalles de lo que ofrece.</small>
</div>
<div class="form-group">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Deberá seleccionar <strong>una imagen</strong> <i class="fas fa-image"></i> que represente <strong> el producto o servicio </strong> que ofrece.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<div class="form-group">
    <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="">Imagen de producto / servicio</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="imageGroup1"><i class="fas fa-file-image"></i></span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" lang="es" name="image" aria-describedby="imageGroup1">
            <label class="custom-file-label" for="image1">Seleccionar Archivo</label>

            @error('image')
                <span class="invalid-tooltip" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col text-center">
        <figure class="figure">
            <img class="img-fluid img-thumbnail" id="previewImage" style="width: 347px; height: 347px; object-fit:cover;"
            @isset($product->images) src="/storage/{{$product->images->first()->url}}" @endisset />
            <figcaption class="figure-caption">Vista previa de imagen de producto o servicio</figcaption>
        </figure>
    </div>
</div>
<div class="form-group">
    <div class="form-group col-md-4">
        <input type="checkbox" name="offered" class="form-check-input" id="exampleCheck1" @if(isset($product->offered))@if($product->offered == 1) checked @endif @endif>
        <label class="form-check-label" for="exampleCheck1"><h6> ¿Producto / Servicio en oferta?
            <span class="badge badge-warning">Deberá activar la casilla unicamente si su producto o servicio se encuentra en un estado de oferta</span></h6></label>
    </div>
</div>

<script>
    $('#image').change(function(){setFileName($(this));readURL(this, '#previewImage');});

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

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() {
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.

  // get input value
  var input_val = input.val();

  // don't validate empty input
  if (input_val === "") { return; }

  // original length
  var original_len = input_val.length;

  // initial caret position
  var caret_pos = input.prop("selectionStart");

  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);

    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }

    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "$" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "$" + input_val;

    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }

  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}
</script>
