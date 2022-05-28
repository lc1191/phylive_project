@extends('dashboard.admin.layout')

@section('content')
<a class="btn btn-info my-3" href="{{route("user.index")}} ">Inicio</a>

<table>
    <tr>
        <td>ID</td>
        <td>{{$user->id}}</td>
    </tr>
    <tr>
        <td>Nombre</td>
        <td>{{$user->name}}</td>
    </tr>
    <tr>
        <td>Apellidos</td>
        <td>{{$user->last_name}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$user->email}}</td>
    </tr>
    <tr>
        <td>Hora de creación</td>
        <td>{{date('H:m:s', strtotime($user->created_at))}}</td>
    </tr>
    <tr>
        <td>Fecha de creación</td>
        <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
    </tr>
</table>

    @include('dashboard.fragment._errors-form')

@endsection
