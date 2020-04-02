<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
        value="@if(isset($user->name)){{$user->name}}@else{{ old('name') }}@endif" required autocomplete="name">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
        value="@if(isset($user->email)){{$user->email}}@else{{ old('email') }}@endif" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

@if ($user->roles()->first()->name == 'costumer' && (isset($store->activated)))
<div class="form-group row">
    <label for="checkbox" class="col-md-4 col-form-label text-md-right">Negocio Activado</label>
    <div class="col-md-6">
        <input type="checkbox" name="activated" class="form-control" id="checkbox" @if(isset($store->activated))@if($store->activated == 1) checked @endif @endif>  
    </div>
</div>
@endif