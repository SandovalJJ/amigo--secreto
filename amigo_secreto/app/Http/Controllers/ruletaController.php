<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ruletaController extends Controller
{
    public function index() {

        
        $usuarioAutenticado = Auth::user();
        $generoUsuario = $usuarioAutenticado->genero; // Asumiendo que el usuario tiene un campo 'genero'
        
        $generoOpuesto = $generoUsuario === 'M' ? 'F' : 'M';

        //--------------por si lo suegan entre agencias o por generos--------------------------
        $condicion = User::select('genero')
        ->where('estado','=','0','AND', 'cc_user', '!=', Auth::user()->cc_user)
        ->get();


        $datos = User::select('cc_user', 'genero')
        ->where('estado', '=', '0')
        ->where('cc_user', '!=', $usuarioAutenticado->cc_user)
        ->where('genero', $generoOpuesto)
        ->get();

        if ($datos->isEmpty()) {
            // Si no hay usuarios del género opuesto, obtén de cualquier género
            $datos = User::select('cc_user', 'genero')
                ->where('estado', '=', '0')
                ->where('cc_user', '!=', $usuarioAutenticado->cc_user)
                ->get();
        }


        $total = $datos->count();

        return view('ruleta', compact('total', 'datos', 'generoUsuario'));
    }
}
