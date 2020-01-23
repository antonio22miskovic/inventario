<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
