<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Cesta;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = \Cart::getContent();
        return view('web.checkout', compact('cartItems'));
    }

    public function form(Request $request)
    {
        info($request);
        // Cancelar compra
        if ($request->input('cancel') === 'CANCELAR'){
        info('Has cancelado la operacion');
           return redirect()->route('cart.list');
       }
       // Confirmar compra
       if ($request->input('proceed') === 'PROCEDER'){
            info('Has procesado la  operacion');

            $cartItems = \Cart::getContent();
            $user_id = auth()->id();
            $user_name = auth()->user()->name;

            foreach ($cartItems as $item){
                $i_id = $item->id;
                $i_name = $item->name;
                $i_quantity = $item->quantity;
                $item->quantity;
                $i_price = $item->price;

            if ($i_name != 'ortopedica' && $i_name != 'traumatologica' &&
                $i_name != 'deportiva' && $i_name != 'geriatrica'
                && $i_name != 'neurologica'){
               // info('Entra en FALSE ' . $i_name);
                Cesta::create([
                    'id' => $request->id,
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                    'total_price' => $i_price * $i_quantity,
                    // 'product_id' => $i_id,
                    'product_name' => $i_name,
                    'quantity' => $i_quantity,
                    'price' => $i_price,

                    'street' => $request->street,
                    'city' => $request->city,
                    'province' => $request->province,
                    'zip' => $request->zip,
                    'phone' => $request->phone,

                    'pay' => $request->pay,
                    'card_number' => $request->card_number,
                    'card_ex_month' => $request->card_ex_month,
                    'card_ex_year' => $request->card_ex_year,
                    'card_ccv' => $request->card_ccv,
                    'card_title' => $request->card_title
                ]);

                // Unidades existentes de productos en la BD
                $p = Producto::select('quantity')->where('id', $i_id)->get();
                $p_quantity = $p->implode('quantity',',');
                //info('La cantidad de ese producto en la BD son : '. $p_quantity);

                // Cantidad restante
                if($p_quantity>=0){
                    $ff = $p_quantity - $i_quantity;
                    //info('Las unidades existentes son : '.$ff);
                        // Actualizar tabla productos con stock existentes segun compras
                        DB::table('productos')
                        ->where('id', $i_id)
                        ->update(['quantity' => DB::raw($ff)]);
                }
            }

            // else if ($i_name == 'ortopedica' || $i_name == 'traumatologica'
            //     || $i_name == 'deportiva' || $i_name == 'geriatrica'
            //     || $i_name == 'neurologica'){
            //     info('Entra en TRUE ' . $i_name);
            //     // Variables para citas
            //     $price = 25;
            //     $quantity = 1;
            //     // Crear en la base de datos de cesta
            //     Cesta::create([
            //         'id' => $request->id,
            //         'user_id' => $user_id,
            //         'user_name' => $user_name,
            //         'total_price' => $price,
            //         // 'product_id' => $i_id,
            //         'product_name' => $i_name,
            //         'quantity' => $quantity,
            //         'price' => $price,

            //         'street' => $request->street,
            //         'city' => $request->city,
            //         'province' => $request->province,
            //         'zip' => $request->zip,
            //         'phone' => $request->phone,

            //         'pay' => $request->pay,
            //         'card_number' => $request->card_number,
            //         'card_ex_month' => $request->card_ex_month,
            //         'card_ex_year' => $request->card_ex_year,
            //         'card_ccv' => $request->card_ccv,
            //         'card_title' => $request->card_title
            //     ]);
            // }
            }

            // Reglas de validación
            request()->validate(Cesta::$rules);

            \Cart::clear();
            return view('web.finishCheckout');
       }
    }
}
