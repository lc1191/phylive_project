@extends('dashboard.admin.layout')

@section('content')

    <a class="btn btn-info my-3" href="{{route("cita.index")}}">Inicio</a>
    <h1>Actualización cita del usuario con id: {{ $cita->user_id }}</h1>
        @include('dashboard.fragment._errors-form')

    <form action="{{ route('cita.update', $cita->id) }}" method="post" enctype="multipart/form-data">
        @method("patch")
        @include('dashboard.cita._form', ["task" => "edit"])
    </form>

@endsection
