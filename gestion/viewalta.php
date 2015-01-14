<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <script src=""></script>

    </head>
    <body>
        <div class="wrapper">
            <!-- Header -->

            <header id="header">
                <h1>Gestion</h1>
                <nav id="nav">
                    <ul>
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="viewalta.php" >Registro</a>
                        </li>
                        <li><a href="login.php"  class="btn2"> Login</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <section>
                <h2>Formulario de inscripcion</h2>
                <span></span>
                <form action="usuario/phpalta.php" method="POST">
                    Login: 
                    <input type="text" id="login" name="login" value="" /><span></span>
                    <br/>
                    Clave:
                    <input type="password" name="clave" value="" />
                    Repita su Clave:
                    &nbsp;<input type="password" name="clave2" value="" />
                    <br/>
                    Email
                    <input type="email" name="email" value="" />
                    <br/>
                    nombre
                    <input type="text" name="nombre" value="" />
                    <br/>
                    Apellidos
                    <input type="text"  name="apellidos" value="" />
                    <input type="submit" class="btn2" id="registrar" value="Registrar" />
                </form>
            </section>

        </div>
    </body>
</html>
