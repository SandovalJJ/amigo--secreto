<!DOCTYPE html>
<html lang="en">

<head>
    <!--@include('/modals.detalles')-->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Amigo secreto
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="./assets/css/fonts.googleapis.css" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Aweome Icons -->
  <script src="./assets/js/kit-fontawesome.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="./assets/css/fonts-googleapis-icon.css" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="bg-gray-200">


  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('./assets/img/osos.jpg');">
        <div><img src="./assets/img/coopserp.png" alt="Girl in a jacket" width="300" height="160" style="display: flex;  position: fixed;" ></div>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Iniciar sesion</h4>

                </div>
              </div>
              <div class="card-body">
                <form role="form" method="POST" class="text-start">
                    @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label" >Cedula</label>
                    <input name="cc_user" type="text" class="form-control" autocomplete="off">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Contaseña</label>
                    <input name="password" type="password" class="form-control" autocomplete="off">
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Iniciar</button>
                  </div>
                  <!-- <p class="mt-4 text-sm text-center">-->
                  <!--  No tienes una cuenta?-->

                  <!--  <a href="{{url('registro')}}" class="text-primary text-gradient font-weight-bold">Registrate</a>-->
                  <!--</p> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script type="text/javascript" src="./assets/js/jquery_3.3.1_jquery.min.js"></script>

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
  <script async defer src="./assets/js/buttons_buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>









<script>

	
	$(document).ready(function() {
		$('#myModal2').modal('toggle')
	});


</script>

<style>
    @media (max-width: 600px) {
      #modal-inicio {
        width: 95% !important;
      }
    }
</style>

<div class="modal-dialog modal-xl">...</div>
<div class="modal-dialog modal-lg">...</div>
<div class="modal-dialog modal-sm">...</div>





<div class="modal fade" tabindex="-1" role="dialog"  data-backdrop="static" 
  data-keyboard="false" id="myModal2">
	<div class="modal-dialog modal-xl" id="modal-inicio" role="document" style="width: 60%;">
		<div class="modal-content">

			<div class="modal-body">
					<div id="resultados_ajax2"></div>
         
				    <div class="modal-header" style="display: flex; justify-content: center;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

					    </div>

			</div>
		</div>
	</div>
</div>


<script>
$(document).ready(function() {
    $.get('/latest-content', function(data) {
        // Asegúrate de que 'data' contiene el campo 'contenido'
        $('#myModal2 .modal-body').html(data.contenido);
    });
    $('#myModal2').modal('show'); // Muestra el modal después de obtener el contenido
});

  </script>







</body>

</html>
