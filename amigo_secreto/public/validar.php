<?php
if (isset($_POST)) {
    $cc_user = (string)$_POST['cc_user'];
    
    $result = $con->query(
        'SELECT * FROM users WHERE cc_user = "'.$cc_user.'"'
    );
    
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-success"><strong> Ese numero de cedula ya esta registrado, Por favor ingresar contrase単a  </strong></div>';
    } else {
        echo '<div class="alert alert-danger "><strong>  Ese numero de cedula NO esta registrado, Por favor de click en Registrarse  </strong></div>';
    }
}
echo "hola;"
?>