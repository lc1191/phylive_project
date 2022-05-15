@extends('dashboard.admin.layout')

@section('content')
<a class="btn btn-info my-3" href="{{route("cesta.index")}} ">Inicio</a>

<table>
    <tr>
        <td>ID</td>
        <td>{{$cesta->user_id}}</td>
    </tr>
    <tr>
        <td>Nombre</td>
        <td>{{$cesta->user_name}}</td>
    </tr>
    <tr>
        <td>Dirección</td>
        <td>{{$cesta->street}}</td>
    </tr>
    <tr>
        <td>Población</td>
        <td>{{$cesta->province}}</td>
    </tr>
    <tr>
        <td>Codigo Postal</td>
        <td>{{$cesta->zip}}</td>
    </tr>
    <tr>
        <td>Telefono</td>
        <td>{{$cesta->phone}}</td>
    </tr>
    <tr>
        <td>ID Cesta</td>
        <td>{{$cesta->id}}</td>
    </tr>
    <tr>
        <td>Precio Total</td>
        <td>{{$cesta->total_price}},00 €</td>
    </tr>
    <tr>
        <td>Producto</td>
        <td>{{$cesta->product_name}}</td>
    </tr>
    <tr>
        <td>Cantidad</td>
        <td>{{$cesta->quantity}} Unidades</td>
    </tr>
    <tr>
        <td>Fecha compra</td>
        <td>{{$cesta->updated_at}}</td>
    </tr>
    <tr>
        <td>Metodo de pago</td>
        <td>{{$cesta->pay}}</td>
    </tr>
    <tr>
        <td>Titular de tarjeta</td>
        <td>{{$cesta->card_title}}</td>
    </tr>
    <tr>
        <td>Numero de tarjeta</td>
        <td>{{$cesta->card_number}}</td>
    </tr>
    <tr>
        <td>Mes de caducidad</td>
        <td>{{$cesta->card_ex_month}}</td>
    </tr>
    <tr>
        <td>Año de caducidad</td>
        <td>{{$cesta->card_ex_year}}</td>
    </tr>
    <tr>
        <td>Codigo CCV</td>
        <td>{{$cesta->card_ccv}}</td>
    </tr>

</table>

    @include('dashboard.fragment._errors-form')

@endsection
