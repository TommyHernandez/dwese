<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validar
 *
 * @author PeroTHDC
 */
class validar {

    static function isCorreo($v) {

        return filter_var($v, FILTER_VALIDATE_EMAIL);
    }

    static function isNumero($v) {
        return filter_var($v, FILTER_VALIDATE_BOOLEAN);
    }

    static function isEntero($v) {
        return filter_var($v, FILTER_VALIDATE_INT);
    }

    static function isTelefono() {
        
    }

    static function isUrl($v) {
        return filter_var($v, FILTER_VALIDATE_URL);
    }

    static function isFecha() {
        
    }

    static function isIP($v) {
        return filter_var($v, FILTER_VALIDATE_IP);
    }

    static function isDNI() {
        
    }

    static function isCp() {
        
    }

    static function isMinLong($v, $l = 1) {
        
    }

    static function isMaxLong($l = 1) {
        
    }

    static function isLongLimit($min = 0, $max = 1) {
        
    }

    static function isLogin() {
        
    }

    static function isClave() {
        
    }

    static function isCondicion() {
        
    }
    static function isAltaUsuario($login,$cave,$nombre,$apellidos,$email,$claveconfirmada){
        return ;
        
        
    }
}
