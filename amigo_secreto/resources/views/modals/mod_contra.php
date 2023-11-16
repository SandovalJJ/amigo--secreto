<!DOCTYPE html>
<html lang="en">
<?php
$user = $_SESSION['cc_user'];
?>

<head>


<?php include("head.php"); ?> 

</head>

<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="container" style="width: 80%;">
                <h1>Cambia tu contraseña</h1>
                <!-- Mensajes de Verificación -->             
                <!-- Fin Mensajes de Verificación -->
                <form method="post" id="miformulario" onsubmit="verificarPasswords(); return false">

                    <input color="" size="5" value="<?php echo $user; ?>" name="usuario" id="usuario" hidden>


                    <div class="form-group">
                        <label for="pass1">Contraseña</label>
                        <input placeholder="Contraseña solo en números" type="number" class="form-control" id="pass1" name="pass1" required>
                    </div>
                    <div class="form-group">
                        <label for="pass2">Vuelve a escribir la Contraseña</label>
                        <input placeholder="Repite Contraseña" type="password" class="form-control" id="pass2" name="pass2" required>
                    </div>

                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="editarContra()" id="boton">Cambiar</button>

                </div>
            </div>
        </div>
    </div>
</div>
    <script>
    function editarContra() {

        var todoCorrecto = true;
        var pass1 = document.getElementById("pass1").value
        var pass2 = document.getElementById("pass2").value
        var usuario = document.getElementById("usuario").value

    if (pass1 == "") {
            document.getElementById("pass1").focus();
            alert("Escribe la contraseña")
            todoCorrecto = false
            return false
        }
    if (pass2 == "") {
            document.getElementById("pass2").focus();
            alert("Falta la confirmación")
            todoCorrecto = false
            return false
        }

        if (pass2 != pass1) {
            document.getElementById("pass2").focus();
            alert("Las contraseñas no coinciden")
            todoCorrecto = false
            return false
        }

        else if (todoCorrecto == true) {

            var frm = document.getElementById('miformulario');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    var msg = xhttp.responseText;
                    if (msg == 'success') {
                        $('#myModal3').modal('hide')

                    } else {

                        swal({
                            allowOutsideClick: false,
                            title: "Genial!",


                            // imageUrl: 'img/carita.jpg',
                            type: "success",
                        }, function(isConfirm) {
                            alert("Cambiaste la contraseña");
                                location.reload();


                        });
                        $(".swal2-confirm").click(function() {
                             location.reload();


                        });

                    }

                }
            };
            xhttp.open("POST", "./cambiar_contra.php", true);
            xhttp.send(data);
            var ocul = $('#miformulario').trigger('reset');
        }
    }
</script>


</html>