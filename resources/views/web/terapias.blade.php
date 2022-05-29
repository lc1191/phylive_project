@extends('layouts.layout')

@section('title')
    Terapias
@endsection

@section('content')
    <main class="container animatedL">
        <!--Contenedor 1-->
        <article class="card h-100 bg-blue-100">
            <h5 class="p-2 uppercase font-bold"> Fisioterapia Ortopedica </h5>
            <div>
                <p class="h6 ps-3 py-4">
                    Este tipo de terapia se centra en una precisa evaluación, diagnostico y tratamiento de
                    lesiones musculo-esqueléticas. Esta son lesiones en articulaciones, músculos, huesos,
                    tejidos blando y/o de los nervios.
                    Utilizamos enfoques de evaluación y tratamiento altamente específicos incluidas las
                    técnicas manuales y los ejercicios terapeuticos.
                </p>
            </div>
            <img src="{{ asset('img/tOrto.jpg') }}" class="pt-4 mx-auto">
        </article>

        <!--Contenedor 2-->
        <article class="card h-100 bg-blue-100 mt-6">
            <h5 class="p-2 uppercase font-bold"> Fisioterapia traumatologica </h5>
            <div>
                <p class="h6 ps-3 py-4">
                   Este tipo de terapia se centra en una especialidad indicada para el tratamiento de las
                   lesiones del sistema musculo esquelético, óseo y ligamentoso de las diferentes partes
                   del cuerpo humano.
                   El objetivo es consolidar la fractura además de establecer un programa de tratamiento
                   precoz que evite los efectos de la inmovilidad.
                </p>
            </div>
            <img src="{{ asset('img/tTrau.jpg') }}" class="pt-4 mx-auto">
        </article>

        <!--Contenedor 3-->
        <article class="card h-100 bg-blue-100 mt-6">
            <h5 class="p-2 uppercase font-bold"> Fisioterapia deportiva </h5>
            <div>
                <p class="h6 ps-3 py-4">
                    Este tipo de terapia va dirigida a toda persona que practique deporte habitualmente,
                    tanto si es un deporte de base, amateur, de salud o de alto rendimiento y consiste en
                    hacer un trabajo preventivo y otro de recuperación de lesiones.
                    Los objetivos comprenden el acortamiento del tiempo de recuperacion, adaptar el cuerpo
                    al entrenamiento y mejorar la calidad de vida del paciente.
                </p>
            </div>
            <img src="{{ asset('img/tDepo.jpg') }}" class="pt-4 mx-auto">
        </article>

        <!--Contenedor 4-->
        <article class="card h-100 bg-blue-100 mt-6">
            <h5 class="p-2 uppercase font-bold"> Fisioterapia geriatrica </h5>
            <div>
                <p class="h6 ps-3 py-4">
                    Este tipo de terapia va dirigida a personas mayores ofreciendo ayuda en su movilidad,
                    mantiene el cuerpo activo donde dota de movimiento su rutina.
                    Es un complemento esencial a la hora de tratar diversas enfermedades propias del
                    envejecimiento, utilizando tecnicas de prevención y tratamiento de las diferente patologías.
                </p>
            </div>
            <img src="{{ asset('img/tGeri.jpg') }}" class="pt-4 mx-auto">
        </article>

        <!--Contenedor 5-->
        <article class="card h-100 bg-blue-100 mt-6">
            <h5 class="p-2 uppercase font-bold"> Fisioterapia neurologica </h5>
            <div>
                <p class="h6 ps-3 py-4">
                    Este tipo de terapia se dedica al tratamiento de las alteraciones y lesiones ocasionadas
                    por una afectación del Sistema Nervioso central o periférico y que afectan al movimiento.
                    Se centra en mejorar la movilidad del paciente, para ello crea nuevas rutas neurológicas y
                    refuerza las ya existentes para que el movimiento tenga lugar.
                </p>
            </div>
            <img src="{{ asset('img/tNeur.jpg') }}" class="pt-4 mx-auto">
        </article>
    </main>
@endsection
