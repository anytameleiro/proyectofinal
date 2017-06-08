<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../menu.css">
  <link rel="shortcut icon" href="../../img/logo.ico">
  <link rel="stylesheet" type="text/css" href="categoria.css">
  <title>TODO CHUCHES</title>
  <style>

  table{
  margin: auto;
  }

      </style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
    //SESSION ALREADY CREATED

    include_once("../menu.php");
      
    include_once("../connection.php");
      
    include_once("../tema.php");
    echo" <div class='login1'>
      <div id='login2'>";
      echo"<table>  <tr><td>";
          echo"<div id='blanco'>";
?>
<h1>Pedido realizado</h1>
<h4>Gracias por su compra</h4>
<a href="pedidos.php">Mirar pedidos</a>
<?php
echo"</div>";
echo"</td>";

echo"</tr>";
echo"</table>";

echo" </div>";
echo" </div>";
include_once("../info.php");
  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
