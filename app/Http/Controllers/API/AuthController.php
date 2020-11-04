<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registrar_usuario(Request $request)
    {
        $request ->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
            'roles_id' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles_id = $request->roles_id;

        if($user->save())
            return response()->json($user,200);
        
            return abort(400, "No Se Pudo Registrar");
    }
    public function index(Request $request)
    {
        if($request->user()->tokenCan('Usuario')){
            return response()->json(["perfil" => $request-> user()],200);

            return response()->json(["Scope Invalido nene"],401);
        }
        else if($request->user()->tokenCan('Admin')){
            return response()->json(["users" => User::all()],200);

            return response()->json(["Administrador"=>$request->user()],200);
        }
    }
    public function LogOut(Request $request)
    {
        return response()->json(["eliminados" => $request->user()->tokens()->delete()],200);
    }
    public function LogIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email|password' => ['Usuario o Contraseña Incorrectos Favor De Verificar Los Datos'],
            ]);
        }
        if($user->roles_id == 1){
            $token = $user->createToken($request->email,['Admin'])->plainTextToken;
        }
        else if($user->roles_id == 2){
            $token = $user->createToken($request->email,['Usuario'])->plainTextToken;

        }
        
        return response()->json(["token"=>$token],201);

    }

    
}
