@csrf

@section('title')
    Panel productos
@endsection
<form>
    <label for="">Titulo</label>
    <input type="text" class="form-control" name="title" value="{{old("title",$producto->title)}}">

    <label for="">Descripcion</label>
    <input type="text" class="form-control" name="description" value="{{old("description",$producto->description)}}">

    <label for="">Precio</label>
    <input type="text" class="form-control" name="price"  value={{ old("price",$producto->price) }}>

    <label for="">Cantidad</label>
    <input type="text" class="form-control" name="quantity"  value={{ old("quantity",$producto->quantity) }}>

    @if (isset($task) && $task == 'edit')
        <label for="">Imagen</label>
        <input type="file" name="image">
    @endif

    <div>
    <button type="submit" class="btn btn-success mt-3">Enviar</button>
    </div>
</form>
