<!DOCTYPE html>
<?php
require '../clases/comun.php';
$sesion->administrador();
    $login = $sesion->getUsuario();
    var_dump($login);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Hola ROOT</h1>
    </body>
</html>
