<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Departamento;
class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $planta = $user->planta;

        $departamento = Departamento::orderBy('id', 'desc')->where('planta_id',$planta->id)->paginate(5);

          return [

            'paginate' => [

                'total' => $departamento->total(),
                'current_page' => $departamento->currentPage(),
                'per_page' => $departamento->perPage(),
                'last_page' => $departamento->lastPage(),
                'from' => $departamento->firstItem(),
                'to' => $departamento->lastPage(),

            ],
           'departamento' => $departamento
        ];

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $user = Auth::user();
            $planta = $user->planta;

        Departamento::create([

            'departamento' => $request['departamento'],
            'descripcion' => $request['descripcion'],
            'planta_id' => $planta->id

        ]);

        return response()->json(['mensaje' => 'se ah añadido el departamento con exito'],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Departamento::find($id);

        if (is_null($departamento)) {
            return response()->json(['mensaje'=> 'departamento no encontrado'],404);
        }

        $departamento->equipos;

        return response()->json(['datos' => $departamento],200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $departamento = Departamento::find($id);

        if (is_null($departamento)) {
            return response()->json(['mensaje'=> 'departamento no encontrado'],404);
        }

        $departamento->update($request->all());

        return response()->json(['mensaje'=>'el usuario se actualizo con exito'],201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $departamento = Departamento::find($id);

        if (is_null($departamento)) {
            return response()->json(['mensaje'=> 'departamento no encontrado'],404);
        }

        $departamento->delete();

        return response()->json(['mensaje'=>'se ah eliminado con exito']);
    }
}
