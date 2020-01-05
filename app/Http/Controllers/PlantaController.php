<?php

namespace App\Http\Controllers;

use App\Planta;
use Illuminate\Http\Request;

class PlantaController extends Controller
{

    public function index()
    {
        return Planta::all();
    }

    public function store(Request $request)
    {
        Planta::create([
            'nombre' =>  $request['nombre'],
            'descripcion' =>  $request['descripcion'],
            'localidad' =>  $request['localidad'],
            'user_id' => $request['id']
        ]);

        return response()->json(['mensaje'=> 'planta agregada con exito'],201);
    }


    public function show($id)
    {
      $planta = Planta::find($id);

        if (is_null($planta)) {
            return response()->json(['mensaje'=>'planta procesadora no encontrada'],404);
        }
            $planta->user;

        return response()->json(['planta'=>$planta],200);
    }

    public function update(Request $request, $id)
    {
         $planta = Planta::find($id);

        if (is_null($planta)) {
            return response()->json(['mensaje'=>'planta procesadora no encontrada'],404);
        }

         $planta->update($request->all());
        return response()->json(['mensaje'=>'datos actualizados correctamente'],201);
    }


    public function destroy($id)
    {
         $planta = Planta::find($id);

        if (is_null($planta)) {
            return response()->json(['mensaje'=>'planta procesadora no encontrada'],404);
        }

        $planta->delete();
        return response()->json(['mensaje'=>'datos eliminados correctamente'],200);
    }
}
