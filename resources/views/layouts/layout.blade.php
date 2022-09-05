<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Titulo desde diferentes vistas -->
    <title>@yield('title')</title>

    <!--Estilos-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="flex flex-col">
    <div class="flex flex-col justify-between h-screen">
    <!-- Header -->
    <header>
        <div class="bg-gradient-to-tl from-blue-500 to-green-500 flex justify-center">
            <a href="{{URL::to('/')}}"><img src="{{ asset('img/logo2.png') }}" class="imgLogo">
        </div>
        <!-- Panel Usuario -->
        <div class="panel">
            @if (Auth::user())
                {{-- Icono y nombre usuario --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-4 h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <div class="flex justify-center">
                    <h5 class="text-white mb-3">{{ Auth::user()->name }}</h5>
                </div>
                {{-- Icono desconexion --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-4 h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6" />
                          </svg>
                          <h5 class="text-white mb-3 ml-3">Salir</h5>
                    </button>
                </form>

                {{-- Botón Cesta --}}
                <button>
                    <a href="{{ route('cart.list') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                          </svg>
                    </a>
                    <h5 class="text-white ml-3">{{ Cart::getTotalQuantity()}}</h5>
                </button>
            @endif
        </div>
        <nav class="">
            <ul class="flex mx-6">
                <li class="flex-1 mt-2"><a class="menu_user" href="{{route('inicio')}}">Inicio</a></li>
                <li class="flex-1 mt-2"><a class="menu_user" href="{{route('terapias')}}">Terapias</a></li>
                <li class="flex-1 mt-2"><a class="menu_user" href="{{route('productos')}}">Productos</a></li>
                <li class="flex-1 mt-2"><a class="menu_user" href="{{route('cita')}}">Citas</a></li>
                <li class="flex-1 mt-2"><a class="menu_user" href="{{route('contacto')}}">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido desde diferentes vistas -->
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <div class="mx-8 my-8">
        <div class="">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer_user">
        <div class="h-24 bg-gradient-to-br from-blue-500 to-green-500 flex basis-full">
            <!-- Marca -->
            <div class="mt-3 pl-8 grow">
                &#169; 2022 PHYLIVE <br/> Diseñado por Luis Carlos Sánchez Núñez
            </div>
            <!-- Logo Facebook -->
            <div class="shrink pr-4 pt-2">
                <a href="{{URL::to('https://www.facebook.com')}}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" class="my-3" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                </svg></a>
            </div>
            <!-- Logo Instagram -->
            <div class="shrink pr-4 pt-2">
                <a href="{{URL::to('https://www.instagram.com')}}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" class="my-3" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="4" y="4" width="16" height="16" rx="4" />
                    <circle cx="12" cy="12" r="3" />
                    <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                </svg></a>
            </div>
            <!-- Logo Whatsapp -->
            <div class="shrink pr-8 pt-2">
                <a href="https://api.whatsapp.com/send?phone=+600000000&text=Hola%20Phylive!" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" class="my-3" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                    <path d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1" />
                </svg></a>
            </div>
        </div>
    </footer>
    </div>
    <!-- Agenda -->
    <script src="{{ asset('js/agenda.js') }}" defer></script>

</body>
</html>
