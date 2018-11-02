<?php
  include 'Conexion.php';

  session_start();

  $_SESSION['numeroTarjeta'] = $_POST['numero'];
  $_SESSION['codigoTarjeta'] = $_POST['code'];

  $Objeto->nroCuenta = $_SESSION['numeroTarjeta'];
  $Objeto->password = $_SESSION['codigoTarjeta'];
  $Objeto->cantidad = $_SESSION['precioTotal'];

  $uy = json_encode($Objeto);
  
  echo $uy;



 ?>
