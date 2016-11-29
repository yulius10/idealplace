<?php
    $ubicacion=$_GET['ubicacion'];
    $estrato=$_GET['estrato'];
    $buscar=$_GET['buscar'];
    $que=$_GET['que'];
    include("./conexion.php");
    $resultados = array();
    $consulLugar=mysql_query("select * from lugaresPublicados where estrato='$estrato' and tipoNegocio_idtipoNegocio='$que' and tipoLugar_idtipoLugar='$buscar' and estado='A' and ubicaciones_idubicaciones='$ubicacion'",$link);
    while($arregloLugar=mysql_fetch_array($consulLugar)){
        $consultaLugar=mysql_query("select * from tipoLugar where idtipoLugar='$arregloLugar[tipoLugar_idtipoLugar]'",$link);
        $consultaNegocio=mysql_query("select * from tipoNegocio where idtipoNegocio='$arregloLugar[tipoNegocio_idtipoNegocio]'",$link);
        $consulUbicacion=mysql_query("select * from ubicaciones where idubicaciones='$arregloLugar[ubicaciones_idubicaciones]'",$link);
        $rowA=mysql_fetch_array($consultaLugar);
        $rowB=mysql_fetch_array($consultaNegocio);
        $rowC=mysql_fetch_array($consulUbicacion);
        
        $itemA=$arregloLugar['idlugaresPublicados'];
        $ubicacionA=$rowC["lugares"];
        $queA=$rowB['descripcion'];
        $tipoA=$rowA['descripcionLugar'];
        $direccionA=$arregloLugar['direccion'];
        $valorA=$arregloLugar['valor'];
        $fotoA=$arregloLugar['urlFoto'];
        
        $resultados[]= array("item"=>$itemA,"ubicacion"=>$ubicacionA,"tipo"=>$tipoA,"que"=>$queA,"valor"=>$valorA,"direccion"=>$direccionA,"foto"=>$fotoA);
    }
    $resultadosJson = json_encode($resultados);
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>