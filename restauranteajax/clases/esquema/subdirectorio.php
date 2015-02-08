<?php
require '../require/comun.php';
//$sesion->administrador("../");

$actual = "ajax";
$dir = "../";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include ("../include/head.php"); ?>
        <title>Tutulo</title>
    </head>
    <body>
        <?php include ("../include/barranavegacion.php"); ?>
        <div class="jumbotron" style="padding: 10px;">
            <div class="container">
                <h2 style="float: left;">....</h2>
            </div>
        </div>
        <div class="container">
            <div class="row" >
                <div>
                    <p><a href="#" class="btn btn-primary btn-lg" role="button">HacerAlgo &raquo;</a></p>
                   
                </div>
            </div>
            <?php include ("../include/pie.php"); ?>
        </div>
        <?php include ("../include/fondo.php"); ?>
        <?php include ("../include/script.php"); ?>
    </body>
</html>