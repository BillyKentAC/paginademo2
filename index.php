<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body >

<?php
require 'Conexion.php';
$sql = 'SELECT * FROM product';
$resultado = mysqli_query($con, $sql);
 ?>

<div class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#">
			<img  width="40" height="40" src="images/logito.png" alt="Inicio"> <span class="text-white">Distribuidora</span>
	</a>
</div>

<div class="container">

<h2>Seleccione los productos </h2>
 <table id="t01" class="table">
	 <thead class="thead-dark">
		 <th>Nombre</th>
		 <th>Precio</th>
		 <th>Cantidad</th>
		 <th>Añadir</th>
	 </thead>
 	<?php while($producto = mysqli_fetch_object($resultado)) { ?>
	<tbody class="t">
		<td> <?php echo $producto->nombre; ?> </td>
		<td> <?php echo $producto->precio; ?> </td>
		<td> <?php echo $producto->cantidad; ?> </td>
		<td> <a href="cart.php?id= <?php echo $producto->id; ?> &action=add"> <img   width="50" height="50" src="images/cart.png" alt=""></a> </td>

	</tbody>
	<?php } ?>
 </table>

</div>

</body>

 </html>
