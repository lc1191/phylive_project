@extends('layouts.layout')

@section('title')
    Checkout
@endsection

@section('content')
<form action="{{ route('checkout.form') }}" class="credit-card-div" method="post" id="formCheckout">
    @csrf
<main class="my-8 animatedL">
    <div class="container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg md:w-4/5 lg:w-4/5">
                <h3 class="text-3xl text-bold mb-4">Datos de usuario</h3>
                <div class="flex-1">
                        <div class="form-group mb-3"> <!-- Nombre -->
                            <input type="text" class="form-control" placeholder="" value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group mb-3"> <!-- Apellidos -->
                            <input type="text" class="form-control" placeholder="" value="{{Auth::user()->last_name}}">
                        </div>
                        <div class="form-group mb-3"> <!-- Dirección -->
                            <input type="text" class="form-control" id="street1_id" name="street" placeholder="Dirección completa" required>
                        </div>
                        <div class="form-group mb-3"> <!-- Población-->
                            <input type="text" class="form-control" id="city_id" name="city" placeholder="Población" required>
                        </div>
                        <div class="form-group mb-3"> <!-- Provincia -->
                            <select multiple name="province" class="form-control" id="province_id" required>
                                <option data-postal="01" value="Alava/Araba" name="alava">Alava/Araba</option>
                                <option data-postal="02" value="Albacete">Albacete</option>
                                <option data-postal="03" value="Alicante">Alicante</option>
                                <option data-postal="04" value="Almeria">Almería</option>
                                <option data-postal="05" value="Avila">Avila</option>
                                <option data-postal="06" value="Badajoz">Badajoz</option>
                                <option data-postal="07" value="Islas Baleares">Islas Baleares</option>
                                <option data-postal="08" value="Barcelona">Barcelona</option>
                                <option data-postal="09" value="Burgos">Burgos</option>
                                <option data-postal="10" value="Caceres">Cáceres</option>
                                <option data-postal="11" value="Cadiz">Cádiz</option>
                                <option data-postal="12" value="Castellon">Castellón</option>
                                <option data-postal="13" value="Ciudad Real">Ciudad Real</option>
                                <option data-postal="14" value="Cordoba">Córdoba</option>
                                <option data-postal="15" value="A Coruna/La Coruna">A Coruña/La Coruña</option>
                                <option data-postal="16" value="Cuenca">Cuenca</option>
                                <option data-postal="17" value="Gerona/Girona">Gerona/Girona</option>
                                <option data-postal="18" value="Granada">Granada</option>
                                <option data-postal="19" value="Guadalajara">Guadalajara</option>
                                <option data-postal="20" value="Gipuzkoa/Guipuzcoa">Gipuzkoa/Guipuzcoa</option>
                                <option data-postal="21" value="Huelva">Huelva</option>
                                <option data-postal="22" value="Huesca">Huesca</option>
                                <option data-postal="23" value="Jaen">Jaen</option>
                                <option data-postal="24" value="Leon">León</option>
                                <option data-postal="25" value="Lerida/Lleida">Lérida/Lleida</option>
                                <option data-postal="26" value="La Rioja">La Rioja</option>
                                <option data-postal="27" value="Lugo">Lugo</option>
                                <option data-postal="28" value="Madrid">Madrid</option>
                                <option data-postal="29" value="Malaga">Málaga</option>
                                <option data-postal="30" value="Murcia">Murcia</option>
                                <option data-postal="31" value="Navarra">Navarra</option>
                                <option data-postal="32" value="Orense/Ourense">Orense/Ourense</option>
                                <option data-postal="33" value="Asturias">Asturias</option>
                                <option data-postal="34" value="Palencia">Palencia</option>
                                <option data-postal="35" value="Las Palmas">Las Palmas</option>
                                <option data-postal="36" value="Pontevedra">Pontevedra</option>
                                <option data-postal="37" value="Salamanca">Salamanca</option>
                                <option data-postal="38" value="S.C.Tenerife">S.C.Tenerife</option>
                                <option data-postal="39" value="Cantabria">Cantabria</option>
                                <option data-postal="40" value="Segovia">Segovia</option>
                                <option data-postal="41" value="Sevilla">Sevilla</option>
                                <option data-postal="42" value="Soria">Soria</option>
                                <option data-postal="43" value="Tarragona">Tarragona</option>
                                <option data-postal="44" value="Teruel">Teruel</option>
                                <option data-postal="45" value="Toledo">Toledo</option>
                                <option data-postal="46" value="Valencia">Valencia</option>
                                <option data-postal="47" value="Valladolid">Valladolid</option>
                                <option data-postal="48" value="Bizkaia/Vizcaya">Bizkaia/Vizcaya</option>
                                <option data-postal="49" value="Zamora">Zamora</option>
                                <option data-postal="50" value="Zaragoza">Zaragoza</option>
                                <option data-postal="51" value="Ceuta">Ceuta</option>
                                <option data-postal="52" value="Melilla">Melilla</option>
                            </select>
                        </div>
                        <div class="form-group mb-3"> <!-- Codigo Postal-->
                            <input type="text" class="form-control" id="zip_id" name="zip" placeholder="Codigo Postal" required>
                        </div>
                        <div class="form-group mb-3"> <!-- Telefono-->
                            <input type="tel" class="form-control" id="phone_id" name="phone" placeholder="Telefono" required>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg md:w-4/5 lg:w-4/5">
                <h3 class="text-3xl text-bold mb-4">Datos de cesta</h3>
                    <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                            <tr class="h-12 uppercase">
                                <th class="hidden md:table-cell"></th>
                                <th class="text-left">Producto</th>
                                <th class="text-center lg:text-right lg:pl-0">Cantidad</th>
                                <th class="text-center md:table-cell"> Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{-- Bucle para mostrar todos los items --}}
                        @foreach ($cartItems as $item)
                        <tr>
                            {{-- Imagen de producto --}}
                            <td class="hidden pb-4 md:table-cell">
                                <a href="#"><img class="mx-auto w-20 rounded" src="{{Storage::url("image/$item->image")}}"></a>
                            </td>
                            {{-- Nombre de producto --}}
                            <td>
                                <a href="#"><p class="mb-2 md:ml-2">{{ $item->name }}</p></a>
                            </td>
                            <td class="ml-12 justify-center pt-10 md:justify-end md:flex">
                                <div class="h-10 w-100">
                                    <div class="relative flex flex-row w-full">
                                        <span class="w-full mr-6 px-2 text-center bg-slate-100">{{ $item->quantity }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center w-25 md:table-cell">
                                <span class="text-sm font-medium lg:text-base">{{ $item->price }},00 €</span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <div class="font-bold text-right mt-4">Total: {{ Cart::getTotal() }},00 €</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Datos de pago --}}
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div id="divCard" class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg md:w-4/5 lg:w-4/5">
                    <h3 class="text-3xl text-bold mb-4">Datos de pago</h3>
                    <div class="flex-1">
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="pay" id="option1" autocomplete="off" value="Clínica">
                            <label class="btn btn-primary py-4" for="option1">Clínica</label>
                        </div>
                        <div class="mb-3">
                            <input type="radio" class="btn-check" name="pay" id="option2" autocomplete="off" value="Tarjeta" checked>
                            <label class="btn btn-primary py-4" for="option2">Tarjeta</label>
                        </div>
                        <div id="listAll" class="classList flex flex-col justify-center items-center pt-4">
                            <div class="mb-3">
                                <input type="text" class="" style="width: 300px;" name="card_number" placeholder="Numero de tarjeta" id="card_number"/>
                            </div>
                            <div class="mb-3 flex">
                                <input type="text" class="" style="width: 100px;"name="card_ex_month" placeholder="Mes cad." id="card_ex_month" maxlength="5"/>
                                <input type="text" class="" style="width: 100px;"name="card_ex_year" placeholder="Año cad." id="card_ex_year" maxlength="5"/>
                                <input type="text" class="" style="width: 100px;"name="card_ccv" placeholder="CCV cod." id="card_ccv" maxlength="3"/>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="" style="width: 300px;" name="card_title" placeholder="Titular de tarjeta" id="card_title"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center" >
            <button class="w-64 mt-4 px-6 py-4 text-white btn btn-danger" name="cancel" onclick="history.go(-1)" >Cancelar</button>
            <button type="submit" class="w-64 mt-4 px-6 py-4 text-white btn btn-success" name="proceed" >Proceder</button>
        </div>
    </form>
</main>
<script src="{{ asset('js/pay.js') }}" defer></script>
@endsection
