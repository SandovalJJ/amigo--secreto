<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sin Girar</title>
    </head>

    <body>
        <?php
            //sin girar
            $sql_girar = "SELECT cc_user, area FROM users WHERE NOT EXISTS
            ( SELECT * FROM mi_amigo WHERE users.cc_user = mi_amigo.id_user) AND estado != 99";

            $girar = mysqli_query($link, $sql_girar);

            while ($girar1 =  mysqli_fetch_array($girar)) {
                $ced = $girar1['cc_user'];
                $area = $girar1['area'];

                $sql_amigo = "SELECT cc_user FROM users
                WHERE NOT EXISTS ( SELECT * FROM mi_amigo WHERE users.cc_user = mi_amigo.id_amigo)
                AND cc_user <> '$ced' AND estado = 0
                ORDER BY rand(cc_user) LIMIT 0,1";

                $mi_amigo = mysqli_query($link, $sql_amigo);

                $amigoDe =  mysqli_fetch_array($mi_amigo);
                $dato_amigo = $amigoDe['cc_user'];

                $sql_guardar = "insert into mi_amigo (`id_amigo`,`id_user`)
                values ('$dato_amigo','$ced')";

                mysqli_query($link, $sql_guardar);


                $sql_update = "UPDATE users SET estado = 1 WHERE cc_user = '$dato_amigo'";

                mysqli_query($link, $sql_update);
            }
        ?>
<script>
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
    </script>
    </body>

</html>
