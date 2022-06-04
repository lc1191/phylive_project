@extends('layouts.layout')

@section('title')
    Productos
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-600 rounded">
            <p class="text-white text-center">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="p-4 mb-3 bg-red-600 rounded bounce">
            <p class="text-white text-center">{{ $message }}</p>
        </div>
    @endif

<main class="container">
    <table class="table mb-3">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($productos as $p)
            <tr>
                <td><img class="mx-auto w-44" src="{{("img/upload/$p->image")}}"/></td>
                <td>{{$p->title}}</td>
                <td>{{$p->description}}</td>
                <td>{{$p->price}},00 €</td>
                <td>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $p->id }}" name="id">
                        <input type="hidden" value="{{ $p->title }}" name="name">
                        <input type="hidden" value="{{ $p->price }}" name="price">
                        <input type="hidden" value="{{ $p->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="btn btn-success my-1">Añadir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $productos->links() }}
</main>

@endsection
