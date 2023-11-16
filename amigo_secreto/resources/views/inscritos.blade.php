<!DOCTYPE html>
<html lang="en">

<head>

    @include('layaut.head')
    <title>Parejas</title>

    <script src="./assets/js/ajax-googleapis.js"></script>

    <!-- Bootstrap CSS -->

    <!-- Datatables -->
    <link rel="stylesheet" href="./assets/css/datatables.min.css">
    <script src="./assets/js/datatables.min.js"></script>

    <!-- Buttons -->
    <link rel="stylesheet" href="./assets/css/buttons.dataTables.min.css">
    <script src="./assets/js/dataTables.buttons.min.js"></script>
    <script src="./assets/js/js_buttons.html5.min.js"></script>
    <script src="./assets/js/vfs_fonts.js"></script>
    <script src="./assets/js/buttons.flash.min.js"></script>
    <script src="./assets/js/buttons.print.min.js"></script>
    <script src="./assets/js/jszip.min.js"></script>
    <style>
        #mydatatable tfoot input {
            width: 100% !important;
        }

        #mydatatable tfoot {
            display: table-header-group !important;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('layaut.sidebar')

    <main class="main-content border-radius-lg ">
        @include('layaut.nav')

        <div class="container">
            <div class="col-12" aling="center">
                <div class="card mb-3" style="max-width: 1100px; margin:auto; ">
                    <div class="row g-0"
                        style="text-align: center;box-shadow: 14px 8px 6px 0px rgb(60 136 165 / 71%);     border-radius: 15px;">
                        <div class="col-md-12">
                            <div class="card-body">

                                <div class="alert alert-primary" role="alert"
                                    style="text-align: center;background: #3380b7eb;font-size: 20px;color:white">
                                    <h5 class="card-text" style="color: #fff">RESUMEN DE INSCRITOS.
                                    </h5>
                                </div>



                                <div class="table-responsive" id="mydatatable-container">
                                    <table class="records_list table table-striped table-bordered table-hover"
                                        id="mydatatable">
                                        <thead>
                                            <tr>

                                                <th >N°</th>
                                                <th>Nombrea</th>
                                                <th>Primer Apellido</th>
                                                <th>Segundo Apellido</th>
                                                <th>Agencia</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>N°</th>
                                                <th>Nombrea</th>
                                                <th>Primer Apellido</th>
                                                <th>Segundo Apellido</th>
                                                <th>Agencia</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            {{-- @for ($i = 0; $i <sizeof($inscritos); $i++)
                                                                                      <tr>
                                                <td>{{$i+1}}</td>
                                                <td>{{ucfirst(strtolower($inscritos[$i]->nombre))}}</td>
                                                <td>{{mb_strtoupper($inscritos[$i]->pri_apellido)}}</td>
                                                <td>{{mb_strtoupper($inscritos[$i]->seg_apellido)}}</td>
                                                <td>{{$inscritos[$i]->age}}</td>
                                            </tr>
                                            @endfor --}}

                                            @php
$i=1;
 @endphp
                                            @foreach ($inscritos as $inscrito)
                                            <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ucfirst(strtolower($inscrito->nombre))}}</td>
                                            <td>{{mb_strtoupper($inscrito->pri_apellido)}}</td>
                                            <td>{{mb_strtoupper($inscrito->seg_apellido)}}</td>
                                            <td>{{$inscrito->age}}</td>
                                        </tr>
@endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#mydatatable tfoot th').each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="Filtrar.." />');
                });

                var table = $('#mydatatable').DataTable({
                    "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
                    "responsive": false,
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                    },
                    "order": [
                        [0, "desc"]
                    ],
                    "initComplete": function() {
                        this.api().columns().every(function() {
                            var that = this;

                            $('input', this.footer()).on('keyup change', function() {
                                if (that.search() !== this.value) {
                                    that
                                        .search(this.value)
                                        .draw();
                                }
                            });
                        })
                    },
                    "buttons": ['csv', 'excel', 'pdf', 'print']
                });
            });
        </script>




    </main>

    @include('layaut.footer')
</body>

</html>
