<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $user_id = auth()->id();

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

    public function updateCart(Request $request)
    {
        $quantity = $request->quantity;
        $p_id = $request->id;

        $db_producto = Producto::select('quantity')->where('id', $p_id)->get();
        $qt= $db_producto->implode('quantity',',') ;
        $q_producto= $qt - $quantity ;

        //info('Stock actual del producto en la BD : ' . $qt);
        //info('Stock actual del producto segun cantidad de usuario: ' . $q_producto);

        if ($q_producto > 0 && $quantity > 0){
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
            session()->flash('success', 'Cesta actualizada');
        }

        else if ($quantity > $qt || $quantity <= 0){
            //info('Cantidad introducida ('.$quantity.') no disponible para producto con id ' . $p_id);
            session()->flash('error', 'Cesta no actualizada');
        }
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Producto eliminado');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'Cesta eliminada');

        return redirect()->route('cart.list');
    }
}
