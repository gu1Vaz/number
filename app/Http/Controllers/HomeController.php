<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorito;
use App\Models\User;
use App\Models\Grupo;
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


    public function index()
    {
        $favoritos = Auth::user()->numeros;
        $numeros =  Auth::user()->numero;
        $grupos = Grupo::all();
        return view('home',compact('favoritos','grupos','numeros'));
    }
    public function editarPerfil(Request $request)
    {

    }
    public function meuPerfil()
    {
        return view('Perfil.meuPerfil');
    }
}
