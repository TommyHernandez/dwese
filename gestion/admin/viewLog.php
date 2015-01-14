
<?php
require '../clases/require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
//este metodo comprueba que estas atuentificado en la sesion como ROOT
$sesion->administrador("../");
$usuario = $sesion->getUsuario();
$bd = new BaseDatos();
$modelo = new ModeloLog($bd);
$pagina = 0;
$filas = $modelo->getList($pagina, 5);
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
                    <li><a href="panel.php">Home-Panel</a> </li>

                </ul>
                <p><span><a href="../index.php">Index</a></span>
                </p>
            </section>
    <section id="cuerpo">
        <div id="cuerpo-inicial">
            <h3>Login de Usuarios</h3>
            <table id="admin-table">
                <tr>
                    <th>id</th>
                    <th>login</th>
                    <th>fecha</th>
                    <th>tipo</th>
                                    
                </tr>
                <?php
                foreach ($filas as $indice => $objeto) {
                    ?>
                    <tr>
                        <td><?php echo $objeto->getid(); ?></td>
                        <td></td>
                        <td></td>
                        <td></td>

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
