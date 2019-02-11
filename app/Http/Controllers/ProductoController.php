<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class productoController extends Controller
{


    public function getIndex()
    {
        $arrayProductos = Producto::all();
        return view('productos.index',array('arrayProductos'=>$arrayProductos));
    }
    public function getShow($id)
    {
        $producto = Producto::findOrFail($id);

        return view('productos.show', array('detalles'=>$producto))->with('id',$id);
    }

    public function getCreate()
    {
        return view('productos.create');
    }

    public function getEdit($id)
    {
        $producto = Producto::findOrFail($id);

        return view('productos.edit', array('producto'=>$producto));
    }


}
