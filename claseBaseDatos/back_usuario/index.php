<!DOCTYPE html>
<?php
require '../clases/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$filas = $modelo->getList();
//este metodo comprueba que estas atuentificado en la sesion como ROOT
$sesion->administrador("../usuario/viewalta.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>USUARIOS</title>
    </head>
    <body>
        <h1>Registro de Usuarios</h1>
        <br/>
        <table border="2">
            <tr>
                <th>Login</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>email</th>
                <th>Alta</th>
                <th>¿Ativo?</th>
                <th>¿Root?</th>
                <th>ROL</th>
                <th>Ultima Conexion</th>
                <th> Editar </th>
                <th> Eliminar </th>
                
            </tr>
            <?php
            foreach ($filas as $indice => $objeto) {
                ?>
                <tr>
                    <td><?php echo $objeto->getLogin(); ?></td>
                    <td> <?php echo $objeto->getNombre(); ?> </td>
                    <td> <?php echo $objeto->getApellidos(); ?></td>
                    <td> <?php echo $objeto->getEmail(); ?> </td>
                    <td> <?php echo $objeto->getFechaAlta(); ?></td>
                    <td> <?php echo $objeto->getIsActive(); ?></td>
                    <td> <?php echo $objeto->getIsRoot(); ?> </td>
                    <td> <?php echo $objeto->getRol(); ?></td>
                    <td><?php echo $objeto->getFechaLogin(); ?></td>
                    <td> <a href="<?php echo "viewedit.php?login=" . $objeto->getLogin(); ?>" >Editar</a></td>
                    <td><a href="<?php echo "phpdelete.php?login=" . $objeto->getLogin(); ?>" >Eliminar</a></td>

                </tr>  
                <?php
            }
            ?>

            <form action="phpinsert.php" method="POST" >
                <label for="nombre">Login</label>
                <input type="text"   name="login" value=""/> 
                <br>
                <label for="nombre">Clave</label>
                <input type="password"   name="clave" value=""/> 
                <br>
                <label for="nombre">nombre</label>
                <input type="text"   name="nombre" value=""/> 
                <br>
                <label for="apellido">apellido</label>
                <input type="text" name="apellidos" value="" />
                <br/>
                <label for="nombre">Email</label>
                <input type="email"   name="email" value=""/> 
                <br>
                <br/>
                <input type="submit" name="Registrar" value="Registrar"/>
            </form>
        </table>
    </body>
</html>
<?php
    $bd->closeConexion();
?>