@extends('dashboard.admin.layout')

@section('content')

    <a class="btn btn-info my-3" href="{{route("user.index")}}">Inicio</a>
    <h1>Actualización perfil del usuario: {{ $user->user_name }}</h1>
        @include('dashboard.fragment._errors-form')

    <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @method("patch")
        @include('dashboard.user._form', ["task" => "edit"])
    </form>

@endsection
