<?php
    /* Extrae los valores enviados desde la aplicacion movil */
    $id=$_GET['id'];
    $asunto=$_GET['asunto'];
    $mensaje=$_GET['mensaje'];
    $fecha=date("Y-m-d");
    /* Define los valores que seran evaluados, en este ejemplo son valores estaticos,
    en una verdadera aplicacion generalmente son dinamicos a partir de una base de datos */
    include ("./conexion.php");
    $insert=mysql_query("insert into contactenos (usuario_idusuario,asunto,mensaje,fecha) values('$id','$asunto','$mensaje','$fecha')",$link);
    /* crea un array con datos arbitrarios que seran enviados de vuelta a la aplicacion */
    $resultados = array();
    /* verifica que el usuario y password concuerden correctamente */
    if($insert){
	/*esta informacion se envia solo si la validacion es correcta */
	$resultados["mensaje"] = "Mensaje enviado";
	$resultados["validacion"] = "ok";
    }
    else{
	/*esta informacion se envia si la validacion falla */
	$resultados["mensaje"] = "Error al enviar el mensaje";
    }
    /*convierte los resultados a formato json*/
    $resultadosJson = json_encode($resultados);
    /*muestra el resultado en un formato que no da problemas de seguridad en browsers */
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>