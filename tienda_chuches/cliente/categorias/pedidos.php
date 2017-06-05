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
          min-width: 1184px;
      }
</style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
$user=$_SESSION["user"];
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
    echo "<h1>Pedidos</h1>";
    ?>
    <div class="titulo">
        <table id='dos' >
       <tr>

         <th id='dos'>Nombre</th>
         <th id='dos'>Cantidad</th>
         <th id='dos'>Fecha</th>
         <th id='dos'>Precio total</th>
         <th id='dos'>Pago</th>

       </tr>


    </div>
    <div class="contenido">

<?php

    //MAKING A SELECT QUERY

    $con="SELECT * from pedido inner join
     contiene on contiene.id_pedido=pedido.id_pedido inner join chuches on chuches.id_chuche=contiene.id_chuche
     where pedido.apodo='$user';";

    if ($result = $connection->query($con)) {

      while($obj = $result->fetch_object()) {
    echo "<tr>";
   echo "<td id='dos'><a href= 'descripcion.php?id=$obj->id_chuche'>".$obj->nombre_chu."</a></td>";
   echo "<td id='dos'>".$obj->cantidad."</td>";
    echo "<td id='dos'>".$obj->fecha."</td>";
    echo "<td id='dos'>".$obj->precio_total."</td>";
    if (!empty($obj->pago)){
      echo "<td id='dos'>".$obj->pago."</td>";
    }else{
      echo "<td id='dos'><span>Sin pagar</span></td>";
    }

    echo "</tr>";
   }

  unset($obj);
}else {

      echo "Error: ". $sql ."<br>". mysqli_error($connection);
}

  ?>


  </table>
  </div>

  <?php

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