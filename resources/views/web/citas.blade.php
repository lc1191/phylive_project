@extends('layouts.layout')

@section('title')
    Citas
@endsection

@section('content')
<div class="container">
    <div id="agenda"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="cita" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos de la cita para {{Auth::user()->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" id="formularioCitas">
                    {{ csrf_field() }}

                    <!--ID-->
                    <div class="form-group d-none">
                        <label for="id">ID:</label>
                        <input type="text" class="form-control" name="id" id="id">
                    </div>

                    <!--Terapias-->
                    <div class="form-group">
                        <label for="title">Terapias</label>
                        {{-- <input type="text" name="title" id="title" class="form-control"> --}}
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="title" id="title" value="ortopedica"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="title">Ortopédica</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="title" id="title" value="traumatologica"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="title">Traumatológica</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="title" id="title" value="deportiva"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="title">Deportiva</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="title" id="title" value="geriatrica"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="title">Geriatrica</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="title" id="title" value="neurologica"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="title">Neurologica</label>
                            </div>
                            <small id="helpId" class="form-text text-muted">Indica terapia</small>
                        </div>

                        <!--Descripción-->
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            <small id="helpId" class="form-text text-muted">Indica dolor</small>
                        </div>

                        <!--Dia-->
                        <div class="form-group">
                            <label for="start">Dia</label>
                            <input type="date" name="start" id="start" class="form-control" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Indica dia</small>
                        </div>

                        <!--Hora-->
                        <div class="form-group">
                            <label for="end">Hora</label>
                            {{-- <input type="time" class="form-control" name="end" id="end" aria-describedby="helpId"> --}}
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="end" id="16" value="16"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="end">16:00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="end" id="17" value="17"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="end">17:00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="end" id="18" value="18"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="end">18:00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="end" id="19" value="19"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="end">19:00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="end" id="20" value="20"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="end">20:00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="end" id="21" value="21"
                                aria-describedby="helpId">
                                <label class="form-check-label" for="end">21:00</label>
                            </div>
                            <small id="helpId" class="form-text text-muted">Indica hora</small>
                        </div>
                    </form>
                </div>
                <!--Botones-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT QUE LEEA SI CADA ID DE HORA --}}
@endsection
