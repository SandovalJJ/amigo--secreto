<!DOCTYPE html>
<html lang="en">

<head>

    @include('layaut.head')
    <title>Por inscribir</title>

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
                                    <h5 class="card-text" style="color: #fff">FALTAN POR INSCRIBIR.
                                    </h5>
                                </div>

                                <div class="table-responsive" id="mydatatable-container">
                                    <table class="records_list table table-striped table-bordered table-hover"
                                        id="mydatatable">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>cedula</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Agencia</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>N°</th>
                                                <th>Cedula</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Agencia</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @php
                                            $i=1;
                                            @endphp
                                                @foreach ($por_inscribir as $por_inscribir)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$por_inscribir->cc_user}}</td>
                                                        <td>{{ucfirst(strtolower($por_inscribir->nombre))}}</td>
                                                        <td>{{mb_strtoupper($por_inscribir->pri_apellido).' '. mb_strtoupper($por_inscribir->seg_apellido)}}</td>
                                                        <td>{{$por_inscribir->age}}</td>
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
