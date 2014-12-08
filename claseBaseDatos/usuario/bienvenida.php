<!DOCTYPE html>
<?php
require '../clases/comun.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido</title>
    </head>
    <body>
         <nav>
            <ul>
                <li><a href="viewalta.php">Darse de alta</a>  </li>
                <li>
                    <a href="login.php">login</a> 
                </li>
            </ul>            
        </nav>
        <h1>Bienvenido!</h1>
        <p>
            Ya te has registrado en nuestra web.  <?php echo $mensaje; ?>
        </p>
      
    </body>
</html>
