<!DOCTYPE html>
<?php
require '../clases/comun.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $id = Leer::request("id");

        $sql = "select * from persona where id= :id";
        $bd = new BaseDatos();
        $atributos["id"] = $id;
        $bd->setConsulta($sql, $atributos);
        $fila = $bd->getFila();
        $nombre = $fila[1];
        $apellido = $fila[2];
        ?>
        <form action="phpupdate.php" method="POST" >
            <label for="nombre">nombre</label>
            <input type="text"   name="nombre" value="<?php echo$nombre; ?>"/> 
            <br>
            <label for="apellido">apellido</label>
            <input type="text" name="apellido" value="<?php echo$apellido; ?>" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="submit" name="Registrar" value="Editar"/>
        </form>
    </body>
</html>
