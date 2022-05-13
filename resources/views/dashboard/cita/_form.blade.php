@csrf

@section('title')
    Edicion citas
@endsection
<form>
    <label for="">Terapia</label>
    <input type="text" class="" name="title"  value={{ old("title",$cita->title) }}>

    <label for="">Descripcion</label>
    <input type="text" class="" name="description"  value={{ old("description",$cita->description) }}>

    <div>
    <button type="submit" class="btn btn-success mt-3">Enviar</button>
    </div>
</form>
