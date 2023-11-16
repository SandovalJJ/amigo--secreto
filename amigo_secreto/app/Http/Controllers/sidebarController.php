<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sidebarController extends Controller
{

    public function side()
    {
    $sideb = User::join('amigo', 'amigo.id_amigo', '=', 'users.cc_user')
        ->join('validar', 'validar.cc_user', '=', 'users.cc_user')
        ->select('name', 'users.cc_user', 'email', 'genero', 'users.f_naci', 'validar.age', 'validar.nomina')
        ->where('amigo.id_user', Auth::user()->cc_user)
        ->get();
return "hola";
        return view('sidebar', compact('sideb'));

}


}
