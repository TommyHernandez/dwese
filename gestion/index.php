<!doctype html>
<html>

    <head lang="es">
        <meta charset="UTF-8">
        <title>Gestion-Usuarios</title>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
    </head>

    <body>
        <div class="wrapper">
            <!-- Header -->
            <header id="header">
                <nav id="navegator">
                    <ul id="nav">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="viewalta.php" >Registro</a>
                        
                    </ul>
                </nav>
            </header>
            <!-- Banner -->
            <section id="banner">
               
            </section>
            <section id="login">
                <div id="sec-login">
                    <h2>Conectar:</h2>
                    <form name="loginform" action="usuario/phplogin.php" method="POST">
                        <label for="login">
                            Login:
                            <input type="text" id="login" name="login" value="" required />
                        </label>
                        <label for="key">
                            Clave:
                            <input type="password" id="key" name="key" value="" required />
                        </label>
                        <input type="submit" value="login" />
                    </form>
                </div>
                <div>
                    <span><a href="usuario/viewolvido.php">Olvide mi contraseña</a></span>
                    <span><a href="usuario/viewolvido.php">Olvide mi usuario</a></span>
                </div>
            </section>
            <footer></footer>

        </div>



    </body>

</html>