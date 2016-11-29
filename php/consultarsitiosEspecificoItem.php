<?php
    $item=$_GET['item'];
    include("./conexion.php");
    $query=mysql_query("select * from lugaresPublicados where idlugaresPublicados='$item' and estado='A'",$link);
    $resultados = array();
    if($query){
        
        $row=mysql_fetch_array($query);
        
        $queryA=mysql_query("select * from tipoNegocio where idtipoNegocio='$row[tipoNegocio_idtipoNegocio]'",$link);
        $queryB=mysql_query("select * from tipoLugar where idtipoLugar='$row[tipoLugar_idtipoLugar]'",$link);
        $queryC=mysql_query("select * from ubicaciones where idubicaciones='$row[ubicaciones_idubicaciones]'",$link);
        $queryD=mysql_query("select * from localidad where idlocalidad='$row[localidad_idlocalidad]'",$link);
        $queryE=mysql_query("select * from numeroCelulares where usuario_idusuario='$row[usuario_idusuario]'",$link);
        
        $rowA=mysql_fetch_array($queryA);
        $rowB=mysql_fetch_array($queryB);
        $rowC=mysql_fetch_array($queryC);
        $rowD=mysql_fetch_array($queryD);
        $rowE=mysql_fetch_array($queryE);

        $consulUsu=mysql_query("select * from usuario where idusuario='$row[usuario_idusuario]'",$link);
        $arreUsu=mysql_fetch_array($consulUsu);
        
        $ubicacion=$rowC["lugares"];
        $estrato=$row["estrato"];
        $fecha=$row["fecha"];
        $habitacion=$row["cantHabitaciones"];
        $banos=$row["cantBanos"];
        $cocina=$row["cocina"];
        $metroscuadrados=$row["metroCuadrado"];
        $valor=$row["valor"];
        $localidad=$rowD["localidad"];
        $direccion=$row["direccion"];
        $urlFoto=$row["urlFoto"];
        $accesointernet=$row["accesoInternet"];
        $servicios=$row["servicios"];
        $garaje=$row["garaje"];
        
        $tipoNegocio=$rowA["descripcion"];
        $tipoLugar=$rowB["descripcionLugar"];
        
        $nombre=$arreUsu["nombre"];
        $apellido=$arreUsu["apellido"];
        $celular=$rowE["celular"];
        $correo=$arreUsu["correo"];
        $resultados[]= array("ubicacion"=>$ubicacion,"estrato"=>$estrato,"tipoLugar"=>$tipoLugar,"tipoNegocio"=>$tipoNegocio,"habitaciones"=>$habitacion,"banos"=>$banos,"cocina"=>$cocina,"garaje"=>$garaje,"metros"=>$metroscuadrados,"localidad"=>$localidad,"internet"=>$accesointernet,"servicios"=>$servicios,"valor"=>$valor,"direccion"=>$direccion,"persona"=>$nombre." ".$apellido,"celular"=>$celular,"correo"=>$correo,"foto"=>$urlFoto);
    }
    $resultadosJson = json_encode($resultados);
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>