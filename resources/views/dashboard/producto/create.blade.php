@extends('dashboard.admin.layout')

@section('title')
    Crear productos
@endsection

@section('content')
@include('dashboard.fragment._errors-form')

<a class="btn btn-info my-3" href="{{route("producto.index")}} ">Panel</a>
    <h1>Crear productos</h1>
        <form action="{{route('producto.store')}}" method="post" enctype="multipart/form-data">
            @include('dashboard.producto._form', ["task" => "edit"])
        </form>

@endsection
