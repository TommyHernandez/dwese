<!DOCTYPE html>
<?php
require '/clases/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
//este metodo comprueba que estas atuentificado en la sesion como ROOT 
$sesion->administrador("index.php");
$usuario = $sesion->getUsuario();
$bd = new BaseDatos();
$modelo = new modeloInmueble($bd);
$inicio = 0;
$filas = $modelo->getList($inicio, $rpp = 10);
?>
<html>
    <head lang="es">
        <meta charset="UTF-8">
        <title>AdminPanel-Inmocasa</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
        <script src="js/backend.js"></script>
    </head>
    <body>
        <header id="superior">
            <div id="conected">
                <p>Conectado como:
                    <?php echo $usuario->getRol(); ?>
                Hola:
                    <?php echo $usuario->getNombre() . " " . $usuario->getApellidos(); ?></p>
            </div>
        </header>
        <section id="panel">
            <p>
                <span id="inmuebles-ad" >Inmuebles</span>
                <ul id="lista-acc" class="oculto">
                    <li id="m-add">Añadir</li>
                    <li id="m-edit">Editar</li>
                </ul>
                </p>
                 <p>
                     <span>Usuaios</span>
                     
                 </p>
                 <p><span><a href="index.php">Index</a></span>
          </p>
                

        </section>
        <section id="cuerpo">
            <div id="cuerpo-inicial"> 
                <h3>Total de inmuebles</h3>          
                <table>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Precio</th>
                        <th>Localidad</th>
                        <th>Provincia</th>
                        <th>Tipo</th>
                        <th>Calle</th>
                        <th>Superficie (m)</th>
                        <th>CP</th>
                        <th>Objetivo</th>
                        <th>Fecha Anuncio</th>
                        <th>Eliminar</th>

                    </tr>
                    <?php
                    foreach ($filas as $indice => $objeto) {
                        ?>
                        <tr>
                            <td><?php echo $objeto->getTitulo(); ?></td>
                            <td> <?php echo $objeto->getDescripcion(); ?> </td>
                            <td> <?php echo $objeto->getEstado(); ?></td>
                            <td> <?php echo $objeto->getPrecio(); ?> </td>
                            <td> <?php echo $objeto->getLocalidad(); ?></td>
                            <td> <?php echo $objeto->getProvincia(); ?></td>
                            <td> <?php echo $objeto->getTipo(); ?> </td>
                            <td> <?php echo $objeto->getCalle(); ?></td>
                            <td> <?php echo $objeto->getSuperficie(); ?></td>
                            <td><?php echo $objeto->getCp(); ?></td>
                            <td><?php echo $objeto->getObjetivo(); ?></td>
                            <td><?php echo $objeto->getFecha(); ?></td>
                            <td><a id ="eliminador" href="<?php echo "inmueble/phpdelete.php?id=" . $objeto->getId() ?>" >Eliminar</a></td>

                        </tr>  
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div id="aniadir" class="oculto">
                <hr>
                <h3>Insercion de inmuebles</h3>
                <form name="insert" action="inmueble/phpinsert.php" method="POST" enctype="multipart/form-data">
                    <label for="titulo">
                        Titulo:
                        <input type="text" id="titulo" name="titulo" value="" required autofocus/>
                    </label>
                    <br/>
                    <label for="descripcion">
                        Descripción:
                        <textarea id="descripcion" name="descripcion"></textarea>
                    </label>
                    <br/>
                    <label for="estado">
                        Estado:
                        <select id="estado" name="estado">
                            <option>Nuevo</option>
                            <option>Segunda Mano</option>
                        </select>
                    </label>
                    <br/>
                    <label for="precio">
                        Precio:
                        <input type="number" id="precio" name="precio" value="" />
                    </label>
                    <br/>
                    <label for="localidad">
                        Localidad:
                        <input type="text" id="localidad" name="localidad" value="" />
                    </label>
                    <br/>
                    <label for="provincia">
                        Provincia:
                        <input type="text" id="provincia"  name="provincia" list="provincias" value="" />
                        <datalist>
                            <option>Granada</option>
                            <option>Almeria</option>
                            <option>Cordoba</option>
                            <option>Jaen</option>
                            <option>Sevilla</option>
                            <option>Malaga</option>
                            <option>Cadiz</option>
                            <option>Huelva</option>
                            <option>Madrid</option>
                            <option>Barcelona</option>
                        </datalist>
                    </label>
                    <br/>
                    <label for="tipo">
                        Estado:
                        <select id ="tipo" name="tipo">
                            <option>Casa</option>
                            <option>Piso</option>
                            <option>Terreno</option>
                        </select>
                    </label>
                    <br/>
                    <label for="calle">
                        Calle:
                        <input type="text" id="calle" name="calle" value="" required/>
                    </label>
                    <br/>
                    <label for="cp">
                        Codigo Postal:
                        <input type="number"  id="cp" name="cp" maxlength="5" value="" />
                    </label>
                    <br/>
                    <label for="superficie">
                        Superficie:
                        <input type="number" id="superficie" name="superficie" value="" required/>
                    </label>
                    <br/>
                    <label for="objetivo">
                        Objetivo:
                        <select id ="objetivo" name="objetivo">
                            <option>Venta</option>
                            <option>Alquiler</option>
                        </select>
                    </label>
                    <br/>
                    <label for="foto">
                        Fotos:
                        <input type="file" name="fotos[]" value="" multiple/>(puede elegir mas de una)
                    </label>
                    <br/>
                    <input type="submit" id="enviar" class="boton" value="Añadir" />
                    <input type="reset" id="reinicio" class="boton" value="Limpiar" />
                </form>

            </div>
            <div><p>Copyright</p></div>
        </section>
    </body>

</html>
