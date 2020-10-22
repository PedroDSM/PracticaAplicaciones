<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 

Route::get("/productos/{id?}","API\ProductoController@index")->where("id","[0-9]+");
Route::post("/productos","API\ProductoController@guardar");
Route::delete("/productos/{id?}","API\ProductoController@borrarproducto")->where("id","[0-9]+");
Route::put('/productos/{id?}', 'API\ProductoController@actualizardato');
//

Route::get("/comentarios/{id?}","API\ComentarioController@indexcomentario")->where("id","[0-9]+");
Route::post("/comentarios","API\ComentarioController@guardarcomentario");
Route::delete("/comentarios/{id?}","API\ComentarioController@borrarcomentario")->where("id","[0-9]+");
Route::put('/comentarios/{id?}', 'API\ComentarioController@actualizarcomentario');