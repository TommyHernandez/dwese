
<?php
require '../clases/require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
//este metodo comprueba que estas atuentificado en la sesion como ROOT
$sesion->administrador("../");
$usuario = $sesion->getUsuario();
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$pagina = 0;
$filas = $modelo->getList($pagina, 3);
if (Leer::get('pagina')) {
    $pagina = Leer::get("pagina");
}
$enlaces = Paginacion::getEnlacesPaginacion($pagina, $modelo->getCount(), Configuracion::RPP);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>AdminPanel</title>
        <link rel="stylesheet" href="../css/estilos.css" type="text/css" media="screen" />
        <script src="../js/backend.js"></script>
    </head>
    <body>
        <header id="superior">
            <div id="conected">
                <span class="head-element">
                    Conectado como:
                    <?php echo $usuario->getRol(); ?>
                </span>
                <span class="head-element">
                    Bienvenido de nuevo:
                    <?php echo $usuario->getLogin(); ?></span>
            </div>
        </header>
        <div>
       
   <!-- Panel de usuario -->
            <section id="panel">
                <h2>Opciones de Perfil</h2>
                <ul class="opciones">
                    <li id="m1">Añadir usuarios</li>

                </ul>
                <p><span><a href="../index.php">Index</a></span>
                </p>
            </section>
    <section id="cuerpo">
        <div id="cuerpo-inicial">
            <h3>Usuarios</h3>
            <table id="admin-table">
                <tr>
                    <th>login</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>email</th>
                    <th>Fecha Alta</th>
                    <th>Activo</th>
                    <th>Rol</th>
                    <th>Ultimo Login</th>
                    <th>Eliminar</th>
                    <th>Editar</th>                
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
                        <td> <?php echo $objeto->getRol(); ?> </td>
                        <td> <?php echo $objeto->getFechaLogin(); ?></td>
                        <td><a class ="eliminador" href="<?php echo "../usuario/phpdelete.php?login=" . $objeto->getLogin() ?>" ><img src="../images/delete.png" title="eliminar foto" alt="borrar"/></a></td>
                        <td><a class ="editador" href="<?php echo "../usuario/viewedit.php?login=" . $objeto->getLogin() ?>" >Editar</a></td>

                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <th colspan="12">
                        <?php echo $enlaces["inicio"]; ?>
                        <?php echo $enlaces["anterior"]; ?>
                        <?php echo $enlaces["primero"]; ?>
                        <?php echo $enlaces["segundo"]; ?>
                        <?php echo $enlaces["actual"]; ?><!-- normalmente -->
                        <?php echo $enlaces["cuarto"]; ?>
                        <?php echo $enlaces["quinto"]; ?>
                        <?php echo $enlaces["siguiente"]; ?>
                        <?php echo $enlaces["ultimo"]; ?>
                    </th>
                </tr>
            </table>
        </div>
        <div id="aniadir" class="oculto">
        <hr>
        <h3>Añadir nuevos usuarios</h3>
    <form action="../usuario/phpalta.php" id="add-panel" method="post">
         Login: 
                    <input type="text" id="login" name="login" value="" /><span></span>
                    <br/>
                    Clave:
                    <input type="password" name="clave" value="" />
                    <br/>
                    Email
                    <input type="email" name="email" value="" />
                    <br/>
                    nombre
                    <input type="text" name="nombre" value="" />
                    <br/>
                    Apellidos
                    <input type="text" name="apellidos" value="" />
                    <br/>
                    <input type="submit" class="btn" id="enviar" value="Registrar" />
                    <br/>
                    <input type="submit" class="btn" id="reinicio" value="Reiniciar" />
    </form>
        </div>

    </section>
     </div>
</body>
