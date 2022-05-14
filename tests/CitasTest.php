<?php

namespace Tests;

use Illuminate\Support\Facades\DB;

{
    // FULL DATE TEST
    // El usuario logeado no puede cojer el mismo dia si ya tiene citas

        $dates = DB::table('citas')->where('user_id', auth()->id())->pluck('start');
        info('--------------------------------------------');
        info('Fecha BD : ' . $dates);
        info('Fecha SELECCIONADA USUARIO : ' . $date_user);

        $dt = $dates->diff($date_user);
        if ($dt != $dates){
            info('Existe esa fecha en la BD');
        } else {
            info('No existe esa fecha en la BD');
        }
        info('--------------------------------------------');


    // FULL HOUR TEST
    // El usuario logeado no puede cojer dos horas iguales en toda la BD

        $hours = DB::table('citas')->where('user_id', auth()->id())->pluck('end');
        info('--------------------------------------------');
        info('Horas BD : ' . $hours);
        info('Hora SELECCIONADA USUARIO : ' . $hour_user);

        $hs = $hours->diff($hour_user);
        if ($hs != $hours){
            info('Existe esa hora en la BD');
        } else {
            info('No existe esa hora en la BD');
        }
        info('--------------------------------------------');
}
