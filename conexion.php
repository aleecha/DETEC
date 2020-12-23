<?php
//Conexion local
$host='localhost';
$user='root';
$pass='';
$bd='infodetec';

@$conexion = mysqli_connect($host,$user,$pass,$bd) or die("Error en la conexion.");

?>