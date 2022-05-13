<?php

namespace App\Http\Controllers\Dashboard;
//Clases Laravel
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Clases proyecto;
use App\Models\Cita;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cita = Cita::paginate(8);
        //dd($cita);
        return view('dashboard.cita.index', compact('cita'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //dd($cita);
        return view("dashboard.cita.show", compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        echo view('dashboard.cita.edit', compact('cita'));
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
        $data = $request->validated();
        $cita->update($data);

        //$request->session()->flash('status', 'Registro actualizado.');
        return to_route("cita.index")->with('status', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return to_route("cita.index")->with('status', 'Registro eliminado.');
    }


}
