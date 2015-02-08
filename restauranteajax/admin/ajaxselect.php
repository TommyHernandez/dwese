<?php
require '../require/comun.php';
header('Content-Type: application/json');
$pagina = LEER::get("pagina");
if ($pagina == null) {
$pagina = 0;
}
$bd = new BaseDatos();
$modelo = new ModeloPlato($bd);
$enlaces = Paginacion::getEnlacesPaginacionJSON($pagina, $modelo->count(), 3);
echo "{\n";
echo '"paginas":'.json_encode($enlaces).','; 
echo '"platos":'.$modelo->getListJSON($pagina, Configuracion::RPP).'}';