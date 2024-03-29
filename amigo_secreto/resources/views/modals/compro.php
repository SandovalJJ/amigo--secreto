
<!DOCTYPE html> 
<html lang="es"> 
  
<head> 
    <meta charset="UTF-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge" /> 
    <title>Como Verificar si 2 Contraseñas Coinciden o son Iguales con JavaScript </title> 
    <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity= 
"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous" /> 

        <style type="text/css">
            .ocultar {
                display: none;
            }

            .mostrar {
                display: block;
            }
        </style>

</head> 
  
<body> 
    <div class="container"> 
        <h1>Como Verificar si 2 Contraseñas Coinciden o son Iguales con JavaScript</h1>  

        <div id="msg"></div>

        <!-- Mensajes de Verificación -->
        <div id="error" class="alert alert-danger ocultar" role="alert">
            Las Contraseñas no coinciden, vuelve a intentar !
        </div>
        <div id="ok" class="alert alert-success ocultar" role="alert">
            Las Contraseñas coinciden ! (Procesando formulario ... )
        </div>
        <!-- Fin Mensajes de Verificación -->

        <form id="miformulario" onsubmit="verificarPasswords(); return false">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" id="usuario" value="usuariogenial" required>              
            </div>
            <div class="form-group">
              <label for="pass1">Contraseña</label>
              <input type="password" class="form-control" id="pass1" required>
            </div>
            <div class="form-group">
                <label for="pass2">Vuelve a escribir la Contraseña</label>
                <input type="password" class="form-control" id="pass2" required>                
            </div>
            <div id="mostrar"></div>
            <button type="submit" id="login" class="btn btn-primary">Login</button>
        </form>         

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity= 
"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"> 
    </script> 
    <script src= 
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity= 
"sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"> 
    </script> 
    <script src= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity= 
"sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"> 
    </script> 


    <script type="text/javascript"> 

        function verificarPasswords() {

            // Ontenemos los valores de los campos de contraseñas 
            pass1 = document.getElementById('pass1');
            pass2 = document.getElementById('pass2');

            // Verificamos si las constraseñas no coinciden 
            if (pass1.value != pass2.value) {

                // Si las constraseñas no coinciden mostramos un mensaje 
                document.getElementById("error").classList.add("mostrar");

                return false;
            }
            
            else {

                // Si las contraseñas coinciden ocultamos el mensaje de error
                document.getElementById("error").classList.remove("mostrar");

                // Mostramos un mensaje mencionando que las Contraseñas coinciden 
                document.getElementById("ok").classList.remove("ocultar");

                // Desabilitamos el botón de login 
                document.getElementById("login").disabled = true;

                // Refrescamos la página (Simulación de envío del formulario) 
                setTimeout(function() {
                    location.reload();
                }, 3000);

                return true;
            }

        } 
        
    </script>
  
</body> 
  
</html> 