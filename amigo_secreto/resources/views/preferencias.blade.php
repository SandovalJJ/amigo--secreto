<!DOCTYPE html>
<html lang="en">

<head>

    <title>
        Mis Preferencias
    </title>
    @include('layaut.head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/est_deseos.css') }}">
</head>


<body class="g-sidenav-show  bg-gray-100">

    @include('layaut.sidebar')

    <main class="main-content border-radius-lg ">
        @include('layaut.nav')

        <div class="col-12" aling="center">
            <div class="card mb-3" style="max-width: 1100px; margin:auto; ">
                <div class="row g-0"
                    style="text-align: center;box-shadow: 14px 8px 6px 0px rgb(60 136 165 / 71%);     border-radius: 15px; ">
                    <div class="col-md-12">
                        <div class="card-body">

                            <div class="alert alert-primary" role="alert"
                                style="text-align: center;background: #3380b7eb;font-size: 20px;color:white">
                                <h5 class="card-text" style="color: #fff">POR FAVOR REGISTRA EN LAS LISTAS QUE QUIERE
                                    QUE LE REGALEN DE AMIDO SECRETO.
                                </h5>
                            </div>
                            <!--<h6 class="card-text">La selecci&oacute;n de tu amigo ser&aacute; a partir del-->
                            <!--    09/SEP/2022 a las 00:00</h6>-->
                                
                                <h6 class="card-text">La selecci&oacute;n de tu amigo ser&aacute; a partir del Lunes 11 de septiembre desde 7:00</h6>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding: 25px;">
                        <div class="card" style="box-shadow:3px -3px 4px 5px #3c537626;padding: 3%;">
                            <h4 class="card-title">MIS REGALOS FAVORITOS</h4>
                            <img src="./assets/img/regalo.gif" class="img-fluid rounded-start" alt="..."
                                style="width: 200px;height: 200px; margin-left: auto;margin-right: auto;">
                            <div class="card-body">
                                <form id="guardar_regalo">

                                    <div class="form-group" id="regalos">
                                        <label class="card-text" style="font-size: 18px;">Escribe aquí tus
                                            regalos</label>
                                        <input type="text" class="form-control" placeholder="Escribe Tu Regalo"
                                            name="regalo" id="regalo" style="width: 100%;margin: 3%;"
                                            autocomplete="off" required>

                                        <a class="btn btn-success" id="guardar" onclick="guardar_regalo()"
                                            style="margin-bottom: 4%; color: #fff;background-color: #014801;border-color: #4cae4c;width: 60%;font-size: 20px;">Registrar
                                            Regalo
                                        </a>
                                    </div>
                                </form>
                            </div>
                            <span><strong>LISTA DE MIS REGALOS</strong></span>

                            <ul class="list-group list-group-flush">

                                <input value="nombre completo" id="fullnames" hidden>
                                <input hidden value="estado user" id="estado_user">
                                <input hidden value="" id="f_grado">
                                @for ($i = 0; $i <$total_r; $i++)
                                <li style="text-align:initial !important" class="list-group-item">
                                    {{$i+1}}:   {{ $regalo[$i]->mi_deseo }}
                                </li>
                                @endfor

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6" style="padding: 25px;">

                        <div class="card" style="box-shadow:3px -3px 4px 5px #3c537626;padding: 3%;">
                            <h4 class="card-title">MIS DULCES FAVORITOS</h4>
                            <img src="./assets/img/dulce.gif" class="img-fluid rounded-start" alt="..."
                                style="width: 200px;height: 200px; margin-left: auto;margin-right: auto;">
                            <div class="card-body">

                                <form id="guardar_dulce">
                                    <div class="form-group" id="regalos">
                                        <label class="card-text" style="font-size: 18px;">Escribe aqui tu dulce.</label>
                                        <input type="text" class="form-control" placeholder="Escribe Tu Dulce"
                                            name="dulce" id="dulce" style="width: 100%;margin: 3%;"
                                            autocomplete="off" required>
                                        <a class="btn btn-success" id="guardar" onclick="guardar_dulce()"
                                            style="margin-bottom: 4%; color: #fff;background-color: #014801;border-color: #4cae4c;width: 60%;font-size: 20px;">Registrar
                                            Dulce
                                        </a>
                                    </div>
                                </form>
                                <div hidden>
                                    <div id="resultados"></div><!-- Carga los datos ajax  -->
                                    <div class='outer_div'></div><!--  Carga los datos ajax  -->
                                </div>
                            </div>
                            <span><strong>LISTA DE MIS DULCES</strong></span>

                            <ul class="list-group list-group-flush">


                                <input hidden value="estado" id="estado_user">
                                <input hidden value="" id="f_grado">
                                @for ($i = 0; $i <$total_d; $i++)
                                <li style="text-align:initial !important" class="list-group-item">
                                    {{$i+1}}: {{ $dulce[$i]->dulces }}</li>
                                    @endfor
                            </ul>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert"
                                style="text-align: center;background: #3380b7eb;font-size: 20px;color:white">
                                <p class="card-text">Cuando termine de registar las listas de preferencias, de click
                                    en:</p>

                                <form class="d-flex" action="{{url('logout')}}" method="post">
                                    @csrf
                                    <button style="margin-left: auto; margin-right: auto"
                                        onclick="this.closest('form').submit()">

                                        <!--<span class="d-sm-inline d-none">FINALIZAR</span>-->
                                        <span class="d-sm-inline">FINALIZAR</span>
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('layaut.footer')
<script type="text/javascript" src="./assets/js/jquery_3.3.1_jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>

        function guardar_dulce() {


            $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

            var dulces = $("#dulce").val();

            $.ajax({
                url: "{{ url('/guardar_dulce') }}",
                method: "POST",
                data: {
                    dulces: dulces,
                },
                cache: false,
                success: function(data) {
                    console.log(data);
                    swal("Genial!",
                        "Has registrado tu dulce de preferencia!!", "success")
                    $(".swal-button--confirm").click(function() {
                        location.reload();
                    });
                },
                error: function(response) {
                    console.log("hola mundo");
                    swal("Error!", "Se ha producido un error!. Por favor vuelve a intentarlo", "error");
                },
            });
        }



        function guardar_regalo() {
            var regalo = $("#regalo").val();

            $.ajax({
                url: "{!! url('/guardar_regalo') !!}",
                type: "POST",
                data: {
                    regalo: regalo,
                    _token: "{{ csrf_token() }}",
                },
                cache: false,
                success: function(data) {
                    console.log(data);
                    swal("Genial!",
                        "Has registrado tu regalo de preferencia!!", "success")
                    $(".swal-button--confirm").click(function() {
                        location.reload();
                    });
                },
                error: function(response) {
                    console.log(response);
                    swal("Error!", "Se ha producido un error!. Por favor vuelve a intentarlo", "error");
                },
            });
        }
    </script>
<script>
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
    </script>

</body>

</html>
