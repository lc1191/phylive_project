<?php

namespace App\Http\Controllers\Dashboard;
//Clases Laravel
use App\Http\Controllers\Controller;
//Clases proyecto
use App\Http\Requests\Producto\PutRequest;
use App\Http\Requests\Producto\StoreRequest;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::paginate(8);
        return view('dashboard.producto.index', compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        //dd($producto);
        echo view('dashboard.producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
       // dd($request);
        $data = $request->validated();

        if (isset($data["image"])){
            $data["image"] = $filename = time()."".$data["image"]->extension();

            //Mover archivo a los discos de laravel
            $request->image->move(public_path("panel/producto/image"),$filename);
        }

        Producto::create($data);
        return to_route("producto.index")->with('status', 'Registro creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view("dashboard.producto.show", compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        echo view('dashboard.producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Producto $producto)
    {
        $data = $request->validated();
        if (isset($data["image"])){
            $data["image"] = $filename = time()."".$data["image"]->extension();

        //Mover archivo a los discos de laravel
        $request->image->move(public_path("panel/producto/image"),$filename);
        }

        $producto->update($data);
        return to_route("producto.index")->with('status', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return to_route("producto.index")->with('status', 'Registro eliminado.');
    }
}
