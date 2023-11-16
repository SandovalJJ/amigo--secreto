<?php
namespace App\Http\Controllers;
use App\Models\Amigo;
use App\Models\Dulce;
use App\Models\Regalo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('America/Bogota');
class amigoController extends Controller
{
    public function index()
    {
        $amigo = User::join('amigo', 'amigo.id_amigo', '=', 'users.cc_user')
            ->join('validar', 'validar.cc_user', '=', 'users.cc_user')
        ->select('name','p_apellido','s_apellido', 'users.cc_user', 'email', 'genero', 'users.f_naci', 'validar.age', 'validar.nomina')
            ->where('amigo.id_user', Auth::user()->cc_user)
            ->get();

            if (!empty($amigo)) {
                $regalos = Regalo::select('mi_deseo')
                    ->where('id_user', $amigo[0]->cc_user)
                    ->get();
                if (!empty($regalos)) {
                    $regalos = $regalos;
                } else {
                    $regalos = 0;
                }

                $dulces = Dulce::select('dulces')
                    ->where('id_user', $amigo[0]->cc_user)
                    ->get();

                if (!empty($dulces)) {
                    $dulces = $dulces;
                } else {
                    $dulces = 0;
                }

                $fechaActual = date('Y-m-d');
                $date1 = new DateTime($fechaActual);
                $date2 = new DateTime($amigo[0]->f_naci);
                $diff = $date1->diff($date2);
                $edad = $diff->y;
            }

        return view('amigo', compact('amigo', 'edad', 'regalos', 'dulces'));
    }

    
}