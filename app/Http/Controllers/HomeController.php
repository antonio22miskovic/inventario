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
        $user = Auth::user();
         $planta = $user->planta;
         if ($user->isadmin === 'true') {
            $planta = 'administrador';
                return view('home ',compact('user','planta'));
         }
            return view('home ',compact('user','planta'));
    }


    public function Info(){


        if ($user->isadmin === 'true') {
             return response()->json(['user'=>$user,'admin'=>'administrador'],200);
        }
        $planta = $user->planta;
        return response()->json(['user'=>$user,'planta'=>$planta],200);
    }
}
