@extends('layouts.app')
@section('content')
<div class="container">

@if (Session::has('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ Session::get('mensaje')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<a href="{{ url('paciente/create')}}" class="btn btn-success">Registrar nuevo paciente</a>
<br>
<br>
<h1>Lista de pacientes</h1>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Acciones</th>           
        </tr>
    </thead>
    <tbody>
        @foreach( $pacientes as $paciente)
        <tr>
            <td>{{ $paciente->id }}</td>
            <td>{{ $paciente->nombre }}</td>
            <td>{{ $paciente->apellidoPaterno }}</td>
            <td>{{ $paciente->apellidoMaterno }}</td>
            <td>{{ $paciente->correo }}</td>
            <td>{{ $paciente->telefono }}</td>
            <td>
            <a href="{{ url('/paciente/'.$paciente->id.'/edit') }}" class="btn btn-warning">Editar </a> 
            |
            <form action="{{ url('/paciente/'.$paciente->id ) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿ De verdad deseas borrarlo ?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $pacientes->links() !!}
</div>
@endsection