@extends('dashboard.admin.layout')

@section('title')
    Editar productos
@endsection

@section('content')

    <a class="btn btn-info my-3" href="{{route("producto.index")}} ">Panel</a>
    <h1>Actualizar Producto: {{ $producto->title }}</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('producto.update', $producto->id) }}" method="post" enctype="multipart/form-data">
        @method("patch")
        @include('dashboard.producto._form', ["task" => "edit"])
    </form>

@endsection
