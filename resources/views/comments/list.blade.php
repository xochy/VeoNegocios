<div class="list-group">
    @forelse ($store->comments as $comment)
        <a class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 text-primary">{{App\User::where('id', $comment->user_id)->first()->name}}</h5>
                <small>
                    @for ($i = 1; $i <= 5; $i++)
                    <span class="fa fa-star @if($comment->score >= $i) checked @endif" id="star{{$i}}"></span>
                    @endfor
                </small>
            </div>
            <p class="mb-1">{{$comment->description}}.</p>
            <small class="text-muted"><i class="far fa-clock"></i> Agregado el {{$comment->created_at}} </small>
        </a>
    @empty
    <h6 class="mt-3">No existen comentarios 
        @if (Auth::user()->authorizeRolesShow(['administrator', 'viewer']))
            <span class="badge badge-warning">Puede hacer clic en el botón de abajo para agregar un nuevo comentario</span>
        @endif
    </h6>
    @endforelse
</div>

<style>
    .checked {
        color: orange;
    }

    .list-group{
        max-height: 1000px;
        margin-bottom: 10px;
        overflow:scroll;
        -webkit-overflow-scrolling: touch;
        overflow-x: hidden;
        overflow-y: auto;
    }
</style>

<script>
    function add(ths,sno){

    for (var i=1;i<=5;i++){ 
        var cur=document.getElementById("star"+i) 
        cur.className="fa fa-star" 
    } 
    
    for (var i=1;i<=sno;i++){
        var cur=document.getElementById("star"+i) 
        if(cur.className=="fa fa-star" ) { cur.className="fa fa-star checked" } }
    }
</script>