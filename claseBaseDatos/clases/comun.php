<?php

function autocarga($clase) {
    if (file_exists('clases/' . $clase . '.php')) {
        require 'clases/' . $clase . '.php';
    } else {
        require '../clases/' . $clase . '.php';
    }
}

spl_autoload_register('autocarga');
$sesion = SesionSingleton::getSesion();


