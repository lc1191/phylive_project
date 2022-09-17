<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Producto\PutRequest;
use App\Http\Requests\Producto\StoreRequest;
use App\Models\Producto;

class ProductoController extends Controller
{

    public function index()
    {
        return response()->json(Producto::paginate(8));
    }

    public function show(Producto $producto)
    {
        return response()->json($producto);
    }

    public function store(StoreRequest $request)
    {
        return response()->json (Producto::create($request->validated()));
    }

    public function update(PutRequest $request, Producto $producto)
    {
        $producto->update($request->validated());
        return response()->json($producto);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json("OK");
    }
}
