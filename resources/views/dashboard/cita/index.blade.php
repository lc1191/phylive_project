@extends('dashboard.admin.layout')

@section('title')
    Cita
@endsection

@section('content')
    <h1>Panel administracion de Citas</h1>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>ID Usuario</th>
                <th>ID Cita</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cita as $c)
                <tr>
                    <td>{{ $c->user_id }}</td>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->start }}</td>
                    <td>{{ $c->end }}:00 H</td>
                    <td>
                        <form action="{{ route('cita.destroy', $c) }}" method="post">
                            <a class="btn btn-primary my-1" href="{{ route('cita.show', $c) }}">Mostrar</a>
                            {{-- <a class="btn btn-warning my-1" href="{{ route('cita.edit', $c) }}">Editar</a> --}}
                                @method("delete")
                                @csrf
                            <button class="btn btn-danger my-1" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cita->links() }}
@endsection
