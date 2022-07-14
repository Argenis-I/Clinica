@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/psicologo') }}" method="post">
@csrf
@include('psicologo.form', ['modo'=>'Crear'])

</form>
</div>
@endsection