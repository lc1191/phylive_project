<?php

namespace App\Http\Controllers\Dashboard;
//Clases Laravel
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//Clases proyecto;
use App\Models\Cesta;

class CestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cesta = Cesta::paginate(8);
        //dd($cesta);
        return view('dashboard.cesta.index', compact('cesta'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cesta  $cesta
     * @return \Illuminate\Http\Response
     */
    public function show(Cesta $cesta)
    {
        //dd($cesta);
        return view("dashboard.cesta.show", compact('cesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cesta  $cesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cesta $cesta)
    {
        echo view('dashboard.cesta.edit', compact('cesta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cesta  $cesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cesta $cesta)
    {
        $data = $request->validated();
        $cesta->update($data);
        //$request->session()->flash('status', 'Registro actualizado.');
        return to_route("cesta.index")->with('status', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cesta  $cesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cesta $cesta)
    {
        $cesta->delete();
        return to_route("cesta.index")->with('status', 'Registro eliminado.');
    }


}
