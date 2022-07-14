<h1>{{ $modo }} psicólogo</h1>

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
<input type="text" class="form-control" name="nombre" value="{{ isset($psicologo->nombre)?$psicologo->nombre:old('nombre') }}" id="nombre">
</div>

<div class="form-group">
<label for="apellidoPaterno">Apellido paterno: </label> 
<input type="text" class="form-control" name="apellidoPaterno" value="{{ isset($psicologo->apellidoPaterno)?$psicologo->apellidoPaterno:old('apellidoPaterno') }}" id="apellidoPaterno">
</div>

<div class="form-group">
<label for="apellidoMaterno">Apellido materno: </label> 
<input type="text" class="form-control"  name="apellidoMaterno" value="{{ isset($psicologo->apellidoMaterno)?$psicologo->apellidoMaterno:old('apellidoMaterno') }}" id="apellidoMaterno">
</div>

<div class="form-group">
<label for="correo">Correo: </label> 
<input type="text" class="form-control" name="correo" value="{{ isset($psicologo->correo)?$psicologo->correo:old('correo') }}" id="correo">
</div>

<div class="form-group">
<label for="telefono">Telefono o Celular: </label> 
<input type="text" class="form-control" name="telefono" value="{{ isset($psicologo->telefono)?$psicologo->telefono:old('telefono') }}" id="telefono">
</div>

<div id="select">
<label for="paciente_id" class="form-label">Id del paciente </label>
<select name="paciente_id" id="paciente_id" class="form-control">
@foreach($datos as $paciente_id)
<option name="" value="{{ isset($paciente_id->id)?$paciente_id->id:'' }}" >{{$paciente_id->nombre}}</option>
@endforeach 
</select>
</div>
<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('psicologo/')}}">Regresar</a>
