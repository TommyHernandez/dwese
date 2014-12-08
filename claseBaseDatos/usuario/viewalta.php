-<!DOCTYPE html>
<?php
require '../clases/comun.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
    </head>
    <body>
        <h2>Formulario de inscripcion</h2>
        <span></span>
        <form action="phpalta.php" method="POST">
            Login: 
            <input type="text" name="login" value="" />
            <br/>
            Clave:
            <input type="password" name="clave" value="" />
            Repita su Clave:
            &nbsp;<input type="password" name="clave2" value="" />
            <br/>
            Email
            <input type="email" name="email" value="" />
            <br/>
            nombre
            <input type="text" name="nombre" value="" />
            <br/>
            Apellidos
            <input type="text" name="apellidos" value="" />
            <input type="submit" value="Registrar" />
        </form>
    </body>
</html>
