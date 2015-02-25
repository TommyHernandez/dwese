<?php
require_once './require/comun.php';
$texto = "";
foreach ($_POST as $nombre => $valor) {
    $texto.="$nombre --- $valor\n";
    
}
$texto .= "\n***************************\n";
$item = Leer::post("item_name");
$itemname = explode("_", $item);
$paypal = new Paypal();
$paypal->setItemname($itemname[1]);
$paypal->setTxnid(Leer::post("txn_id"));
$paypal->setGross(Leer::post("mc_gross"));
$paypal->setPayer(Leer::post("payer_email"));

$req = 'cmd=_notify-validate';
foreach ($_POST as $clave => $valor) {
    $valor = urlencode(stripslashes($valor));
    $req .= "&$clave=$valor";
}
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Host: www.sandbox.paypal.com\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr,30);
if (!$fp) {//error de conexión
} else {
fputs ($fp, $header . $req);
while (!feof($fp)) {
$res = fgets ($fp, 1024);
if (strcmp ($res, "VERIFIED") == 0) { //OK
    $paypal->setVerificado("Verificado");
}
else if (strcmp ($res, "INVALID") == 0) { //ERROR
    $paypal->setVerificado("No Verificado");
}
}
fclose ($fp);
}
$bd = new BaseDatos();
$modelo = new ModeloPaypal($bd);
$paypal->setResto($texto);
$modelo->add($paypal);
file_put_contents("ventas.txt", $texto, FILE_APPEND);