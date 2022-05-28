@extends('layouts.layout')

@section('title')
    Contactos
@endsection

@section('content')
<div class="container">
<div class="animatedD">
    <form action="#">
        <div class="border flex flex-wrap mx-3 mb-6 pb-3">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Nombre </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-600 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                       type="text" placeholder="Escribe tu nombre">
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Apellidos </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-600 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       type="text" placeholder="Escribe tu apellido">
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Email </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-600 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       type="email" placeholder="Escribe tu email">
            </div>
            <div class="w-full md:w-5/6 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Comentario </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-600 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       type="textarea" placeholder="Escribe tu comentario">
            </div>
            <div class="w-full md:w-1/6 pl-8 pt-10">
                <button type="submit" onclick="show_alert();" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </form>

    <div class="map-responsive">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d336.31996861063504!2d-6.114167024325165!3d36.68332902015733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0dc6e3cef085fb%3A0xbe7c8b3c48335d97!2sP.%C2%BA%20de%20las%20Delicias%2C%2011406%20Jerez%20de%20la%20Frontera%2C%20C%C3%A1diz!5e0!3m2!1ses!2ses!4v1647947727829!5m2!1ses!2ses" loading="lazy"></iframe>
    </div>
</div>
</div>
    <script>
        function show_alert() {
            alert("Has pulsado el boton de enviar");
        }
    </script>
@endsection
