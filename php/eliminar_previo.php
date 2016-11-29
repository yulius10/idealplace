<?php
    /* Extrae los valores enviados desde la aplicacion movil */
    $id=$_GET['id'];
    $codigoEnviado = $_GET['codigo'];
    $razonEnviado = $_GET['razon'];
    /* Define los valores que seran evaluados, en este ejemplo son valores estaticos,
    en una verdadera aplicacion generalmente son dinamicos a partir de una base de datos */
    include ("./conexion.php");
    $consulta=mysql_query("select * from lugaresPublicados where idlugaresPublicados='$codigoEnviado' and estado='A'",$link);
    $num=mysql_num_rows($consulta);
    /* crea un array con datos arbitrarios que seran enviados de vuelta a la aplicacion */
    $resultados = array();
    /* verifica que el usuario y password concuerden correctamente */
    $fecha=date("Y-m-d");
    if($num>0){
        $sql=mysql_query("update lugaresPublicados set estado='I', razonDeshabilitacion='$razonEnviado' where idlugaresPublicados='$codigoEnviado'",$link);
	/*esta informacion se envia solo si la validacion es correcta */
	$resultados["validacion"] = "ok";
        $resultados["mensaje"] = "Se a deshabilitado correctamente la informaciom del predio";
    }
    else{
	/*esta informacion se envia si la validacion falla */
	$resultados["mensaje"] = "El predio no existe o ya esta desHabilitado";
    }
    /*convierte los resultados a formato json*/
    $resultadosJson = json_encode($resultados);
    /*muestra el resultado en un formato que no da problemas de seguridad en browsers */
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>