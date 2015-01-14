
<?php
require '../clases/require/comun.php';
//este metodo comprueba que estas atuentificado en la sesion como ROOT
$sesion->administrador("../usuario/viewalta.php");
//Creamos la base de datos
$bd = new BaseDatos();
//creamos el usuario y su modelo
$modelo = new ModeloUsuario($bd);
$objeto = $modelo->get(Leer::get("login"));
$rolActual = $objeto->getRol();
$rolAlternativo;
if ($rolActual == "usuario") {
    $rolAlternativo = "administrador";
} else {
    $rolAlternativo = "usuario";
}
$bd->closeConexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edicion de Usuario</title>
    </head>
    <body>
        <h1>Formulario de Edicion</h1>
        <form action="phpupdate.php" method="POST" >
            <label for="nombre">Login</label>
            <input type="text"   name="login" value="<?php echo $objeto->getLogin() ?>"/> 
            <br>
            <label for="nombre">Clave</label>
            <input type="password"   name="clave" value="<?php echo $objeto->getClave() ?>"/> 
            <br>
            <label for="nombre">Nombre</label>
            <input type="text"   name="nombre" value="<?php echo $objeto->getNombre() ?>"/> 
            <br>
            <label for="apellido">Apellidos</label>
            <input type="text" name="apellidos" value="<?php echo $objeto->getApellidos() ?>" />
            <br/>
            <label for="">Email</label>
            <input type="email"   name="email" value="<?php echo $objeto->getEmail() ?>"/> 
            <br>
            <label for="">ROOT?</label>
            <input type="number"  value="<?php echo $objeto->getIsRoot() ?>"/>
            <input type="radio" name="root" value="1" />Si
            <input type="radio" name="root" value="0" selected />NO
            <br/>
            <label for="">Activo</label>
            <input type="number"   name="activo" value="<?php echo $objeto->getIsActive() ?>"/>
            <br/>
            <label for="">Rol</label>
            <select name="rol">
                <option><?php echo $rolActual ?></option>
                <option> <?php echo $rolAlternativo ?></option>
            </select>
            <br/>
            <input type="hidden"   name="fechaalta" value="<?php echo $objeto->getFechaAlta() ?>"/>
            <input type="hidden"   name="loginpk" value="<?php echo $objeto->getLogin() ?>"/> 

            <br/>
            <input type="submit" name="Editar" value="Editar"/>
        </form>
    </body>
</html>
