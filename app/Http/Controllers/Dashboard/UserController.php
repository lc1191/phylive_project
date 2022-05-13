<?php

namespace App\Http\Controllers\Dashboard;
//Clases Laravel
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Clases proyecto;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar todos los usuarios menos "admin"
        $user = User::where('name', '<>', 'admin')->paginate(8);
        //dd($user);
        return view('dashboard.user.index', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //dd($user);
        return view("dashboard.user.show", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        echo view('dashboard.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        //$request->session()->flash('status', 'Registro actualizado.');
        return to_route("user.index")->with('status', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route("user.index")->with('status', 'Registro eliminado.');
    }


}
