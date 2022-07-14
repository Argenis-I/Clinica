<h1>{{ $modo }} paciente</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as$error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
<label for="nombre">Nombre: </label>    
<input type="text" class="form-control" name="nombre" value="{{ isset($paciente->nombre)?$paciente->nombre:old('nombre') }}" id="nombre">
</div>

<div class="form-group">
<label for="apellidoPaterno">Apellido paterno: </label> 
<input type="text" class="form-control" name="apellidoPaterno" value="{{ isset($paciente->apellidoPaterno)?$paciente->apellidoPaterno:old('apellidoPaterno') }}" id="apellidoPaterno">
</div>

<div class="form-group">
<label for="apellidoMaterno">Apellido materno: </label> 
<input type="text" class="form-control" name="apellidoMaterno" value="{{ isset($paciente->apellidoMaterno)?$paciente->apellidoMaterno:old('apellidoMaterno') }}" id="apellidoMaterno">
</div>

<div class="form-group">
<label for="correo">Correo: </label> 
<input type="text" class="form-control" name="correo" value="{{ isset($paciente->correo)?$paciente->correo:old('correo') }}" id="correo">
</div>

<div class="form-group">
<label for="telefono">Telefono o Celular: </label> 
<input type="text" class="form-control" name="telefono" value="{{ isset($paciente->telefono)?$paciente->telefono:old('telefono') }}" id="telefono">
</div>
<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('paciente/')}}">Regresar</a>
</div>