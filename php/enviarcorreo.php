<?php
    $mensaje="El codigo de la propiedad es: 1 .\nFavor no responder este mensaje. ya que es generado por el sistema.";
        $cabecera='MIME-Version: 1.0' . "\r\n";
        $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Cabeceras adicionales
        $cabecera .= "To: feligomez160@gmail.com \r\n";
        $cabecera .= 'From: Administrador' . "\r\n";
        $asunto="Publicacion de idealplace";
        if(mail("feligomez160@gmail.com", $asunto, $mensaje)){
            echo "envio correo";
        }
        else{
            echo "no envio correo";
        }
?>