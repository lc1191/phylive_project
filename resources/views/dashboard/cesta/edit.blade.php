@extends('dashboard.admin.layout')

@section('content')

    <a class="btn btn-info my-3" href="{{route("cesta.index")}}">Inicio</a>
    <h1>Actualización cesta del usuario: {{ $cesta->user_name }}</h1>
        @include('dashboard.fragment._errors-form')

    <form action="{{ route('cesta.update', $cesta->id) }}" method="post" enctype="multipart/form-data">
        @method("patch")
        @include('dashboard.cesta._form', ["task" => "edit"])
    </form>

@endsection
