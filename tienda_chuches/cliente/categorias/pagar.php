<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../menu.css">
  <link rel="stylesheet" type="text/css" href="categoria.css">
  <link rel="shortcut icon" href="../../img/logo.ico">
  <title>TODO CHUCHES</title>
  <style>

table{
  margin: auto;
}
      img{
          width: 80px;
      }

      </style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {

    //SESSION ALREADY CREATED
$idped = $_GET['idped'];
    include_once("../menu.php");

    echo" <div class='login1'>
      <div id='login2'>";
      echo"<table>  <tr><td>";
          echo"<div id='blanco'>";
          echo "<h1>Pagar con:</h1>";
  include_once("../connection.php");

?>

<form method="post">
<input type="radio" name="pagar" value="paypal" required/><span>PayPal</span><br/>
<input type="radio" name="pagar" value="tarjeta" required/><span>Tarjeta de credito</span><br/>
<button type="submit" value="Aceptar">Aceptar</button>
</form>




<?php
      $paypal = $_POST['pagar'];
      if ($paypal== "paypal") {

          echo "<form method='post'>";
          echo '<br><strong>PayPal </strong>';
          echo "<img src='../fondoimg/PayPal.png' /><br>";
          echo"<span>Correo:</span> <input type='email' name='email' placeholder='correo' maxlength='50' required/><br> ";
          echo"<span>Contraseña:</span> <input type='password' name='contrasenia' placeholder='contraseña' maxlength='64' required/><br>";
          echo "<br><button name='edit'> Pagar</button><br>";
          echo"</form>";

      }
      if ($paypal== "tarjeta") {
          echo "<form method='post'>";
          echo '<br><strong>Tarjeta de credito </strong>';
          echo "<img src='../fondoimg/tarjeta.png' /><br>";
          echo"<span>Número de tarjeta: </span><input type='text' pattern='[0-9]{16}' maxlength='16' title='Solo numeros'  name='numero' placeholder='numero' maxlength='16' required/><br> ";
          echo"<span>Fecha de caducidad: </span><input type='date'  name='fecha' required/><br>";
          echo"<span>Codigo de seguridad: </span><input type='text' pattern='[0-9]{3}' title='Solo numeros'  name='codigo' placeholder='codigo' maxlength='3' required/><br> ";
          echo"<span>Nombre: </span><input type='text'  name='nom' required/><br>";
          echo"<span>Apellidos: </span><input type='text'  name='ape' required/><br>";
            echo "<br><button name='edit'> Pagar</button><br>";
            echo"</form>";

      }
      $result = $connection->query("SELECT * FROM pedido where id_pedido='$idped';");
      $obj = $result->fetch_object();
      echo "<br>Precio total: $obj->precio_total €<br>";


      echo"</div>";
      echo "<br><a href='cancelar.php?id=$idped' id='atras'>Cancelar</a><br>";
      echo"</td>";

  echo"</tr>";
      echo"</table>";

      echo" </div>";
      echo" </div>";

      if (isset($_POST['edit'])) {
        //variables

        $pago=Pagado;

        //consulta
        $consulta="UPDATE `pedido` SET
        `pago` = '$pago'
        WHERE  `pedido`.`id_pedido` = '$idped';";


        if ($result = $connection->query($consulta)){
          header ("Location: pagado.php");
        } else {
              echo "Error: " . $result . "<br>" . mysqli_error($connection);
          }
      }
include_once("../info.php");
  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
