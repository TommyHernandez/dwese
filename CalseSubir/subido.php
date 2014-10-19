<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subido</title>
    </head>
    <body>
        <?php
        include_once 'clases/Subir.php';
        $subida = new Subir('archivo');
       echo 'Es array'.$subida->isArray();
       echo '<br/> Error de PHP '.$subida->getError();
       $subida->setAccion(Subir::REEMPLAZAR);
       echo $subida->subir();
      
        ?>
    </body>
</html>
