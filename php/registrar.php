<?php
    /* Extrae los valores enviados desde la aplicacion movil */
    $nombre=$_GET['nombre'];
    $apellido=$_GET['apellido'];
    $usuarioEnviado = $_GET['usuario'];
    $passwordEnviado = $_GET['password'];
    $celular = $_GET["celular"];
    $correo=$_GET['correo'];
    /* Define los valores que seran evaluados, en este ejemplo son valores estaticos,
    en una verdadera aplicacion generalmente son dinamicos a partir de una base de datos */
    include ("./conexion.php");
    $consulta=mysql_query("select * from usuario where usuario='$usuarioEnviado'",$link);
    $num=mysql_num_rows($consulta);
    /* crea un array con datos arbitrarios que seran enviados de vuelta a la aplicacion */
    $resultados = array();
    if($num>0){
        $resultados["mensaje"] = "Usuario no registrado. es usuario ya esta usado";
    }
    else{
        $consultaA=mysql_query("select * from usuario where correo='$correo'",$link);
        $numA=mysql_num_rows($consultaA);
        if($numA>0){
            $resultados["mensaje"] = "Usuario no registrado. el correo ya esta registrado";
        }
        else{
            $insertar=mysql_query("insert into usuario (nombre,apellido,acceso,usuario,contrasena,correo) values ('$nombre','$apellido','Usuario','$usuarioEnviado','$passwordEnviado','$correo')",$link);
            $consultaB=mysql_query("select * from usuario order by idusuario desc limit 1",$link);
            $arreglo=mysql_fetch_array($consultaB);
            $insertarCel=mysql_query("insert into numerosCelulares (usuario_idusuario,celulares) values ('$arreglo[idusuario]','$celular')",$link);
            /*esta informacion se envia solo si la validacion es correcta */
            $resultados["validacion"] = "ok";
            $resultados["mensaje"] = "Usuario registrado";
        }
    }
    /*convierte los resultados a formato json*/
    $resultadosJson = json_encode($resultados);
    /*muestra el resultado en un formato que no da problemas de seguridad en browsers */
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>