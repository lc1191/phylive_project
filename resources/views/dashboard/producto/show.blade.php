@extends('dashboard.admin.layout')

@section('title')
    Mostrar productos
@endsection

@section('content')
<a class="btn btn-info my-3" href="{{route("producto.index")}}">Panel</a>

<table class="">
    <tr>
        <td>ID</td>
        <td>{{$producto->id}}</td>
    </tr>
    <tr>
        <td>Descripcion</td>
        <td>{{$producto->description}}</td>
    </tr>
    <tr>
        <td>Precio</td>
        <td class=>{{$producto->price}},00 €</td>
    </tr>
    <tr>
        <td>Unidades disponibles</td>
        <td>{{$producto->quantity}}</td>
    </tr>
    <tr>
        <td>Imagen</td>
        <td class="pt-4"><img src="{{Storage::url("image/$producto->image")}}" max-width="250"/></td>
    </tr>

</table>
    @include('dashboard.fragment._errors-form')

@endsection
