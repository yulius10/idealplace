<?php
    include("./conexion.php");
    $query=mysql_query("select * from tipoLugar",$link);
    $resultados = array();
    while($row=mysql_fetch_array($query)){
        $resultados[]= array("idTipoLugar"=>$row["idtipoLugar"],"tipoLugar"=>$row["descripcionLugar"]);
    }
    $resultadosJson = json_encode($resultados);
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>