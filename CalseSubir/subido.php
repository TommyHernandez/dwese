<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subido</title>
    </head>
    <body>
        <h1></h1>
        <?php
       
        include_once 'clases/Subir.php';
        $subida = new Subir('archivos');
        $subida->setDestino('./subidos');
        $subida->setNombres("nombres");  
        echo "El mensaje antes de subir es".$subida->getMensajeError();
        $subida->setAccion(Subir::RENOMBRAR);
        echo  "<br>"."La politica es renombrar"  ;
       echo $subida->subir();
       echo "El mensaje tras de subir es".$subida->getMensajeError();
        ?>
    </body>
</html>
