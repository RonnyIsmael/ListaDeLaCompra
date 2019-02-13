@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-sm-4">

            {{-- TODO: Imagen genérica de los productos --}}

            <img src="https://picsum.photos/200/300/?random" style="height:200px"/>

        </div>
        <div class="col-sm-8">
            <h1>{{$detalles->nombre}}</h1>
            <p>Categoría: {{$detalles->categoria}}</p>
            @if($pendiente)
                @php
                $texto="Actualmente comprado";
                @endphp
            @else
                @php
                    $texto="Pendiente de compra";
                @endphp
            @endif


            <p>Estado: {{$texto}}</p>
            {{-- TODO: Datos del producto --}}
            <div>
                <form action="{{ url('productos/changeComprado/'.$detalles->id) }}" method="POST" style="display: inline-block">
                    {{method_field('PUT')}}

                    @csrf
                <button type="submit" class="btn btn-danger" href="">Comprar</button>

                </form>
                <a class="btn btn-warning" href="http://127.0.0.1:8000/productos/edit/{{$id}}">Editar Poducto</a>
                <a class="btn btn-primary" href="http://127.0.0.1:8000/productos">Volver al listado</a>
            </div>
        </div>

    </div>


@stop