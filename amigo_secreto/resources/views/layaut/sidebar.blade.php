@php
use App\Models\User;
use Illuminate\Support\Facades\Auth;
$sideb = User::join('amigo', 'amigo.id_amigo', '=', 'users.cc_user')
    ->join('validar', 'validar.cc_user', '=', 'users.cc_user')
    ->select('name', 'users.cc_user', 'email', 'genero', 'users.f_naci', 'validar.age', 'validar.nomina')
    ->where('amigo.id_user', Auth::user()->cc_user)
    ->get();
$resul = json_encode($sideb);



$edmin = User::select('rol')
    ->where('cc_user', Auth::user()->cc_user)
    ->where('rol', '=', 1)
    ->get();
$rol = json_encode($edmin);


@endphp
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>


        <a class="navbar-brand m-0" href="#">
            <img src="./assets/img/h2.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">{{ Auth::User()->name }}</span>
        </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">


    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ url('preferencias') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Mis preferencias</span>
                </a>
            </li>
            
            @if ($resul == '[]')
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('ruleta') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">cyclone</i>
                        </div>
                        <span class="nav-link-text ms-1">Girar Ruleta</span>
                    </a>
                </li>
            @endif

            @if ($resul != '[]')
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('amigo') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Mi Amigo</span>
                    </a>
                </li>
            @endif
            
             @if ($rol != '[]')
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ url('parejas') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">wc</i>
                    </div>
                    <span class="nav-link-text ms-1">Listar Parejas</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white " href="{{ url('inscritos') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">groups</i>
                    </div>
                    <span class="nav-link-text ms-1">Resumen Inscritos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ url('por_girar') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">flip_camera_android</i>
                    </div>
                    
                    <span class="nav-link-text ms-1">Por Girar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ url('por_elegir') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">accessibility</i>
                        
                    </div>
                    <span class="nav-link-text ms-1">Por Elegir</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ url('por_inscribir') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">group_off</i>
                    </div>
                    <span class="nav-link-text ms-1">Por Inscribir</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link text-white " href="{{ url('agencias') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Por Nomina</span>
                </a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ url('auto') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Auto Asignar</span>
                </a>
            </li>      
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ url('bienvenida') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mensaje de bienvenida</span>
                </a>
            </li>
 @endif
 
            <hr class="horizontal light mt-0 mb-2">

           <li class="nav-item">
                <form class="d-flex" action="{{url('logout')}}" method="post">
                    @csrf
                    <a class="nav-link text-white " type="submit" href="#"
                        onclick="this.closest('form').submit()">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">logout</i>
                        </div>
                        <span class="nav-link-text ms-1">Salir</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</aside>
