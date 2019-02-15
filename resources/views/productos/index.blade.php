@extends('layouts.master')

@section('content')

    <div class="row">
        @php
            $key = 0;
        @endphp
        @if(isset($categorias))
            @foreach( $arrayContenido as $categoria )
                @php
                    $key++;
                @endphp
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">

                    <a href="{{ url('/productos/index/'.$categoria ) }}">
                        <h4 style="min-height:45px;margin:5px 0 10px 0">
                            {{$categoria}}
                        </h4>
                    </a>

                </div>
            @endforeach

        @else
        @foreach( $arrayContenido as $producto )
            @php
                $key++;
            @endphp

            <div class="col-xs-6 col-sm-4 col-md-3 text-center">

                <a href="{{ url('/productos/show/' . $key ) }}">
                    <img src="https://picsum.photos/200/300/?random" style="height:200px"/>
                    <h4 style="min-height:45px;margin:5px 0 10px 0">
                        {{$producto->nombre}}
                    </h4>
                </a>

            </div>
        @endforeach
        @endif
    </div>

@stop