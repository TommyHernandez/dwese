<!DOCTYPE html>
<?php
require '../clases/comun.php';
//este metodo comprueba que estas atuentificado en la sesion
$sesion->autentificado();
    $login = $sesion->getUsuario();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Web secreta con sesion</title>
    </head>
    <body>
        <h2>Web de sesion pra el usuario <?php echo $login->getLogin(); ?></h2>
        <nav>
                    <ul>
                        <li> <a href="index.php">Home</a>  </li>
                        <li><a href="viewalta.php">Darse de alta</a>  </li>
                        <li>
                            <a href="viewedit.php">Modificar mi perfil</a> 
                        </li>
                    </ul>            
                </nav>
        <img src="img/susan-coffey-11511-11888-hd-wallpapers.jpg"  alt="susan"/>
    </body>
</html>
