<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\comentarios;

class ComentarioController extends Controller
{
    public function indexcomentario($id = null){
        if($id)
        return response()->json(["comentario"=>comentarios::find($id)],200);
       return response()->json(["comentarios"=>comentarios::all()],200);
   }

    public function guardarcomentario(Request $request){
       $comentario = new comentarios();
       $comentario->producto_id = $request->producto_id;
       $comentario->contenido = $request->contenido;
       $comentario->save();

       if($comentario->save())
        return response()->json(["comentario"=>$comentario],201);
       return response()->json(null,400);
    }

    public function borrarcomentario($id){
        $borrarcomentario= new comentarios();
        $borrarcomentario= comentarios::find($id);
        $borrarcomentario-> delete();
        return response()->json(["comentario"=>comentarios::all()],202);
    }

    public function actualizarcomentario(Request $request, $id){
       $new= comentarios::find($id);
       $new->producto_id = $request->producto_id;
       $new->contenido = $request->contenido;

       if($new->save())
       return response()->json(["comentario"=>$new],200);
    }

}
