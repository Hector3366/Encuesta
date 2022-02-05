<?php
$host="localhost";
$usuario="root";
$contraseña="";
$bd="encuesta";
$conexion=mysqli_connect($host,$usuario,$contraseña,$bd);
if($conexion){
}else{
    echo "conexion fallida";
}
?>