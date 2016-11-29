<?php
    include("./conexion.php");
    $query=mysql_query("select * from ubicaciones",$link);
    $resultados = array();
    while($row=mysql_fetch_array($query)){
        $resultados[]= array("idUbicaciones"=>$row["idubicaciones"],"Ubicaciones"=>$row["lugares"]);
    }
    $resultadosJson = json_encode($resultados);
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>