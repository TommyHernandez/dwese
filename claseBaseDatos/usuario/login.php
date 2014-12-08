<!DOCTYPE html>
<?php
require '../clases/comun.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <div>
            <center>
                <h2>Login</h2>
                <nav>
                    <ul>
                        <li> <a href="index.php">Home</a>  </li>
                        <li><a href="viewalta.php">Darse de alta</a>  </li>
                        <li>
                            <a href="login.php">login</a> 
                        </li>
                    </ul>            
                </nav>
                <form action="phplogin.php" method="POST">
                    <label>Usuario: </label>
                    <input type="text" name="user" value="" />
                    <label>
                        Contraseña:
                    </label>
                    <input type="password" name="passwd" value="" />
                    <input type="submit" value="Enviar" />
                </form>
                
            </center>
        </div>

    </body>
</html>
