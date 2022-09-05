<?php

//SERVIDOR, USUARIO Y CONTRASENA, BASE DE DATOS
$user = "root";
$pass = "";

$server = "localhost";
$db = "proyectoBascula";


$con=mysqli_connect($server, $user, $pass, $db) or die ("No se ha podido conectar con la base de datos");

return $con;

?>