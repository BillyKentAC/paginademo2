<?php
session_start();
require 'Conexion.php';
require 'item.php';

// Guardar nuevas ordenes
$sql1 = 'INSERT INTO orders (nombre, fechacreacion) VALUES ("Nueva Orden","'.date('Y-m-d').'")';
mysqli_query($con, $sql1);
$ordersid = mysqli_insert_id($con);
// Guardar detalles de orden para nuevas ordenes

$carrito = unserialize(serialize($_SESSION['cart']));

  if (!isset($cart)) {
    header('Location: cart.php');
  }
  for($i=0; $i<count($carrito);$i++) {
    $sql2 = 'INSERT INTO odersdetail (productid, ordersid, price, quantity) VALUES ('.$cart[$i]->id.', '.$ordersid.', '.$cart[$i]->precio.', '.$cart[$i]->cantidad.')';
    mysqli_query($con, $sql2);
  }
// Limpiar carrito
unset($_SESSION['cart']);
header('Location:Pasarela.php');
?>
