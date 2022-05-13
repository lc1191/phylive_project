@csrf

@section('title')
    Edicion cestas
@endsection
<form>
    <label for="">Dirección</label>
    <input type="text" class="" name="street"  value={{ old("street",$cesta->street) }}>

    <label for="">Población</label>
    <input type="text" class="" name="province"  value={{ old("province",$cesta->province) }}>

    <label for="">Código Postal</label>
    <input type="text" class="" name="zip"  value={{ old("zip",$cesta->zip) }}>

    <div>
    <button type="submit" class="btn btn-success mt-3">Enviar</button>
    </div>
</form>
