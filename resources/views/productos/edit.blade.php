@extends('layouts.master')

@section('content')

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Editar producto
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{ url('productos/edit/$producto->id') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Precio</label>

                            <input type="text" name="precio" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Categoría</label>

                            <input type="text" name="categoria" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Imagen</label>
                            <input type="url" name="imagen" placeholder="url de la imagen" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                               Editar producto
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


@stop