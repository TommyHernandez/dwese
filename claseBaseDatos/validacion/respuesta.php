
<html>
    <head>
        <meta charset="UTF-8">
        <title>Respuesta</title>
    </head>
    <body>
        <?php
      
       $texto = $_POST['texto'];
       echo htmlspecialchars($texto);
       $textourl = urlencode($texto);
       header("Location : index.php?t=$textourl")
        ?>
    </body>
</html>
