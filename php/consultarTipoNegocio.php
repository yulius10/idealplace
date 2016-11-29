<?php
    include("./conexion.php");
    $query=mysql_query("select * from tipoNegocio",$link);
    $resultados = array();
    while($row=mysql_fetch_array($query)){
        $resultados[]= array("idTipoNegocio"=>$row["idtipoNegocio"],"tipoNegocio"=>$row["descripcion"]);
    }
    $resultadosJson = json_encode($resultados);
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>