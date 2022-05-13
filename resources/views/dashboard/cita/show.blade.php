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
        <td>Fecha</td>
        <td>{{$cita->start}}</td>
    </tr>
    <tr>
        <td>Hora</td>
        <td>{{$cita->end}}:00H</td>
    </tr>

</table>

    @include('dashboard.fragment._errors-form')

@endsection
