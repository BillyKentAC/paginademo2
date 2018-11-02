<?php
$servidor= 'localhost';
$usuario = 'root';
$clave = 'root';
$basedatos = 'demo';
// Create connection
$con = mysqli_connect($servidor, $usuario, $clave, $basedatos);
 // Check connection
if (!$con) {

	die ("Fallo en conexion.". mysqli_connect_error()); 
}
 ?>
