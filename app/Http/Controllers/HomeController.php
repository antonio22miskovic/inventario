<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Departamento;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function info()
    {

      $user = Auth::user();
      $user->planta;
      return response()->json(['user'=>$user],200);

    }

    public function select(){

         $user = Auth::user();
         $planta = $user->planta;
            $departamentos = $planta->departamentos;

            return response()->json(['depa'=>$departamentos],200);

    }

    public function filtro($codigo){

        $user = Auth::user();
         $planta = $user->planta;

      $equipo = Equipo::where('codigo',$codigo)->first();

      if (is_null($equipo)) {

        $equipo = 1;

         return response()->json($equipo);

      }

        $departamentos = $planta->departamentos;

         foreach ($departamentos as $departamento) {

             if ($departamento->id === $equipo->departamento_id) {

                    return [ $equipo ];

             }
         }

            $equipo = 1;
         return response()->json($equipo);


    }

}
