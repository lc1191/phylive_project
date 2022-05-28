@extends('dashboard.admin.layout')

@section('title')
    Usuarios
@endsection

@section('content')
    <h1>Panel administracion Usuarios</h1>
    <table class="table mb-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->last_name }}</td>
                    <td>{{ date('d-m-Y', strtotime($u->created_at)) }}</td>
                    <td>
                        <form action="{{ route('user.destroy', $u) }}" method="post">
                            <a class="btn btn-primary my-1" href="{{ route('user.show', $u) }}">Mostrar</a>
                                @method("delete")
                                @csrf
                            <button class="btn btn-danger my-1" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $user->links() }}
@endsection
