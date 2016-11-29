<?php
    /* Extrae los valores enviados desde la aplicacion movil */
    $id=$_GET['id'];
    $ruta=$_GET["ruta"];

    /* Define los valores que seran evaluados, en este ejemplo son valores estaticos,
    en una verdadera aplicacion generalmente son dinamicos a partir de una base de datos */
    include ("./conexion.php");
    $consulta=mysql_query("select * from lugaresPublicados where usuario_idusuario='$id' and estado='A' order by idlugaresPublicados desc limit 1",$link);
    $num=mysql_num_rows($consulta);
    /* crea un array con datos arbitrarios que seran enviados de vuelta a la aplicacion */
    $resultados = array();
    /* verifica que el usuario y password concuerden correctamente */
    if($num>0){
        $arreglo=mysql_fetch_array($consulta);
        $sql=mysql_query("update lugaresPublicados set urlFoto='http://160.153.224.25/idealplace/imagenesPredio/$ruta.jpg' where idlugaresPublicados='$arreglo[idlugaresPublicados]'",$link);
	/*esta informacion se envia solo si la validacion es correcta */
	$resultados["validacion"] = "ok";
        $resultados["mensaje"] = "Se a guardado correctamente el predio";
    }
    else{
	/*esta informacion se envia si la validacion falla */
	$resultados["mensaje"] = "El predio no se guardo";
    }
    /*convierte los resultados a formato json*/
    $resultadosJson = json_encode($resultados);
    /*muestra el resultado en un formato que no da problemas de seguridad en browsers */
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>