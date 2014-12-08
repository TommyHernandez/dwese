<!DOCTYPE html>
<?php
require '../clases/comun.php';
//$sesion->autentificado("login.php");
$usuario = $sesion->getUsuario();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificacion de perfil</title>
    </head>
    <body>
        <h2>Modificacion de perfil</h2>
        <form action="phpedit.php" method="POST">
            <label>Login</label>
            <input type="text" name="new_login" value="<?php echo $usuario->getLogin(); ?>" />

            <br/>
            <label>Clave vieja</label>
            <input type="password" name="old_pass" value="" />
            <br/>
            <label>Clave nueva</label>               
            <input type="password" name="new_pass" value="" />
            <label>Repite la nueva clave</label>
            <input type="password" name="new_pass2" value="" />
            <br>

            <label>Nombre</label>
            <input type="text" name="new_nombre" value="<?php echo $usuario->getNombre(); ?>" />

            <label>Apellido</label>
            <input type="text" name="new_apellido" value="<?php echo $usuario->getApellidos();?>" />
            <br/>
            <label>Email</label>*Atencion al modificar su email se cerrara la sesion y debera confirmarlo de nuevo.
            <br/>
            <input type="email" name="new_mail"  value="<?php echo $usuario->getEmail(); ?>" />
            <br/>
            <input type="submit" value="Editar" />
        </form>
    </body>
</html>
