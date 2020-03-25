<div class="form-group">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Su opinión es muy importante, así que hemos creado esta sección para los usuarios de VeoNegocios y conocer lo que opinan y su <strong>calificación ( <i class="fas fa-star"></i> ) </strong>respecto los negocios,
        así como sus productos/servicios.
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<div class="form-group">
    <i class="fas fa-star-of-life colorFormRequiredIcon fa-xs"></i> <label for="pac-input">Comentario</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-comment"></i></span>
        </div>
        <textarea class="form-control @error('description') is-invalid @enderror" aria-label="With textarea" name="description"
        value="@if(isset($comment->description)){{$comment->description}}@else{{ old('description') }}@endif" autofocus></textarea>
    
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <small id="scheduleHelp" class="form-text text-muted">Deberá describir de forma clara y educadamente su opinión acerca del negocio, así como de sus productos/servicios si así lo desea.</small>
</div>
<div class="form-group">
    <label for="pac-input">Calificación</label>
    <div class="input-group">            
        <span class="fa fa-star fa-2x" id="star1" onclick="add(this,1)"></span>
        <span class="fa fa-star fa-2x" id="star2" onclick="add(this,2)"></span>
        <span class="fa fa-star fa-2x" id="star3" onclick="add(this,3)"></span>
        <span class="fa fa-star fa-2x" id="star4" onclick="add(this,4)"></span>
        <span class="fa fa-star fa-2x" id="star5" onclick="add(this,5)"></span>
        <input type="text" id="pac-input" name="score" class="form-control @error('score') is-invalid @enderror"
        value="@if(isset($network->score)){{$network->score}}@else{{ old('score') }}@endif">

        @error('score')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <small id="scheduleHelp" class="form-text text-muted">Deberá seleccionar la cantidad de estrellas (de 1 a 5) que represente el valor hacía el negocio, así como sus productos/servicios en base a su opinión.</small>
</div>


<style>
    .checked {
        color: orange;
    }
</style>

<script>

    $( document ).ready(function() {
        $("#pac-input").hide();
    });

    var inputRating = document.getElementById("pac-input"); 

    function add(ths,sno){

        for (var i=1;i<=5;i++){ 
            var cur=document.getElementById("star"+i) 
            cur.className="fa fa-star fa-2x" 
        } 
        
        for (var i=1;i<=sno;i++){
            var cur=document.getElementById("star"+i) 
            
            if(cur.className=="fa fa-star fa-2x" ) { 
                cur.className="fa fa-star fa-2x checked" 
            } 
        }

        inputRating.value = sno;
    }
</script>