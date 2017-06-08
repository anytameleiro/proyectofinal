<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
    <?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php

  if (isset($_SESSION["user"])) {


    echo"<div id='negro'>";
echo"<h3>Informacion</h3>";
    include_once("../connection.php");

    //MAKING A SELECT QUERY

    $consulta="SELECT * from cliente where apodo='admin';";

    if ($result = $connection->query($consulta)) {
    }else {

          echo "Error: ". $sql ."<br>". mysqli_error($connection);
    }
    $obj = $result->fetch_object();

    echo "<span>Email: ".$obj->email."</span>";
    echo "<span>Tlf: ".$obj->telefono."</span>";
    echo "<span>Direccion: ".$obj->direccion."</span>";

    echo"</div>";



  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
