<?php
require '../clases/require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
/*Este metodo comprueba que estas atuentificado en la sesion como ROOT */
$sesion->autentificado("../index.php");
$usuario = $sesion->getUsuario();
$modeloFoto = new modeloFoto($bd);
$s = $usuario->getLogin();
$buscado = "login=$s";
$fotico = $modeloFoto->get($buscado);
$ruta = "";//$fotico->getRuta();
?>
<!doctype html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Panel de usuario</title>
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
        <script src="../js/back-usuario.js"></script>
    </head>

    <body>
        <header id="superior-user">
            <div id="conected">
                <span class="head-element">
                    <strong> Conectado como:</strong>
<?php echo $usuario->getRol(); ?>
                </span>
                <span class="head-element">
                    <strong> Bienvenido de nuevo:</strong>
<?php echo $usuario->getLogin(); ?>
                    <a href="phplogout.php?login<?php echo $usuario->geLogin() ; ?>">Logout</a>
                </span>
            </div>
        </header>
        <div class="wrapper">
            <!-- Panel de usuario -->
            <section id="panel-usu">
                <ul class="opciones">
                    <li id="m1">Modificar perfil</li>
                    <li id="m2">Cambiar correo</li>
                    <li id="m3">Cambiar contraseña</li>
                    <li><a href="../index.php">Index</a></li>
                </ul>
            </section>
            <!-- Cuerpo de la web de usuario -->
            <section id="cuerpo">
                <section id="perfil">
                    <h1>Perfil de usuario</h1>
                    <p>Login:
                        <?php echo $usuario->getLogin(); ?>
                    </p>
                    <div>
                        <img src="<?php echo $fotico; ?>" alt="" />
                        <span id="fot">Cambiar foto</span>
                    </div>
                    <p>
                        Nombre:
                        <?php echo $usuario->getNombre(); ?>
                    </p>
                    <p>
                        Apellido:
                        <?php echo $usuario->getApellidos(); ?>
                    </p>
                    <p>
                        CorroActual:
<?php echo $usuario->getEmail(); ?>
                    </p>
                    <p>Miembro desde:
<?php echo $usuario->getFechaAlta(); ?>
                    </p>
                    <p>Ultimo loggin:
<?php echo $usuario->getFechaLogin(); ?>
                    </p>
                </section>

            </section>
            <!--Modificar Perfil -->
            <section id="mod-perfil" class="oculto">
                <h1>Modificar perfil</h1>
                <form action="phpmodperfil.php" name="modperfil" enctype="application/x-www-form-urlencoded" method="post">
                    <label for="">
                        Nombre:
                        <input type="text" name="nombre" value="<?php echo $usuario->getNombre(); ?>" />
                    </label>
                    <label for="">
                        Apellidos
                        <input type="text" name="apellidos" value="<?php echo $usuario->getApellidos(); ?>" />
                    </label>
                    <input type="number" hidden value="0" name="elec" />
                    <input type="submit" class="btn" value="Modifical" />

                </form>


            </section>
            <!--Cambiar Correo -->
            <section id="change-correo" class="oculto">
                <p>Su correo anterior es:
<?php echo $usuario->getEmail(); ?></p>
                <form action="phpmodperfil.php" method="post">
                    <label for="">Inbtroduzca el nuevo correo
                        <input type="mail" name="mail" value="" />
                    </label>
                    <input type="submit" class="btn" value="Modifical" />
                    <input type="number" hidden value="1" name="elec" />
                </form>
            </section>
            <!--Cambiar Clave -->
            <section id="change-pass" class="oculto">
                <h1>Cambio de contraseña</h1>
                <form action="phpmodperfil.php" method="post">
                    <label for="old">
                        Escriba la contraseña aterior;
                        <input type="password" id="old" name="old" value="" />
                    </label>
                    <label for="new1">
                        Teclee la contraseña nueva;
                        <input type="password" id="new1" name="new1" value="" />
                    </label>
                    <label for="new2">
                        Repita la contraseña:
                        <input type="password" id="new2" name="new2" value="" />
                    </label>
                    <input type="number" hidden value="2" name="elec" />
                    <input type="submit" class="btn" value="CambiarPass" />
                </form>
            </section>
            <!--Cambiar Foto -->
            <section id="foto-add" class="oculto">
                <h1>Modificacion Foto</h1>
                <img src="<?php echo $ruta; ?> " alt="Foto de perfil" />
                <form name="modfoto" action="phpmodperfil.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="foto" id="foto" />
                    <input type="number" hidden value="3" name="elec" />
                    <input type="submit" class="btn" value="Cambiar foto" />

                </form>


            </section>
            
        </div>



    </body>

</html>