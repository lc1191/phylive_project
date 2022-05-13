@csrf

@section('title')
    Edicion usuarios
@endsection
<form>
    <label for="">Nombre</label>
    <input type="text" class="" name="name"  value={{ old("name",$user->name) }}>

    <label for="">Apellidos</label>
    <input type="text" class="" name="last_name"  value={{ old("last_name",$user->last_name) }}>

    <label for="">Email</label>
    <input type="text" class="" name="email"  value={{ old("email",$user->email) }}>

    <div>
    <button type="submit" class="btn btn-success mt-3">Enviar</button>
    </div>
</form>
