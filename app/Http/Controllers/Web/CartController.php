<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        //dd($cartItems);
        return view('web.cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $cartItems = \Cart::getContent();
        $tQuantity = '';
        $user_id = auth()->id();
        $quantity = $request->quantity;
        $p_id = $request->id;
        $db_producto = Producto::select('quantity')->where('id', $p_id)->get();
        $qt= $db_producto->implode('quantity',',') ;
        //info('Stock actual del producto en la BD : ' . $qt);

    foreach ($cartItems as $c){
       // info('La cantidad es : ' . $c->quantity);
        $tQuantity = $c->quantity;
    }

        if(!$qt < 1 && $tQuantity < $qt){

            if ($user_id){
                \Cart::add([
                    'id' => $request->id,
                    'name' => $request->name,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'image' => $request->image,
                ]);
                session()->flash('success', 'Producto añadido');
                return redirect()->route('cart.list');
            }
            else {
                session()->flash('error', 'Usuario no identificado');
                return redirect()->route('inicio');
            }
        }
        else {
            session()->flash('error', 'No hay stock disponible');
            return redirect()->route('productos');
        }
    }

    public function updateCart(Request $request)
    {
        $quantity = $request->quantity;
        $p_id = $request->id;
        $db_producto = Producto::select('quantity')->where('id', $p_id)->get();
        $qt= $db_producto->implode('quantity',',') ;
        //info('Stock actual del producto en la BD : ' . $qt);

        if ($qt > 0 && $quantity <= $qt && $quantity > 0){
            \Cart::update(
                $request->id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity
                    ],
                ]
            );
            //info('Stock del producto con id ' . $p_id . ' quedan ' . $q_producto . ' unidades');
            session()->flash('success', 'Articulo actualizado');
        }

        else if ($quantity > $qt || $quantity < 1){
            //info('Cantidad introducida ('.$quantity.') no disponible para producto con id ' . $p_id);
            session()->flash('error', 'Articulo no actualizado');
        }
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('error', 'Articulo eliminado');
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('error', 'Cesta eliminada');
        return redirect()->route('cart.list');
    }
}
