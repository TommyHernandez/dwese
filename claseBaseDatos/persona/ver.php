<!DOCTYPE html>
<?php
require '../clases/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloPersona($bd);
$persona = $modelo->get(Leer::get('id'));
$bd->closeConexion();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <form action="phpupdate.php" method="POST" >
            <label for="nombre">nombre</label>
            <input type="text"   name="nombre" value="<?php echo$nombre; ?>"/> 
            <br>
            <label for="apellido">apellido</label>
            <input type="text" name="apellido" value="<?php echo$persona->getNombre(); ?>" />
            <input type="hidden" name="id" value="<?php echo $persona->getApellido(); ?>" />
            <input type="submit" name="Registrar" value="Editar"/>
        </form>
    </body>
</html>
