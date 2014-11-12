<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subir multiples</title>
    </head>
    <body>
        <form name="formulario" action="subido.php" method="POST" enctype="multipart/form-data">
            <label>Introduzca un Nombre:</label>
            <input type="text" name="nombres[]" value="" />
            <label>Seleccione un archivo:</label>
            <input type="file" name="archivos[]" value="" />
            <br/>
            <br/>
            <label>Introduzca un Nombre:</label>
            <input type="text" name="nombres[]" value="" />
            <label>Seleccione un archivo:</label>
            <input type="file" name="archivos[]" value="" />
            <br/>
            <br/>
            <label>Introduzca un Nombre:</label>
            <input type="text" name="nombres[]" value="" />
            <label>Seleccione un archivo:</label>
            <input type="file" name="archivos[]" value="" />
            
            <br/>
            <input type="submit" value="Subir"/>

        </form>
    </body>
</html>
