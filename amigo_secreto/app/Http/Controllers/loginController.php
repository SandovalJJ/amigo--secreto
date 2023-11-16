<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Valida;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{

    public function registro(){
        return view('auth.registro');
    }

    public function crear_usuario(Request $request){
        $usuario = new User;

        $amigo = Valida::select('pri_apellido','seg_apellido','nombre','cu_age','f_naci','n_cuenta','correo','gener')
        ->where('cc_user', $request->cedula)
        ->get();
        
        if(empty($amigo)){
        
        $pri_apellido = $amigo[0]->pri_apellido;
        $seg_apellido = $amigo[0]->seg_apellido;
        $nombre = $amigo[0]->nombre;
        $cu_age = $amigo[0]->cu_age;
        $f_naci = $amigo[0]->f_naci;
        $n_cuenta = $amigo[0]->n_cuenta;
        $correo = $amigo[0]->correo;
        $genero = $amigo[0]->gener;
        
        $usuario->cc_user = $request->cedula;
        $usuario->p_apellido = $pri_apellido;
        $usuario->s_apellido = $seg_apellido;
        $usuario->name = $nombre;
        $usuario->area = $cu_age;
        $usuario->f_naci = $f_naci;
        $usuario->cuenta = $n_cuenta;
        $usuario->email = $correo;
        $usuario->genero = $genero;
        $usuario->estado = 0;
        $usuario->password = Hash::make($request->cedula);

        $usuario->save();
        return back()->with('success', 'Usuario creado con exito');
}else{
    return back()->with('danger', 'debes llenar todos los datos');
}
    }


    public function index(){
        return view('auth.login');
    }

    public function autenticar(){
        $datos = request()->only('cc_user', 'password');

        if (Auth::attempt($datos)){
            request()->session()->regenerate();
            return redirect('preferencias/');
        }
          return redirect('login');
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
}



}
