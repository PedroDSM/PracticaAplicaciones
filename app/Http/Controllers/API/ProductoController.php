<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\producto;

class ProductoController extends Controller
{
    public function index($id = null){
        if($id)
        return response()->json(["producto"=>producto::find($id)],200);
       return response()->json(["productos"=>producto::all()],200);
   }

    public function guardar(Request $request){
       $producto = new producto();
       $producto->Nombre = $request->Nombre;
       $producto->Descripcion = $request->Descripcion;
       $producto->save();

       if($producto->save())
        return response()->json(["producto"=>$producto],201);
       return response()->json(null,400);
    }

    public function borrarproducto($id){
        $borrarproducto= new producto();
        $borrarproducto= producto::find($id);
        $borrarproducto-> delete();
        return response()->json("Ya se elimino el producto",202);
        return response()->json(["producto"=>producto::all()],202);
    }

    public function actualizardato(Request $request, $id){
       $nuevo= producto::find($id);
       $nuevo->Nombre = $request->Nombre;
       $nuevo->Descripcion = $request->Descripcion;

       if($nuevo->save())
       return response()->json(["producto"=>$nuevo],200);
    }
}
