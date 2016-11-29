<?php
//CONEXION CON LA BASE DE DATOS
//if (!($link=mysql_connect("localhost","root","metallica12345")))//ingreso a mysql
/*
if (!($link=mysql_connect("localhost","root",""))){
	echo "ERROR AL CONECTARSE CON MYSQL";
	exit();
}
if (!(mysql_select_db("idealplace",$link)))//conexion a la BD
{ echo "ERROR AL SELECCIONAR LA BASE DE DATOS";
  exit();
}
 * 
 */

if (!($link=mysql_connect("localhost","yulius","Yulius12345"))){//ingreso a mysql
	echo "ERROR AL CONECTARSE CON MYSQL";
	exit();
}
if (!(mysql_select_db("idealplace",$link)))//conexion a la BD
{ echo "ERROR AL SELECCIONAR LA BASE DE DATOS";
  exit();
}
 
?>