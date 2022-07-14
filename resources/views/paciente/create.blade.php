@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/paciente') }}" method="post">
@csrf
@include('paciente.form', ['modo'=>'Crear'])

</form>
</div>
@endsection