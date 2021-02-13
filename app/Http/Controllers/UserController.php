<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = User::where('is_admin',null)->get();
        return response()->json(['user'=> $user],200);
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'apellido' => $request['apellido'],
            'cedula' => $request['cedula'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
         return response()->json(['mensaje'=> 'usuario creado con exito'],201);
    }


    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user)) {

            return response()->json(['mensaje'=> 'usuario no existe'],404);

        }
            $user->planta;

        return response()->json(['usuario'=>$user],200);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (is_null($user)) {

            return response()->json(['mensaje'=> 'usuario no existe'],404);
        }
        $user->update($request->all());
        return response()->json(['mensaje'=>'se ah actualizado con exito'],201);
    }


    public function destroy($id)
    {
         $user = User::find($id);

        if (is_null($user)) {

            return response()->json(['mensaje'=> 'usuario no existe'],404);
        }

        $user->delete();

        return response()->json(['mensaje'=>'usuario eliminado con exito'],200);
    }
}
