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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 
*/
Route::middleware('auth:sanctum')->get("/user", "API\AuthController@index")->middleware('verificar.rol');
Route::middleware('auth:sanctum')->delete("/LogOut", "API\AuthController@LogOut");


Route::post("/registro", "API\AuthController@registrar_usuario");
Route::post("/login", "API\AuthController@LogIn");

Route::get("/productos/{id?}","API\ProductoController@index")->where("id","[0-9]+");
Route::post("/productos","API\ProductoController@guardar");
Route::delete("/productos/{id?}","API\ProductoController@borrarproducto")->where("id","[0-9]+")->middleware('verificar.producto');
Route::put('/productos/{id?}', 'API\ProductoController@actualizardato');

//

Route::get("/comentarios/{id?}","API\ComentarioController@indexcomentario")->where("id","[0-9]+");
Route::post("/comentarios","API\ComentarioController@guardarcomentario");
Route::delete("/comentarios/{id?}","API\ComentarioController@borrarcomentario")->where("id","[0-9]+");
Route::put('/comentarios/{id?}', 'API\ComentarioController@actualizarcomentario');

//

Route::get("/personas/{id?}","API\PersonasController@indexpersonas")->where("id","[0-9]+");
Route::post("/personas","API\PersonasController@guardarpersonas");
Route::delete("/personas/{id?}","API\PersonasController@borrarpersona")->where("id","[0-9]+");
Route::put('/personas/{id?}', 'API\PersonasController@actualizarpersona');
