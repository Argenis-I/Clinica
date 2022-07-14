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

<a href="{{ url('psicologo/create')}}" class="btn btn-success">Registrar nuevo psicólogo</a>
<br>
<br>
<h1>Lista de psicólogos</h1>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Paciente</th>
            <th>Acciones</th>           
        </tr>
    </thead>
    <tbody>
        @foreach( $psicologos as $psicologo)
        <tr>
            <td>{{ $psicologo->id }}</td>
            <td>{{ $psicologo->nombre }}</td>
            <td>{{ $psicologo->apellidoPaterno }}</td>
            <td>{{ $psicologo->apellidoMaterno }}</td>
            <td>{{ $psicologo->correo }}</td>
            <td>{{ $psicologo->telefono }}</td>
            <td>{{ $psicologo->paciente->nombre }}</td>
            <td>
            <a href="{{ url('/psicologo/'.$psicologo->id.'/edit') }}" class="btn btn-warning">Editar </a> 
            |
            <form action="{{ url('/psicologo/'.$psicologo->id ) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿ De verdad deseas borrarlo ?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $psicologos->links() !!}
</div>
@endsection