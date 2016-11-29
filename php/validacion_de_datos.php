<?php
    /* Extrae los valores enviados desde la aplicacion movil */
    $usuarioEnviado = $_GET['usuario'];
    $passwordEnviado = $_GET['password'];
    /* Define los valores que seran evaluados, en este ejemplo son valores estaticos,
    en una verdadera aplicacion generalmente son dinamicos a partir de una base de datos */
    include ("./conexion.php");
    $consulta=mysql_query("select * from usuario where usuario='$usuarioEnviado' and contrasena='$passwordEnviado'",$link);
    $num=mysql_num_rows($consulta);
    /* crea un array con datos arbitrarios que seran enviados de vuelta a la aplicacion */
    $resultados = array();
    /* verifica que el usuario y password concuerden correctamente */
    if($num>0){
        $arreglo=mysql_fetch_array($consulta);
        $resultados["id"]=$arreglo["idusuario"];
        $resultados["correo"]=$arreglo["correo"];
        $resultados["nombre"]=$arreglo["nombre"];
	/*esta informacion se envia solo si la validacion es correcta */
	//$resultados["mensaje"] = "Validacion Correcta";
	$resultados["validacion"] = "ok";
    }
    else{
	/*esta informacion se envia si la validacion falla */
	$resultados["mensaje"] = "Usuario o password incorrectos";
    }
    /*convierte los resultados a formato json*/
    $resultadosJson = json_encode($resultados);
    /*muestra el resultado en un formato que no da problemas de seguridad en browsers */
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>