<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of correo
 *
 * @author PedroTHDC
 */
class correo {

    static function enviarServidor($origen, $destino, $asunto, $mensaje) {

        $headers = "From:" . $origen;
        return mail($destino, $asunto, $mensaje, $headers);
    }

    static function enviarGmail($origen, $destino, $clave, $asunto, $mensaje) {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Username = $origen;
        $mail->Password = $clave;
        $mail->Subject = $asunto;
        $mail->MsgHTML($mensaje);
        $mail->IsHTML(true);
        $mail->AddAddress($destino);
        if (!$mail->Send()) {
            return $mail->errorInfo();
        }
        return true;
    }

    static function enviarHotmail($origen, $destino, $clave, $asunto, $mensaje) {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->Host = "smtp.live.com";
        $mail->Port = 25;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Mailer = "smtp";
        $mail->Username = $origen;
        $mail->Password = $clave;
        $mail->Subject = $asunto;
        $mail->MsgHTML($mensaje);
        $mail->IsHTML(true);
        $mail->AddAddress($destino);
        $mail->Send();
        if (!$mail->Send()) {
            return $mail->errorInfo();
        }
        return true;
    }

}
