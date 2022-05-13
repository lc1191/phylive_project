@extends('dashboard.admin.layout')

@section('title')
    Productos
@endsection

@section('content')
    <h1>Panel administracion de Productos</h1>
        <a class="btn btn-success my-3" href="{{ route('producto.create') }}">Crear</a>
            <table class="table mb-3">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($producto as $p)
                        <tr>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->description }}</td>
                            <td>{{ $p->quantity }} U.</td>
                            <td>
                                <form action="{{ route('producto.destroy', $p) }}" method="post">
                                    <a class="btn btn-primary my-1" href="{{ route('producto.show', $p) }}">Mostrar</a>
                                    <a class="btn btn-warning my-1" href="{{ route('producto.edit', $p) }}">Editar</a>
                                        @method("delete")
                                        @csrf
                                    <button class="btn btn-danger my-1" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    {{ $producto->links() }}
@endsection
