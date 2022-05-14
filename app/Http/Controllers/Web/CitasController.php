<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;


class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.citas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Comprobacion usuario de sesion
        $user_id = auth()->id();
        $user_name = auth()->user()->name;

        // Fechas y horas segun indique usuario
        $date_user = new Collection ([$request->start]);
        $hour_user = new Collection ([$request->end]);

        // Todos los usuarios
        $dt = DB::table('citas')->pluck('start');
        $hs = DB::table('citas')->where('start', $request->start)->pluck('end');
        // info('--------------------------------------------');
        // info('Fechas BD : ' . $dt);
        // info('Horas BD : ' . $hs);
        // info('Fecha SELECCIONADA USUARIO : ' . $date_user);
        // info('Hora SELECCIONADA USUARIO : ' . $hour_user);
        // info('--------------------------------------------');

        $dt_total = $dt->diff($date_user);
        $h_total = $hs->diff($hour_user);

        // Valores estandar
        $price = 25;
        $quantity = 1;
        $img_cita = 'img_cita.jpg';

        //test dia
        if ($dt_total != $dt && $h_total == $hs){
            // info('Existe esa fecha en la BD');
            $cita =  Cita::create([
                'id' => $request->id,
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $user_id,
                'start' => $request->start,
                'end' => $request->end,
            ]);

            \Cart::add([
            'id' => $request->id,
            'name' => $request->title,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $img_cita,
            ]);

        } elseif ($dt_total == $dt) {
            // info('No existe esa fecha en la BD, LA CREAMOS');
            $cita =  Cita::create([
                'id' => $request->id,
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $user_id,
                'start' => $request->start,
                'end' => $request->end,
            ]);

            \Cart::add([
            'id' => $request->id,
            'name' => $request->title,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $img_cita,
            ]);

            // session()->flash('success', 'Producto añadido');
            // return redirect()->route('cart.list');

        } else {
            info('No se puede crear cita');
            $error = true;
        }

        // // Variables para citas
        // $price = 25;
        // $quantity = 1;
        // $img_cita = 'img_cita.jpg';
        // Crear en el carrito
        // \Cart::add
        // ([
        //     'id' => $request->id,
        //     'name' => $request->title,
        //     'price' => $price,
        //     'quantity' => $quantity,
        //     'image' => $img_cita,
        // ]);

        request()->validate(Cita::$rules);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        $cita = Cita::where('user_id', auth()->id())->get();
        return response()->json($cita);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);
        return response()->json($cita);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        request()->validate(Cita::$rules);
        $cita->update($request->all());
        return response()->json($cita);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id)->delete();
        return response()->json($cita);
    }
}
