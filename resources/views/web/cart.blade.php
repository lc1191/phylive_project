@extends('layouts.layout')

@section('title')
    Cesta
@endsection

@section('content')
    <main class="my-8 animatedU">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-green-600 rounded">
                            <p class="text-white text-center">{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="p-4 mb-3 bg-red-600 rounded">
                            <p class="text-white text-center">{{ $message }}</p>
                        </div>
                    @endif
                    <h3 class="text-3xl text-bold pb-2">Cesta</h3>
                    <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                            <thead>
                                <tr class="h-12 uppercase">
                                    <th class="hidden md:table-cell"></th>
                                    <th class="text-left">Producto</th>
                                    <th class="text-center lg:pl-0">
                                        <span class="lg:hidden" title="Quantity">Cantidad</span>
                                        <span class="hidden lg:inline">Cantidad</span>
                                    </th>
                                    <th class="text-center md:table-cell"> Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Bucle para mostrar todos los items --}}
                                @foreach ($cartItems as $item)
                                    <tr>
                                        {{-- Imagen producto --}}
                                        <td class="hidden pb-4 md:table-cell">
                                            <img class="mx-auto w-20 rounded mt-6 "
                                                src="{{URL::to("img/upload/$item->image") }}">
                                        </td>
                                        {{-- Nombre producto --}}
                                        <td>
                                            <p class="mb-2 md:ml-2">{{ $item->name }}</p>
                                        </td>
                                        {{-- Actualizacion producto --}}
                                        <td class="ml-12 justify-center mt-9 md:flex">
                                            <div class="h-10 w-auto">
                                                <div class="relative flex flex-row w-full h-8">
                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                            class="text-center bg-gray-100" style="width: 95px;" />
                                                        <button type="submit" class="btn bg-blue-600 mb-1">ACT</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- Precio producto --}}
                                        <td class="text-center w-25 md:table-cell">
                                            <span class="text-sm font-medium lg:text-base">{{ $item->price }},00 €</span>
                                        </td>
                                        {{-- Eliminar producto --}}
                                        <td class="text-right md:table-cell">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <button class="btn bg-red-600">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Total y Boton eliminar cesta --}}
                        @if (Cart::getTotal() > 0)
                        <div class="font-bold text-right mt-4">Total: {{ Cart::getTotal() }} €</div>
                        <div class="text-right mt-4">
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button class="px-6 py-2 text-white bg-red-600">Eliminar cesta</button>
                            </form>
                        </div>
                        {{-- Boton para checkout --}}
                        <div class="text-center pt-6">
                            <form action="{{ route('checkout') }}" method="POST">
                                @csrf
                                <button class="px-6 py-2 rounded text-white bg-blue-600">Finalizar Compra</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
