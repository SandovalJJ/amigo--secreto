
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
      <meta name="csrf-token" content="{{ csrf_token() }}" />

  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
  
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('./assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Registro</h4>
                  <p class="mb-0">Escribe tus datos y registrate</p>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                        {{session('success')}}
                        </div>
                    @endif
                  <form role="form" method="POST">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Cedula</label>
                      <input id="cedula" name="cedula" type="text" class="form-control" autocomplete="off" required>
                    </div>
                    <div id="result-username"></div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nombre Completo</label>
                      <input id="nombre" name="nombre" type="text" class="form-control" autocomplete="off" disabled required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Primer Apellido</label>
                      <input id="p_apellido" name="p_apellido" type="text" class="form-control"  autocomplete="off" disabled required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Segundo Apellido</label>
                      <input id="seg_apellido" name="seg_apellido" type="text" class="form-control"  autocomplete="off" disabled required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                         <label class="form-label">Fecha Nacimiento</label>
                      <input id="f_naci" name="f_naci" type="date" class="form-control"  autocomplete="off" disabled required> 
                    </div>
                    <div class="text-center">
                      <a  id="senulo" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" hidden>Validar</a>
                    </div>
                    <div class="text-center">
                        <a id="esta" href="{{url('login')}}" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" hidden>Regresar</a>
                    </div>
                    <div class="text-center">
                      <button type="submit" id="registrar" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" hidden>Registrar</button>
                    </div>
                  </form>
                </div>
                <!--<div class="card-footer text-center pt-0 px-lg-2 px-1">-->
                <!--  <p class="mb-2 text-sm mx-auto">-->
                <!--    Ya tines una cuenta?-->
                <!--    <a href="{{url('login')}}" class="text-primary text-gradient font-weight-bold">Iniciar sesion</a>-->
                <!--  </p>-->
                <!--</div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  
  <script type="text/javascript" src="./assets/js/jquery_3.3.1_jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            
            $('#cedula').on('blur', function() {

                let cedula = $(this).val();
                
                $.ajax({
                    url: "{{ url('./validar') }}",
                    method: "POST",
                    data: {
                        cedula: cedula,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                     
                      if(data.esta == 1){
                            alert("Numero de cedula ya esta registrado")
                            $("#esta").removeAttr("hidden");
                        }else if(data.estado == 1){
                            $("#nombre").removeAttr("disabled");
                            $('#nombre').focus();
                             $('#esta').attr("hidden",true);
                        }else{
                            alert("Numero de cedula no esta habilitada")
                        }
                    },
                    error: function(response) {
                        console.log(response)
                    },
                });
            });
            
            $('#nombre').on('blur', function() {

                let nombre = $(this).val();
                let cedula = $("#cedula").val();

                $.ajax({
                    url: "{{ url('./validar_nombre') }}",
                    method: "POST",
                    data: {
                        nombre: nombre,
                        cedula: cedula,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if(data.estado1 == 1){
                            $("#p_apellido").removeAttr("disabled");
                              $('#p_apellido').focus();
                        }else{
                            alert("Nombre incompleto o mal escrito, por favor verifique")
                        }
                    },
                    error: function(response) {
                        console.log(response)
                    },
                });
            });
            
            $('#p_apellido').on('blur', function() {

                let p_apellido = $(this).val();
                let cedula = $("#cedula").val();
                
                $.ajax({
                    url: "{{ url('./validar_p_apellido') }}",
                    method: "POST",
                    data: {
                        p_apellido: p_apellido,
                        cedula: cedula,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if(data.estado2 == 1){
                            $("#seg_apellido").removeAttr("disabled");
                              $('#seg_apellido').focus();
                        }else{
                            alert("Apellido incompleto o mal escrito, por favor verifique")
                        }
                    },
                    error: function(response) {
                        console.log(response)
                    },
                });
            });
            
            $('#seg_apellido').on('blur', function() {

                let seg_apellido = $(this).val();
                let cedula = $("#cedula").val();
                
                $.ajax({
                    url: "{{ url('./validar_s_apellido') }}",
                    method: "POST",
                    data: {
                        seg_apellido: seg_apellido,
                        cedula: cedula,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if(data.estado3 == 1){
                            $("#f_naci").removeAttr("disabled");
                              $('#f_naci').focus();
                              $("#senulo").removeAttr("hidden");
                        }else{
                            alert("Apellido incompleto o mal escrito, por favor verifique")
                        }
                    },
                    error: function(response) {
                        console.log(response)
                    },
                });
            });
          
            $('#f_naci').on('blur', function() {

                let f_naci = $(this).val();
                let cedula = $("#cedula").val();
                
                $.ajax({
                    url: "{{ url('./validar_fecha') }}",
                    method: "POST",
                    data: {
                        f_naci: f_naci,
                        cedula: cedula,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if(data.estado4 == 1){
                            $("#registrar").removeAttr("hidden");
                              $('#registrar').focus();
                              $('#senulo').attr("hidden",true);
                        }else{
                            alert("Fecha de nacimiento invalida, por favor verifique")
                        }
                    },
                    error: function(response) {
                        console.log(response)
                    },
                });
            });
            
        });
    </script>

  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
