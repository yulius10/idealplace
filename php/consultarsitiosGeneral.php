<?php
    $ubicacion=$_GET['ubicacion'];
    include("./conexion.php");
    $query=mysql_query("select * from lugaresPublicados where ubicaciones_idubicaciones='$ubicacion' and estado='A'",$link);
    $resultados = array();
    if($query){
        while($row=mysql_fetch_array($query)){
            $queryA=mysql_query("select * from tipoNegocio where idtipoNegocio='$row[tipoNegocio_idtipoNegocio]'",$link);
            $queryB=mysql_query("select * from tipoLugar where idtipoLugar='$row[tipoLugar_idtipoLugar]'",$link);
            $queryC=mysql_query("select * from ubicaciones where idubicaciones='$row[ubicaciones_idubicaciones]'",$link);
            $rowA=mysql_fetch_array($queryA);
            $rowB=mysql_fetch_array($queryB);
            $rowC=mysql_fetch_array($queryC);
            
            
            $itemA=$row['idlugaresPublicados'];
            $ubicacionA=$rowC['lugares'];
            $queA=$rowA['descripcion'];
            $tipoA=$rowB['descripcionLugar'];
            $direccionA=$row['direccion'];
            $valorA=$row['valor'];
            $fotoA=$row['urlFoto'];
            
            $resultados[]= array("item"=>$itemA,"ubicacion"=>$ubicacionA,"tipo"=>$tipoA,"que"=>$queA,"valor"=>$valorA,"direccion"=>$direccionA,"foto"=>$fotoA);
        }
    }
    $resultadosJson = json_encode($resultados);
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>