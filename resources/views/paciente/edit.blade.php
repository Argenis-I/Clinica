@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/paciente/'.$paciente->id ) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('paciente.form', ['modo'=>'Editar'])
</form>
</div>
@endsection