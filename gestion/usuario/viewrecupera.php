<?php 
require '../clases/require/comun.php';
$login = Leer::get("login");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$objeto = $modelo->get($login);
$id = md5($objeto->getLogin() . Configuracion::PEZARANIA . $objeto->getEmail());
$idrecep = Leer::get("id");
if ($id == $idrecep) {
   
}else{
    header("Location: ../"); 
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <header>
            
        </header>
        <section>
            <!--Cambiar Clave -->
                <section id="change-pass" class="oculto">
                    <h1>Cambio de contraseña</h1>
                    <form action="phpmodclave.php" method="post" >
                        <label for="new1">
                            Teclee la contraseña nueva;
                            <input type="password" id="new1" name="new1" value="" />
                        </label>
                        <label for="new2">
                            Repita la contraseña:
                            <input type="password" id="new2" name="new2" value="" />
                        </label>
                        <input type="text" hidden name="login" value="<?php echo $objeto->getLogin(); ?>" />
                        <input type="submit" class="btn" value="CambiarPass"/>
                    </form>
                </section>
        </section>
    </body>
</html>
