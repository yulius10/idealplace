<?php
    $id=$_GET['id'];
    $ubicacion=$_GET['ubicacion'];
    $estrato=$_GET['estrato'];
    $buscar=$_GET['buscar'];
    $que=$_GET['que'];
    $habitaciones=$_GET['habitaciones'];
    $banos=$_GET['banos'];
    $cocina=$_GET['cocina'];
    $garaje=$_GET['garaje'];
    $metros=$_GET['metrosCuadrados'];
    $localidad=$_GET['localidad'];
    $internet=$_GET['internet'];
    $servicios=$_GET['servicios'];
    $valor=$_GET['valor'];
    $direccion=$_GET['direccion'];
    $fecha=date("Y-m-d H:i:s");
    include("./conexion.php");
    $insert=mysql_query("insert into lugaresPublicados (localidad_idlocalidad,ubicaciones_idubicaciones,usuario_idusuario,tipoNegocio_idtipoNegocio,tipoLugar_idtipoLugar,estrato,estado,fecha,cantHabitaciones,cantBanos,cocina,metroCuadrado,valor,direccion,urlFoto,accesoInternet,servicios,garaje,razonDeshabilitacion) values ('$localidad','$ubicacion','$id','$que','$buscar','$estrato','A','$fecha','$habitaciones','$banos','$cocina','$metros','$valor','$direccion','Ninguna','$internet','$servicios','$garaje','Inactivo')",$link);
    $select=mysql_query("select * from lugaresPublicados where usuario_idusuario='$id' order by idlugaresPublicados desc limit 1",$link);
    $row=mysql_fetch_array($select);
    $consulCliente=mysql_query("select * from usuario where idusuario='$id'",$link);
    $arreCliente=mysql_fetch_array($consulCliente);
    //.mysql_error();   dice qye error hay en la sentencia sql
    /* crea un array con datos arbitrarios que seran enviados de vuelta a la aplicacion */
    $resultados = array();
    /* verifica que el usuario y password concuerden correctamente */
    if($insert){
        //envia correo
        $mensaje="El codigo de la propiedad es: ".$row["idlugaresPublicados"]." .\nFavor no responder este mensaje. ya que es generado por el sistema.";
        $cabecera='MIME-Version: 1.0' . "\r\n";
        $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Cabeceras adicionales
        $cabecera .= 'To:'.$arreCliente["correo"]. "\r\n";
        $cabecera .= 'From: Administrador' . "\r\n";
        $asunto="Publicacion de idealplace";
        mail($arreCliente["correo"], $asunto, $mensaje);
        
        
        /*esta informacion se envia solo si la validacion es correcta */
        $resultados["mensaje"] = "Predio guardado exitosamente";
        $resultados["validacion"] = "ok";
    }
    else{
	/*esta informacion se envia si la validacion falla */
	$resultados["mensaje"] = "Predio no guardado";
    }
    /*convierte los resultados a formato json*/
    $resultadosJson = json_encode($resultados);
    /*muestra el resultado en un formato que no da problemas de seguridad en browsers */
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>