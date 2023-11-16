<?php

namespace App\Http\Controllers;

use App\Models\Amigo;
use Illuminate\Http\Request;
use App\Models\Dulce;
use App\Models\Regalo;
use App\Models\User;
use Response;
use Illuminate\Support\Facades\Auth;

class preferenciasController extends Controller
{
    public function index2() {

        $regalo = Regalo::
            select( 'mi_deseo')
            ->where('id_user', Auth::user()->cc_user)
            ->get();

            $dulce = Dulce::
            select( 'dulces')
            ->where('id_user', Auth::user()->cc_user)
            ->get();

            $total_r = Regalo::select('mi_deseo')
            ->where('id_user', Auth::user()->cc_user)
            ->get()->count();

            $total_d = Dulce::select('dulces')
            ->where('id_user', Auth::user()->cc_user)
            ->get()->count();

        return view('preferencias', compact('regalo','dulce','total_r','total_d'));
    }

    public function guardar_dulce(Request $request){

        $dulces = new Dulce;
        $dulces->id_user= Auth::user()->cc_user;
        $dulces->dulces = $request->dulces;
        $dulces->save();

        return  Response::json(['msg' => $dulces]);
    }

    public function guardar_regalo(Request $request){

        $regalo = new Regalo;
        $regalo->id_user= Auth::user()->cc_user;
        $regalo->mi_deseo = $request->regalo;
        $regalo->save();

        return  Response::json(['msg' => $regalo]);

    }

    public function guardar_amigo(Request $request){
        $amigo = new Amigo;
        $amigo->id_user= Auth::user()->cc_user;
        $amigo->id_amigo = $request->amigo;

            if($amigo->save()){
                $usuario = User:: WHERE('cc_user', $amigo->id_amigo)
                ->update(['estado'=> 1]);

            }

        return  Response::json(['msg' => $amigo]);
    }

    

}
