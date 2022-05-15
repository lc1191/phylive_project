@extends('dashboard.admin.layout')

@section('title')
    Cesta
@endsection

@section('content')
    <h1>Panel administracion de Cestas</h1>
    <br>
    <table class="table mb-3">
        <thead>
            <tr>
                <th>ID Usuario</th>
                <th>ID Cesta</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cesta as $c)
                <tr>
                    <td>{{ $c->user_id }}</td>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->total_price }} €</td>
                    <td>{{ $c->updated_at }}</td>
                    <td>
                        <form action="{{ route('cesta.destroy', $c) }}" method="post">
                            <a class="btn btn-primary my-1" href="{{ route('cesta.show', $c) }}">Mostrar</a>
                            {{-- <a class="btn btn-warning my-1" href="{{ route('cesta.edit', $c) }}">Editar</a> --}}
                                @method("delete")
                                @csrf
                            <button class="btn btn-danger my-1" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cesta->links() }}
@endsection
