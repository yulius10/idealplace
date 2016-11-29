<?php
    include("./conexion.php");
    $query=mysql_query("select * from localidad",$link);
    $resultados = array();
    while($row=mysql_fetch_array($query)){
        $resultados[]= array("idLocalidad"=>$row["idlocalidad"],"Localidad"=>$row["localidad"]);
    }
    $resultadosJson = json_encode($resultados);
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>