<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar pedido</title>
      <link rel="stylesheet" type="text/css" href="../formulario.css">
        <link rel="shortcut icon" href="../../img/logo.ico">
    </head>
    <body>

      <?php
      //abrir sesion
      session_start();

      if (isset($_SESSION["admin"])) {
        echo "<h1>Modificar</h1>";
      $ped = $_GET['id'];
      include_once("../../connection.php");

        if ($result = $connection->query("SELECT * from pedido inner join contiene on contiene.id_pedido=pedido.id_pedido
          inner join chuches on contiene.id_chuche=chuches.id_chuche
            where pedido.id_pedido='$ped';")) {

        $obj = $result->fetch_object();

        echo"<div id='h'>";
        echo "<form method='post'>";
        echo"<div id='i'>";
        echo "<span>Cantidad:</span><input name='cantidad' value='$obj->cantidad' pattern='[0-9]{1,6}[.]{0,1}[0-9]{0,2}' title='Solo numeros y con punto(ej: 1.55)' required/><br><br>";



        $result2 = $connection->query("SELECT * FROM chuches");

        echo "<span>Chuche:</span><select name='chu' required><br><br>";

        while ($obj2=$result2->fetch_object()) {
          if($obj2->nombre_chu == $obj->nombre_chu){
                  echo "<option selected>";
                  echo $obj2->nombre_chu;
                  echo "</option>";
            }else{
              echo "<option>";
              echo $obj2->nombre_chu;
              echo "</option>";
            }

        }
               echo"</select>";
               $chu=$_POST['chu'];
               $result3 = $connection->query("SELECT id_chuche FROM `chuches` WHERE `nombre_chu` = '$chu';");
               $obj3=$result3->fetch_object();
               $idchu= $obj3->id_chuche;

              $result4=$connection->query("SELECT * FROM chuches WHERE chuches.id_chuche = '$idchu';");
              $obj4=$result4->fetch_object();
              $precio= $obj4->precio;


               echo "<span>Precio total:</span>".$obj->precio_total."<br><br>";
               echo "<span>Pago:</span><select name='pago' required><br><br>";
               if (!empty($obj->pago)){
                 echo "<option>Pagado</option>";
                 echo "<option>Sin pagar</option>";
               }else{
                 echo "<option>Sin pagar</option>";
                 echo "<option>Pagado</option>";
               }

               echo"</select>";

        echo"</div>";
        echo "<button name='edit'>Modificar</button>";
        echo"</div>";
        echo"</form>";
        echo "<br><a href='pedido.php?apo=$obj->apodo'>Atras</a>";


      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }


      if (isset($_POST['edit'])) {
        //variables

        $cantidad=$_POST['cantidad'];

        $pago=$_POST['pago'];
        $total=(floatval($cantidad)*floatval($precio));




        //consulta
        $consulta="UPDATE `pedido` SET
        `precio_total` = '$total',
        `pago` = '$pago'
        WHERE  `pedido`.`id_pedido` = '$ped';";

        $consulta1="UPDATE `contiene` SET
        `cantidad` = '$cantidad',
        `id_chuche` = '$idchu'
        WHERE  `contiene`.`id_pedido` = '$ped';";


        // echo $consulta;
        if ($result = $connection->query($consulta)){

          if ($result1 = $connection->query($consulta1)){

            header ("Location: pedido.php?apo=$obj->apodo");

          } else {
                echo "Error: " . $result . "<br>" . mysqli_error($connection);
            }
        } else {
              echo "Error: " . $result . "<br>" . mysqli_error($connection);
          }
      }


    } else {
      session_destroy();
      header("Location: ../../login.php");
    }
    ?>
    </body>
</html>
