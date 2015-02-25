<?php
/**
 * Description of Paypal
 *
 * @author Tomas
 */
class Paypal {
    /*create table paypal(
    id int primary key auto_increment,
    item_name varchar(20),
    verificado varchar(15),
    gross double,
    txn_id int,
    payer_email varchar(30),
    resto varchar(200)
);*/
    private $id , $itemname, $verificado, $gross, $txnid, $payer, $resto;
    function __construct($id = null, $itemname ="", $verificado ="no", $gross =0, $txnid = 0, $payer = "", $resto ="") {
        $this->id = $id;
        $this->itemname = $itemname;
        $this->verificado = $verificado;
        $this->gross = $gross;
        $this->txnid = $txnid;
        $this->payer = $payer;
        $this->resto = $resto;
    }
     function set($datos, $inicio = 0) {
          $this->id = $datos[0 + $inicio];
        $this->itemname = $datos[1 + $inicio];
        $this->verificado = datos[2 + $inicio];
        $this->gross = datos[3 + $inicio];
        $this->txnid = datos[4 + $inicio];
        $this->payer = datos[5 + $inicio];
        $this->resto = datos[6 + $inicio];
 
    }
    function getId() {
        return $this->id;
    }

    function getItemname() {
        return $this->itemname;
    }

    function getVerificado() {
        return $this->verificado;
    }

    function getGross() {
        return $this->gross;
    }

    function getTxnid() {
        return $this->txnid;
    }

    function getPayer() {
        return $this->payer;
    }

    function getResto() {
        return $this->resto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setItemname($itemname) {
        $this->itemname = $itemname;
    }

    function setVerificado($verificado) {
        $this->verificado = $verificado;
    }

    function setGross($gross) {
        $this->gross = $gross;
    }

    function setTxnid($txnid) {
        $this->txnid = $txnid;
    }

    function setPayer($payer) {
        $this->payer = $payer;
    }

    function setResto($resto) {
        $this->resto = $resto;
    }


    
}
