<?php
$conexion = mysql_connect("localhost","root", "root");
if(!$conexion){
  die('Hubo un problema al conectar:'. mysql_error());
}
mysql_select_db("mora", $conexion);
mysql_query("SET NAMES utf8");  //arregla problemas de codificacion de caracteres

//validaciones más cortas :D
function valid_post($key){
    return isset($_POST[$key]) && !empty($_POST[$key]);
}
?>