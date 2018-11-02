<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pago del carrito</title>
    <link rel="stylesheet" href="CSS/pasarela.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </head>
  <?php
    session_start();
    include 'Servicio.php';
    if (isset($_POST['btnEnviar'])) {

        $numero = $_POST['numero'];
        $password= $_POST['code'];
        $monto = $_SESSION['precioTotal'];
        $Resultado =json_decode(consumirWebService($numero,$password,$monto),true);
    }
  ?>
  <body>
    <div class="navbar navbar-expand-sm bg-dark">
      <a class="navbar-brand" href="#">
    			<img  width="40" height="40" src="images/cartita.png" alt="Inicio"> <span class="font-weitght-bold text-white">Pago Online</span>
    	</a>
    </div>
    <div class="container-fluid">
      <div  class="card-deck">
        <div id="carta1" class="card" style="width:400px">
    <div class="card-body">
      <h4 class="card-title">Tarjeta de Crédito</h4>
      <div id="cartaincluida" class="card-deck">
        <div class="card">
          <div class="card-body">

              <form class="col-dm-1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <label  for="logovisa">Tipo de tarjeta</label>
              <img id="logovisa" width="50" height="50" src="images/visa.png" alt="">
            </div>
          <div class="form-inline">
            <label for="numero">Número de Tarjeta</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <img  class="input-group-text" src="images/calculator.png" width="50" height="38" alt="">
              </div>
              <input type="text" class="form-control"  placeholder="Número" required name="numero">
            </div>
          </div>
          <div style="margin-top:20px" class="form-inline">
            <label for="code">Código de Seguridad</label>
            <div  class="input-group">
              <div class="input-group-prepend">
                <img class="input-group-text" width="50" height="38" src="images/tarjeta.png" alt="">
              </div>
              <input type="password" class="form-control" required placeholder="Código" name="code" value="">
            </div>
          </div>
        <div style="margin-top:20px" class="form-group">
          <label for="btnEnviar"></label>
          <input type="submit" class="btn btn-primary col-sm-12" name="btnEnviar" value="Enviar">
        </div>
      </form>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
              <form class="col-dm-1" >
                <h4 class="card-title">Detalle de Compra</h4>
            <div class="form-group">
              <p>Empresa</p>
              <div class="input-group ">
      <input  type="text" id="texto" value= "<?php echo "Fake Technologies Services.";  ?>" class="form-control col-sm-12" readonly>
        </div>
            </div>
                  <div class="form-group">
                    <p>Monto</p>
                    <div class="input-group ">
            <div class="input-group-prepend">
              <span class="input-group-text">S/</span>
            </div>
            <input  type="text" id="botonPrecio" value= "<?php echo $_SESSION['precioTotal']; ?>" class="form-control col-sm-4" readonly >
            <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
        </div>
          </div>
            <div class="form-group">
              <a href="inicio.php"><input style="margin-top:25px"  class="btn btn-warning col-sm-12" type="button" name="" value="Regresar al inicio"> </a>
            </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div id="carta2" class="card" style="width:400px">
    <div class="card-body">
      <h4 class="card-title">Reporte de Transacción</h4>
      <div class="card-deck">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Nombre</h6>
            <p class="card-text"> <?php if (!isset($Resultado["nombrePropietario"])) {
              // code...
            echo "Usuario no Reconocido";}
            else {
              echo $Resultado["nombrePropietario"];
            }; ?></p>
          </div>
          <div class="card-body">
            <h6 class="card-title">Saldo Modificado</h6>
            <p class="card-text"> <?php if(!isset($Resultado["saldoModificado"]))
            {
              echo "-------";
            }
            else {
              echo $Resultado["saldoModificado"];
            }; ?> </p>
          </div>

          <div class="card-body">
            <h6 class="card-title">Saldo Actual</h6>
            <p class="card-text"> <?php if (!isset($Resultado["saldoActual"])) {
              echo "-------";
            }
            else {
              echo $Resultado["saldoActual"];
            }; ?></p>
          </div>

          </div>
          <div class="card">
            <img class="card-img-top" src="images/boy.png" alt="Card image" style="width:100%">
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
    </div>

  </body>
</html>
