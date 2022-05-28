@extends('dashboard.admin.layout')

@section('content')
<a class="btn btn-info my-3" href="{{route("cita.index")}} ">Inicio</a>

<table>
    <tr>
        <td>ID Usuario</td>
        <td>{{$cita->user_id}}</td>
    </tr>
    <tr>
        <td>ID Cita</td>
        <td>{{$cita->id}}</td>
    </tr>
    <tr>
        <td>Terapia</td>
        <td>{{$cita->title}}</td>
    </tr>
    <tr>
        <td>Descripcion</td>
        <td>{{$cita->description}}</td>
    </tr>
    <tr>
        <td>Hora</td>
        <td><b>{{$cita->end}}:00 H</b></td>
    </tr>
    <tr>
        <td>Fecha</td>
        <td><b>{{date('d-m-Y', strtotime($cita->start))}}</b></td>
    </tr>
</table>

    @include('dashboard.fragment._errors-form')

@endsection
