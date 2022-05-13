<!--LAYOUT ADMIN-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Titulo desde diferentes vistas -->
    <title>@yield('title')</title>
    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
    <!--Estilos-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="flex flex-col">
    <div class="flex flex-col justify-between h-screen">
    <!-- Header -->
    <header>
        <div class="flex justify-center">
            <a href="{{URL::to('/')}}"><img src="{{ asset('img/logo.png') }}" class="imgLogo">
        </div>
        <!-- Panel Usuario -->
        <div class="panel">
            @if (Auth::user())
                {{-- Icono y nombre usuario --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="12" r="9" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                      </svg>
                    <h5 class="text-center mb-4">{{ Auth::user()->name }}</h5>
                {{-- Icono desconexion --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    {{-- <button class="btn btn-danger my-1 btnlogout" type="submit">LOGOUT</button> --}}
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-off" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M14.274 10.291a4 4 0 1 0 -5.554 -5.58m-.548 3.453a4.01 4.01 0 0 0 2.62 2.65" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 1.147 .167m2.685 2.681a4 4 0 0 1 .168 1.152v2" />
                            <line x1="3" y1="3" x2="21" y2="21" />
                          </svg>
                    </button>
                </form>

            @else
                {{-- Icono Conexion --}}
                <a href="{{ route('login') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="56" height="56" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                    </svg>
                </a>
                {{-- Botón Registrar --}}
                <a class="p-3" href="{{ url('/register') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="56" height="56" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="9" cy="7" r="4" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 11h6m-3 -3v6" />
                    </svg>
                </a>
            @endif
        </div>
        <nav>
            <ul class="flex px-4">
                <li class="flex-1 mt-2"><a class="menu_admin" href="{{route('inicio')}}">Inicio</a></li>
                <li class="flex-1 mt-2"><a class="menu_admin" href="{{route('user.index')}}">Usuarios</a></li>
                <li class="flex-1 mt-2"><a class="menu_admin" href="{{route('producto.index')}}">Productos</a></li>
                <li class="flex-1 mt-2"><a class="menu_admin" href="{{route('cesta.index')}}">Cestas</a></li>
                <li class="flex-1 mt-2"><a class="menu_admin" href="{{route('cita.index')}}">Citas</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido desde diferentes vistas -->
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <div class="container pb-6">
        <div class="card card-white mt-4">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer_admin">
        <div class="flex basis-full">
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
</body>
</html>
