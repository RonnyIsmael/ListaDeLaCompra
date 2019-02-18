<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Producto;
use App\ProductoUser;

class productoController extends Controller
{
    public function getIndex($categorias=null)
    {
        if(isset($categorias)){
            $arrayContenido = Producto::distinct()->pluck('categoria');
        } else{
           $arrayContenido = Producto::all();
        }

        return view('productos.index',array('arrayContenido'=>$arrayContenido))->with('categorias',$categorias);
    }
    public function getProductosCategoria($categoria){
        $categorias =null;
        $arrayContenido = Producto::where('categoria','=',$categoria)->get();
        return view('productos.index',array('arrayContenido'=>$arrayContenido))->with('categorias',$categorias);
    }

    public function getShow($id)
    {
        $pediente=false;
        $producto = Producto::findOrFail($id);
        $productoComprado = ProductoUser::where('producto_id','=',$id)->get();

        if (count($productoComprado)>0){
            $pediente = true;
        }
        return view('productos.show', array('detalles'=>$producto))->with('id',$id)->with('pendiente',$pediente);
    }
    public function getCreate()
    {
        return view('productos.create');
    }
    public function postCreate(Request $request)
    {
        Producto::forceCreate([
            'nombre'=>$request->nombre,
            'categoria'=>$request->categoria,
            'precio'=>$request->precio,
            'imagen'=>$request->imagen,
            'descripcion'=>$request->descripcion
        ]);
        return view('productos.create');
    }
    public function getEdit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', array('producto'=>$producto));
    }
    public function putEdit(Request $request,$id)
    {
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->imagen = $request->imagen;
        $producto->descripcion = $request->descripcion;
        $producto->save();
        return redirect('productos/show/'. $producto->id);
    }
    public function changeComprado($id){
        $usuarioId = auth()->user()->id;

        ProductoUser::forceCreate([
            'user_id'=>$usuarioId,
            'producto_id'=>$id
        ]);

        return back();
    }


}
