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

<!DOCTYPE html>
<html lang="en">

<head>

    @include('layaut.head')
    <link rel="stylesheet" href="{{ asset('assets/css/est_ruleta.css') }}">

    <title>Girar Ruleta</title>
</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('layaut.sidebar')

    <main class="main-content border-radius-lg ">
        @include('layaut.nav')

        {{-- inicio de la ruleta --}}

        <div class="container">
            <div class="col-12" aling="center">
                <div class="card mb-3" style="max-width: 1100px; margin:auto; ">
                    <div class="row g-0"
                        style="text-align: center;box-shadow: 14px 8px 6px 0px rgb(60 136 165 / 71%);     border-radius: 15px;">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="alert alert-primary" role="alert"
                                    style="text-align: center;background: #3380b7eb;font-size: 20px;color:white">
                                    <h5 class="card-text" style="color: #fff">
                                        {{ ucfirst(ucwords(Auth::User()->name)) . ' ' . mb_strtoupper(Auth::User()->p_apellido) . ' ' . mb_strtoupper(Auth::User()->s_apellido) }}.
                                    </h5>
                                </div>
                                <h6 class="card-text">Para seleccionar su amigo secreto debes presionar el GIRAR
                                    RULETA y luego PARAR
                                </h6>
                            </div>
                        </div>

                        <div class="col-md-12" style="padding: 25px;">
                            <div class="card" style="box-shadow:3px -3px 4px 5px #3c537626;">
                                <div class="col-12">
                                    <div id="slott" class="item">
                                        <div id="slot" background=""> </div>
                                        <div id="resultad"></div>
                                        @if ($resul == '[]')
                                        <div class="row" id="botones">
                                            
                                            <button onclick="iniciar()" id="iniciar" type="button"> GIRAR
                                                RULETA</button>
                                            
                                            <button onclick="parar()" id="parar" type="submit"
                                                disabled>PARAR</button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="./assets/js/jquery_3.3.1_jquery.min.js"></script>

        <script src="./assets/js/sweetalert2.min.js"></script>
        <link href="./assets/css/sweetalert2.min.css" rel="stylesheet" />

        <script>
            // variable que contiene la posicion de la imagen
            var contador = 0;
            // variable que contiene la velocidad de movimiento
            var velocidad = 0;
            // variable que incremente y decrementa la velocidad de la imagen
            var incremento = 0;
            // variables que controlar los intervalor de tiempo
            var interval1, interval2;
            // creamos un array con las posiciones de los slots y el contenido de cada una
            // Las posiciones empiezan de abajo hacia arriba, ya que el movimiento del slot va hacia abajo
            var posicionFiguras = {


                @for ($i = 0; $i < $total; $i++)
                    {{ $i }}: '{{ $datos[$i]->cc_user }}',
                @endfor

            }

            function iniciar() {
                document.getElementById("iniciar").disabled = true;
                // inicializalos los valores
                incremento = velocidad = 1;
                // intervalo de tiempo en el que se ejecuta el movimiento
                interval1 = setInterval(function() {
                    // vamos modificando la posicion de la imagen de fondo para realizar el movimiento
                    document.getElementById("slot").style["background-position"] = "0% " + contador + "px";
                    // si incremento es negativo, quiere decir que estamos parando la imagen
                    if (velocidad < 100 || incremento < 0) {
                        // incrementamos la velocidad de movimiento
                        velocidad = velocidad + incremento;
                    }
                    if (velocidad > 50) {
                        document.getElementById("parar").disabled = false;
                    }
                    // Si la velocidad es inferior o igual a 0, paramos y nos posicionamos
                    // en el punto exacto de la siguiente imagen
                    if (velocidad <= 3 && incremento < 0) {
                        document.getElementById("parar").disabled = true;
                        clearInterval(interval1);
                        finalizarMovimiento();
                    }
                    contador += velocidad;
                }, 50);
            }

            function parar() {
                incremento = -3;
            }

            // Función para finalizar el movimiento en un elemento centrado
            function finalizarMovimiento() {
                // obtenemos la posicion exacta de la imagen
                pos = document.getElementById("slot").style.backgroundPosition;
                pos = parseInt(pos.split(" ")[1]);
                // obtenemos la posicion final donde parar para que quede la imagen
                // bien encuadrada
                var relativePos = pos % 1;
                var posicionFinal = pos - relativePos + 1;
                // intervalo de tiempo hasta que se centra la imagen en el recuadro
                interval2 = setInterval(function() {
                    contador += velocidad;
                    document.getElementById("slot").style["background-position"] = "0% " + contador + "px";
                    if (contador >= posicionFinal) {
                        clearInterval(interval2);
                        document.getElementById("slot").style["background-position"] = "0% " + (posicionFinal) + "px";
                        document.getElementById("iniciar").disabled = true;

                        // obtenemos la posicion exacta de donde se ha parado dentro de la imagen

                        posicion = posicionFinal - ({{ $total }} * parseInt(posicionFinal /
                        {{ $total }}));



                        var amigo = document.getElementById("resultad").innerHTML = posicionFiguras[posicion];
                        console.log(amigo)

                        if (amigo != undefined) {

                                $.ajax({
                                    url: "{!! url('/guardar_amigo') !!}",
                                    type: "POST",
                                    data: {
                                        amigo: amigo,
                                        _token: "{{ csrf_token() }}",
                                    },
                                    cache: false,
                                    success: function(data) {
                                        console.log(data);
                                        swal({
                                            confirmButtonText: "Conocer a mi amigo!",

                                            title: "Genial!",
                                            text: "Has Seleccionado Tu Amigo Secreto",
                                            imageUrl: './assets/img/carita.jpg',
                                            type: "success",
                                        }, function(isConfirm) {
                                            alert("Conoce a tu amigo");
                                        });
                                        $(".swal2-confirm").click(function() {
                                            window.location.href = "amigo";
                                        });

                                        //Cuando la interacción sea exitosa, se ejecutará esto.
                                    },
                                    error: function(response) {
                                        console.log(response);
                                        swal({
                                title: "Upsss!",
                                text: "Por favor gira nuevamente",
                                imageUrl: './assetsimg/ups2.jpg'

                            });
                        $(".swal2-confirm").click(function() {
                            window.location.href = "ruleta";
                        });
                                    },
                                });



                        } else

                            swal({
                                title: "oops!",
                                text: "Por el momento no tenemos mas amigos, intenta de nuevo",
                                imageUrl: './assets/img/ups2.jpg',
                                buttons: {
                                    catch: {
                                        text: "Girar de nuevo!",
                                        value: true,
                                    },

                                    defeat: false,
                                },
                            })
                            .then((value) => {
                                if (value) {
                                    window.location.href = "ruleta";
                                } else {
                                    console.log('NO se lanza el borrado');
                                }
                            });

                    }
                }, 1);
            }
        </script>




        {{-- fin de la ruleta --}}








    </main>

    @include('layaut.footer')
</body>

</html>
