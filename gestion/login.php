<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
</head>

<body>
    <div class="wrapper">
        <div id="header">
            <nav>
                <ul class="nav-form">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="login.php"></a>
                    </li>
                </ul>
            </nav>

        </div>
        <div id="cuerpo">
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
            <div id="footer">

            </div>

        </div>


</body>

</html>