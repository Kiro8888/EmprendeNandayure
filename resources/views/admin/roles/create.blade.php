@extends('adminlte::page')

@section('title', 'Crear  nuevo rol')

@section('content_header')
    <h1>Crear  nuevo rol</h1>
@stop

@section('content')

<form action="{{route('admin.roles.store')}}" method="post">
    @csrf

    @include('admin.roles.partials.form')

    <button type="submit" class="btn btn-primary">
        Submit
    </button>
</form>


@stop
