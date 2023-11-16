<!DOCTYPE html>
<html lang="en">

<head>

    <title>
        Mi Amigo
    </title>
    @include('layaut.head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/est_deseos.css') }}">
</head>


<body class="g-sidenav-show  bg-gray-100">

    @include('layaut.sidebar')

    <main class="main-content border-radius-lg ">
        @include('layaut.nav')


        {{-- inicio amigo --}}

        <div class="col-12" aling="center">
            <div class="card mb-3" style="max-width: 1100px; margin:auto; ">
                <div class="row g-0"
                    style="text-align: center;box-shadow: 14px 8px 6px 0px rgb(60 136 165 / 71%);     border-radius: 15px; ">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert"
                                style="text-align: center;background: #3380b7eb;font-size: 20px;color:white">
                                <h5 class="card-text" style="color: #fff">
                                    {{ ucfirst(strtolower(Auth::User()->name)) . ' ' . mb_strtoupper(Auth::User()->p_apellido) . ' ' . mb_strtoupper(Auth::User()->s_apellido) }}.
                                </h5>
                            </div>
                            <font color="" size="5">CONOCE A TU AMIGO SECRETO</font>
                            <br>
                            <font color="" size="4">Recuerda, el monto m&iacute;nimo es de </font>
                            <font color="" size="5"> $20.000 pesos</font>


                            <div class="row" style="text-align: left;background: #3380b7eb;font-size: 20px;">

                                <div class="col-md-6">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style=" font-size: 20px;width: 140px; color:#fff" scope="row">
                                                    Nombre:
                                                </th>
                                                <td style=" font-size: 20px; color:#fff">{{ $amigo[0]->name  . ' '. mb_strtoupper($amigo[0]->p_apellido) . ' ' . mb_strtoupper($amigo[0]->s_apellido)}}</td>
                                            </tr>
                                            <tr>
                                                <th style=" font-size: 20px;width: 140px; color:#fff" scope="row">
                                                    Agencia:
                                                </th>
                                                <td style=" font-size: 20px; color:#fff">{{ !empty($amigo) ? $amigo[0]->age : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td style=" font-size: 20px;width: 140px;color:#fff ">Nónima:</td>
                                                <td style=" font-size: 20px; color:#fff">{{ !empty($amigo) ? $amigo[0]->nomina : ''}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-6">

                                    <table class="table">
                                        <tbody>

                                            @if(!empty($amigo))
                                            <tr>
                                                <th style=" font-size: 20px;width: 140px; color:#fff" scope="row">
                                                    Edad:</th>
                                                <td style=" font-size: 20px; color:#fff">{{$edad}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style=" font-size: 20px;width: 140px; color:#fff">
                                                    Genero:
                                                </th>

                                                <td style=" font-size: 20px; color:#fff"> @if ( $amigo[0]->genero == 'M') Masculino
                                                @else Femenino
                                            @endif</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" style=" font-size: 20px;width: 250px; color:#fff">
                                                    Entrega de
                                                    dulces en:</th>
                                                <td style=" font-size: 20px; color:#fff"> Agencia cali</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding: 25px;">
                        @php
                        $i = 1;
                        @endphp
                        <div class="card" style="box-shadow:3px -3px 4px 5px #3c537626;padding: 3%;">
                            <h4 class="card-title">SUS REGALOS FAVORITOS</h4>
                            <img src="assets/img/regalo.gif" class="img-fluid rounded-start" alt="..."
                                style="width: 200px;height: 200px;  margin-left: auto;margin-right: auto;">
                            <ul class="list-group list-group-flush">

                                @foreach ($regalos as $regalo)
                                <li style="text-align:initial !important" class="list-group-item">
                                    {{$i+1}}: {{ $regalo->mi_deseo }}</li>
                                    @endforeach

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6" style="padding: 25px;">

                        <div class="card" style="box-shadow:3px -3px 4px 5px #3c537626;padding: 3%;">
                            <h4 class="card-title">SUS DULCES FAVORITOS</h4>
                            <img src="assets/img/dulce.gif" class="img-fluid rounded-start" alt="..."
                                style="width: 200px;height: 200px;  margin-left: auto;margin-right: auto;">
                            <ul class="list-group list-group-flush">

                                @foreach ($dulces as $dulce)
                                <li style="text-align:initial !important" class="list-group-item">
                                    {{$i++}}: {{ $dulce->dulces }}</li>
                                    @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert" style="text-align: center;background: #3380b7eb;font-size: 20px;color:white">
                                <h3 style="color:#fff">¿Dudas?</h3>
                                <p style="font-size: 20px">Comunicate a este whatsApp</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" color="#1fff28" fill="currentColor"
                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path
                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                </svg>
                <a style="    font-size: 28px;color: #1fff28;" href="2356634223453">
                    +57 2342323434
                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
    @include('layaut.footer')

</html>

{{-- fin amigo --}}

</main>

</body>

</html>
