<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        return Categoria::all();
    }

    public function store(Request $request)
    {
        Categoria::create([
            'categoria' => $request['categoria'],
            'descripcion' => $request['descripcion']
        ]);

        return response()->json(['mensaje'=> 'categoria añadida con exito'],201);
    }


    public function show($id)
    {
        $categoria = Categoria::find($id);

        if (is_null($categoria)) {
           return response()->json(['mensaje'=>'categoria no encontrada'],404);
        }
            $categoria->equipos;
        return response()->json(['categoria'=> $categoria],200);
    }

    public function update(Request $request, $id)
    {
            $categoria = Categoria::find($id);

        if (is_null($categoria)) {

        }
                $categoria->update($request->all());
            return response()->json(['mensaje'=> 'se actualizado correctamente'],201);
    }


    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if (is_null($categoria)) {
           return response()->json(['mensaje'=>'categoria no encontrada'],404);
        }

        $categoria->delete();

        return response()->json(['mensaje'=>'datos eliminados correctamente'],200);
    }
}
