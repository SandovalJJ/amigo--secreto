<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ruletaController extends Controller
{
    public function index() {



        //--------------por si lo suegan entre agencias o por generos--------------------------
        $condicion = User::select('genero')
        ->where('estado','=','0','AND', 'cc_user', '!=', Auth::user()->cc_user)
        ->get();


        $datos = User::select('cc_user', 'genero')
        ->where('estado','=','0')
        ->where('cc_user', '!=', Auth::user()->cc_user)
        ->get();


        $total = User::select('estado')
        ->where('estado','=','0')
        ->where('cc_user', '!=', Auth::user()->cc_user)
        ->get()->count();

        return view('ruleta', compact('total','datos', 'condicion'));
    }
}
