<!DOCTYPE html>
<head>
<title> 
	Carrito
</title>

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
require 'Conexion.php';
require 'item.php';

if(isset($_GET['id']) && !isset($_POST['update']))  {
	$sql = "SELECT * FROM product WHERE id=".$_GET['id'];
	$resultado = mysqli_query($con, $sql);
	$producto = mysqli_fetch_object($resultado);
	$item = new Item();
	$item->id = $producto->id;
	$item->nombre = $producto->nombre;
	$item->precio = $producto->precio;
  $iteminstock = $producto->cantidad;
	$item->cantidad = 1;
	// Verificar que el producto exista en el carrito
	$index = -1;
	$carrito = unserialize(serialize($_SESSION['cart']));
	for($i=0; $i<count($carrito);$i++)
		if ($carrito[$i]->id == $_GET['id']){
			$index = $i;
			break;
		}
		if($index == -1)
			$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		else {

			if (($carrito[$index]->cantidad) < $iteminstock)
				 $carrito[$index]->cantidad ++;
			     $_SESSION['cart'] = $carrito;
		}
}
// Eliminar producto del carrito
if(isset($_GET['index']) && !isset($_POST['update'])) {
	$carrito = unserialize(serialize($_SESSION['cart']));
	unset($carrito[$_GET['index']]);
	$carrito = array_values($carrito);
	$_SESSION['cart'] = $carrito;
}
// Actualizar producto del carrito
if(isset($_POST['update'])) {
  $arrayCantidad = $_POST['quantity'];
  $carrito = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($carrito);$i++) {
     $carrito[$i]->cantidad = $arrayCantidad[$i];
  }
  $_SESSION['cart'] = $carrito;
}
?>
<div class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#">
			<img  width="40" height="40" src="images/logito.png" alt="Inicio"> <span class="text-white">Distribuidora</span>
	</a>
</div>

<div class="container">
	<h2> Productos en el carrito </h2>
	<form method="POST">
	<table id="t01" class="table">
	<thead  class="thead-dark">
		<th>Opcion</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Cantidad</th>

		<th>Total</th>

	</thead>

	<?php
				//Conteo del carrito de compra
				$carrito = unserialize(serialize($_SESSION['cart']));
				$index = 0;
				$suma=0;
		 		for($i=0; $i<count($carrito); $i++){
			 	$suma += $carrito[$i]->precio * $carrito[$i]->cantidad;

				$_SESSION['precioTotal'] = $suma;
	?>
		 <tr>
				<td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto del carrito?')" > <img  width="50" height="50" src="images/error.png" alt=""> </a> </td>

				<td> <?php echo $carrito[$i]->nombre; ?> </td>
				<td> <?php echo $carrito[$i]->precio; ?> </td>
					<td> <input type="number" min="1" value="<?php echo $carrito[$i]->cantidad; ?>" name="quantity[]"> </td>
					<td> <?php echo $carrito[$i]->precio * $carrito[$i]->cantidad; ?> </td>
		 </tr>
		<?php

			$index++;

			}?>
		<tr>
			<td colspan="4" style="text-align:right; font-weight:bold">
					 <input id="saveimg" type="image"  src="images/pagar.png" name="update" alt="Save Button">
					 <input type="hidden" name="update">
			</td>
			<td> <?php echo $suma; ?> </td>
		</tr>
	</table>
	</form>
	<br>

	<table class="table">
		<thead class="thead-dark">
			<th>Regresar</th>
			<th>Comprar</th>
		</thead>
		<tbody>
			<td><a href="index.php"> <img width="100" height="100" src="images/regresar.png" alt=""> </a></td>
			<td>	  <a href="checkout.php"> <img width="100" height="100"  src="images/credito.png" alt=""> </a></td>

		</tbody>
	</table>

	<?php
	if(isset($_GET["id"]) || isset($_GET["index"])){
	 header('Location: cart.php');
	}
	?>
</div>

</body>
 </html>
