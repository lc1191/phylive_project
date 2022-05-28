<?php

use Illuminate\Support\Facades\Route;
// Rutas Admin
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProductoController;
use App\Http\Controllers\Dashboard\CestaController;
use App\Http\Controllers\Dashboard\CitaController;
// Rutas Usuario
use App\Http\Controllers\Web\ProductosController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\CitasController;
use App\Htpp\Controllers\Web\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes ADMIN
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => '/panel', 'middleware' => ['auth', 'admin']], function() {
    //Ruta Vista administrador
    Route::view('/', 'dashboard.admin.index')->name('inicio');
    //Ruta Panel administrador usuarios
    Route::resource('user', UserController::class)->parameters(['user'=>'user']);
    //Ruta Panel administrador productos
    Route::resource('producto', ProductoController::class);
    //Ruta Panel administrador cestas
    Route::resource('cesta', CestaController::class)->parameters(['cesta'=>'cesta']);
    //Ruta Panel administrador citas
    Route::resource('cita', CitaController::class)->parameters(['cita'=>'cita']);
});
/*
|--------------------------------------------------------------------------
| Web Routes USUARIOS
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => '/', 'middleware' => ['auth', 'regular']], function (){
    //Ruta principal
    Route::view('/', 'web.index')->name('inicio');
    //Ruta terapias
    Route::view('/terapias', 'web.terapias')->name('terapias');
    //Ruta productos
    Route::get('/productos', ProductosController::class)->name('productos');
    //Ruta contacto
    Route::view('/contacto', 'web.contacto')->name('contacto');
    //Rutas carta
    Route::get('cart', 'App\Http\Controllers\Web\CartController@cartList')->name('cart.list');
    Route::post('cart', 'App\Http\Controllers\Web\CartController@addToCart')->name('cart.store');
    Route::post('update-cart', 'App\Http\Controllers\Web\CartController@updateCart')->name('cart.update');
    Route::post('remove', 'App\Http\Controllers\Web\CartController@removeCart')->name('cart.remove');
    Route::post('clear', 'App\Http\Controllers\Web\CartController@clearAllCart')->name('cart.clear');
    //Rutas checkout
    Route::post('/checkout', 'App\Http\Controllers\Web\CheckoutController@index')->name('checkout');
    Route::post('/checkout/form', 'App\Http\Controllers\Web\CheckoutController@form')->name('checkout.form');
    //Rutas cita
    Route::get('/cita', [App\Http\Controllers\Web\CitasController::class, 'index'])->name('cita');
    Route::post('/cita/agregar', [App\Http\Controllers\Web\CitasController::class, 'store']);
    Route::post('/cita/mostrar', [App\Http\Controllers\Web\CitasController::class, 'show']);
    Route::post('/cita/editar/{id}', [App\Http\Controllers\Web\CitasController::class, 'edit']);
    Route::post('/cita/actualizar/{cita}', [App\Http\Controllers\Web\CitasController::class, 'update']);
    Route::post('/cita/borrar/{id}', [App\Http\Controllers\Web\CitasController::class, 'destroy']);
});

require __DIR__.'/auth.php';
