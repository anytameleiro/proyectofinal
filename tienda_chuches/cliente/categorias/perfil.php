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
      body{
          min-width: 796px;
      }
</style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {

    include_once("../menu.php");
      
    include_once("../connection.php");
     
    include_once("../tema.php");

    echo" <div class='login1'>
      <div id='login2'>";
      echo"<table>
      <tr><td id='m' valign='top'>";
    include_once("../menuv.php");


    echo"<td>";
    echo"<div id='blanco'>";
    echo "<h1>Mi perfil</h1>";

include_once("../connection.php");

    //MAKING A SELECT QUERY

    $consulta="SELECT * from cliente where apodo='$user';";

    if ($result = $connection->query($consulta)) {
    }else {

          echo "Error: ". $sql ."<br>". mysqli_error($connection);
    }
    $obj = $result->fetch_object();

    echo "<strong>Apodo: </strong>".$obj->apodo."<br><br>";
    echo "<strong>Nombre: </strong>".$obj->nombre."<br><br>";
    echo "<strong>Apellidos: </strong>".$obj->apellidos."<br><br>";
    echo "<strong>Direccion: </strong>".$obj->direccion."<br><br>";
    echo "<strong>Email: </strong>".$obj->email."<br><br>";
    echo "<strong>Telefono: </strong>".$obj->telefono."<br><br>";

    echo"</div>";
  echo"</td>";

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
