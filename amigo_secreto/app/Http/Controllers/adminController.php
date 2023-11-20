<?php

namespace App\Http\Controllers;

use App\Models\Amigo;
use App\Models\User;
use App\Models\Regalo;
use App\Models\Dulce;
use App\Models\Valida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DB;
use App\Models\Bienvenida;
use Illuminate\Support\Facades\View;


date_default_timezone_set('America/Bogota');

class adminController extends Controller
{
    public function parejas()
    {
        $amigos = DB::select("SELECT id_amigo, id_user,fecha_reg,
        (SELECT CONCAT( pri_apellido, seg_apellido, nombre)  FROM validar    WHERE validar.cc_user = amigo.id_amigo) AS Amigo,
        (SELECT nomina  FROM validar       WHERE validar.cc_user = amigo.id_user) AS N_amigo,
        (SELECT age FROM validar       WHERE validar.cc_user = amigo.id_user) AS Ag_amigo,
        (SELECT CONCAT(pri_apellido, seg_apellido, nombre)         FROM validar       WHERE validar.cc_user = amigo.id_user) AS Usuario,
        (SELECT nomina FROM validar       WHERE validar.cc_user = amigo.id_user) AS N_user,
        (SELECT age FROM validar       WHERE validar.cc_user = amigo.id_user) AS Ag_user
        FROM amigo");

        return view('parejas', compact('amigos'));
    }

    public function inscritos()
    {
        $inscritos = User::join('validar', 'validar.cc_user', '=', 'users.cc_user')
            ->select('validar.pri_apellido', 'seg_apellido', 'nombre', 'age')
            ->where('users.cc_user', '!=', 'admin')
            ->get();

        return view('inscritos', compact('inscritos'));
    }

    public function validar(Request $request)
    {
       
        $cedul = User::where('cc_user', $request->cedula)->exists();
        $cedula = Valida::where('cc_user', $request->cedula)->exists();
        
        if($cedul){
             return response()->json(['esta' => 1]);
        } 
        
        if ($cedula) {
            return response()->json(['estado' => 1]);
        } else {
            return response()->json(['estado' => 0]);
        }
}
    public function validar_nombre(Request $request)
    {

        $nombre = Valida::where('nombre', $request->nombre)->where('cc_user', $request->cedula)->exists();

        if ($nombre) {
            return response()->json(['estado1' => 1]);
        } else {
            return response()->json(['estado1' => 0]);
        }
    }

    public function   validar_p_apellido(Request $request)
    {

        $p_apellido = Valida::where('pri_apellido', $request->p_apellido)->where('cc_user', $request->cedula)->exists();

        if ($p_apellido) {
            return response()->json(['estado2' => 1]);
        } else {
            return response()->json(['estado2' => 0]);
        }
    }

    public function   validar_s_apellido(Request $request)
    {

        $seg_apellido = Valida::where('seg_apellido', $request->seg_apellido)->where('cc_user', $request->cedula)->exists();

        if ($seg_apellido) {
            return response()->json(['estado3' => 1]);
        } else {
            return response()->json(['estado3' => 0]);
        }
    }

    public function   validar_fecha(Request $request)
    {
        $fecha = Valida::where('f_naci', $request->f_naci)->where('cc_user', $request->cedula)->exists();

        if ($fecha) {
            return response()->json(['estado4' => 1]);
        } else {
            return response()->json(['estado4' => 0]);
        }
    }

    public function por_girar()
    {
        $por_girar = DB::select ("select * from users where users.cc_user != 'admin' AND estado != 99 && users.cc_user not in (select amigo.id_user from amigo) order by rand (f_registro)");

        return view('por_girar',  compact('por_girar'));
    }

    public function por_elegir()
    {
        $elegir = User::join('validar', 'validar.cc_user', '=', 'users.cc_user')
            ->select('validar.pri_apellido', 'seg_apellido', 'nombre', 'age')
            ->where('users.estado', '=', '0', 'AND', 'users.cc_user', '!=', 'admin')
            ->get();

        return view('por_elegir', compact('elegir'));
    }

    public function por_inscribir()
    {
        $por_inscribir = DB::select("SELECT * FROM validar
      WHERE NOT EXISTS (SELECT * FROM users WHERE users.cc_user = validar.cc_user ) ");

        return view('por_inscribir', compact('por_inscribir'));
    }

    public function agencias()
    {
        return view('agencias');
    }

   /*  public function auto()
    {
        return view('auto');
    } */


    public function auto()
    {
        $usuariosDisponibles = DB::select("SELECT cc_user, genero FROM users WHERE NOT EXISTS
                                           (SELECT * FROM amigo WHERE users.cc_user = amigo.id_user)
                                           AND estado != 1");
    
        // Separar usuarios por género
        $hombres = array_filter($usuariosDisponibles, function($usuario) {
            return $usuario->genero == 'M';
        });
    
        $mujeres = array_filter($usuariosDisponibles, function($usuario) {
            return $usuario->genero == 'F';
        });
    
        // Asignar amigos a hombres priorizando mujeres
        foreach ($hombres as $hombre) {
            if (!$this->asignarAmigo($hombre, 'F')) {
                $this->asignarAmigo($hombre, null); // Asignar a cualquier género si no se encuentra mujer
            }
        }
    
        // Asignar amigos a mujeres priorizando hombres
        foreach ($mujeres as $mujer) {
            if (!$this->asignarAmigo($mujer, 'M')) {
                $this->asignarAmigo($mujer, null); // Asignar a cualquier género si no se encuentra hombre
            }
        }
    
        return back();
    }
    
    private function asignarAmigo($usuario, $generoBuscado)
    {
        $ced = $usuario->cc_user;
        $query = "SELECT cc_user FROM users WHERE NOT EXISTS (SELECT * FROM amigo WHERE users.cc_user = amigo.id_amigo) AND cc_user <> ? AND estado = 0";
    
        if ($generoBuscado !== null) {
            $query .= " AND genero = ?";
            $amigoPotencial = DB::select($query, [$ced, $generoBuscado]);
        } else {
            $amigoPotencial = DB::select($query, [$ced]);
        }
    
        if (!empty($amigoPotencial)) {
            $dato_amigo = $amigoPotencial[0]->cc_user;
    
            DB::insert("INSERT INTO amigo (`id_amigo`, `id_user`) VALUES (?, ?)", [$dato_amigo, $ced]);
            DB::update("UPDATE users SET estado = 1 WHERE cc_user = ?", [$dato_amigo]);
            return true;
        }
    
        return false;
    }

//MODAL DE LOGIN

public function getLatestContent()
{
    $latestContent = Bienvenida::latest('id_bienvenida')->first();
    return response()->json($latestContent);
}

    
    public function store(Request $request)
    {
        $content = new Bienvenida;
        $content->contenido = $request->input('content');
        $content->save();
    
        return back();
    }
    

}