@extends('layouts.layout')

@section('title')
    Terapias
@endsection

@section('content')
    <main class="container animatedL">
        <div class="row">
        <!--columna izquierda-->
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-12 col-lg-8 p-2">
                    <!--Contenedor 1-->
                    <article class="card h-100 bg-blue-100">
                        <h5 class="p-2 text-uppercase">Fisioterapia Ortopedica </h5>
                           <div>
                                <p class="h6 ps-3 pt-8">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                    Nihil voluptates molestias necessitatibus blanditiis ullam
                                    voluptatem facere vitae excepturi dicta culpa. Quae doloremque
                                    odit harum voluptatem repudiandae incidunt earum nulla dolorem?
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                </p>
                                <p class="h6 ps-3 pt-4">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                    Nihil voluptates molestias necessitatibus blanditiis ullam
                                    voluptatem facere vitae excepturi dicta culpa. Quae doloremque
                                    odit harum voluptatem repudiandae incidunt earum nulla dolorem?
                                    orem ipsum, dolor sit amet consectetur adipisicing elit.
                                </p>
                            </div>
                                <img src="{{ asset('img/tOrto.jpg') }}" class="pt-4 mx-auto">
                    </article>
                </div>
                <div class="col-12 col-lg-4 p-2">
                    <!--Contenedor 2-->
                    <article class="card h-100 bg-blue-100">
                        <h5 class="p-2 text-uppercase"> Fisioterapia traumatologica </h5>
                            <div>
                                <p class="h6 ps-3 pt-8">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                   Nihil voluptates molestias necessitatibus blanditiis ullam
                                   voluptatem facere vitae excepturi dicta culpa. Quae doloremque
                                   odit harum voluptatem repudiandae incidunt earum nulla dolorem?
                                </p>
                            </div>
                            <img src="{{ asset('img/tTrau.jpg') }}" class="pt-4 mx-auto">
                    </article>
                </div>
                <div class="col-12 col-lg-4 p-2">
                    <!--Contenedor 3-->
                    <article class="card h-100 bg-violet-100">
                        <h5 class="p-2 text-uppercase"> Terapia deportiva </h5>
                            <div>
                                <p class="h6 ps-3 pt-8">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                   Nihil voluptates molestias necessitatibus blanditiis ullam
                                   voluptatem facere vitae excepturi dicta culpa. Quae doloremque
                                   odit harum voluptatem repudiandae incidunt earum nulla dolorem?
                                </p>
                            </div>
                            <img src="{{ asset('img/tDepo.jpg') }}" class="pt-4 mx-auto">
                    </article>
                </div>
                    <div class="col-12 col-lg-8 p-2">
                    <!--Contenedor 4-->
                        <article class="card h-100 bg-green-100 ">
                            <h5 class="p-2 text-uppercase"> Fisioterapia geriatrica </h5>
                            <div>
                                <p class="h6 ps-3 pt-8">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                    Nihil voluptates molestias necessitatibus blanditiis ullam
                                    voluptatem facere vitae excepturi dicta culpa. Quae doloremque
                                    odit harum voluptatem repudiandae incidunt earum nulla dolorem?
                                </p>
                                <p class="h6 ps-3 pt-4">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                    Nihil voluptates molestias necessitatibus blanditiis ullam
                                    voluptatem facere vitae excepturi dicta culpa. Quae doloremque
                                    odit harum voluptatem repudiandae incidunt earum nulla dolorem?
                                    orem ipsum, dolor sit amet consectetur adipisicing elit.
                                </p>
                            </div>
                            <img src="{{ asset('img/tGeri.jpg') }}" class="pt-4 mx-auto">
                        </article>
                    </div>
                </div>
            </div>
            <!--columna derecha-->
            <div class="col-12 col-lg-3 p-2">
                <!--Contenedor 5-->
                <article class="card h-100 bg-green-100 ">
                    <h5 class="p-2 text-uppercase"> Fisioterapia neurologica </h5>
                    <div>
                        <p class="h6 ps-3 pt-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Nihil voluptates molestias necessitatibus blanditiis ullam
                            voluptatem facere vitae excepturi dicta culpa. Quae doloremque
                            odit harum voluptatem repudiandae incidunt earum nulla dolorem?
                            orem ipsum, dolor sit amet consectetur adipisicing elit.
                        </p>
                        <p class="h6 ps-3 pt-4">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Nihil voluptates molestias necessitatibus blanditiis ullam
                            voluptatem facere vitae excepturi dicta culpa. Quae doloremque
                            odit harum voluptatem repudiandae incidunt earum nulla dolorem?
                            orem ipsum, dolor sit amet consectetur adipisicing elit.
                        </p>
                    </div>
                        <img src="{{ asset('img/tNeur.jpg') }}" class="pt-4 mx-auto">
                </article>
            </div>
        </div>
    </main>

@endsection
