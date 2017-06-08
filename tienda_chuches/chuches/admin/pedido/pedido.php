<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../estilotabla.css">
    <link rel="shortcut icon" href="../../img/logo.ico">
  <title>Tabla pedidos</title>
  <style>


      img{
          width: 55px;
      }

      </style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["admin"])) {
$apo = $_GET['apo'];
    ?>
    <a id="salir" href='../../salir.php' >Cerrar sesion</a>
    <h1>Tabla pedidos</h1>
    <?php
      include_once("../../connection.php");

     $consulta="SELECT * from pedido inner join
      cliente on cliente.apodo=pedido.apodo
      inner join contiene on contiene.id_pedido=pedido.id_pedido
        inner join chuches on contiene.id_chuche=chuches.id_chuche
        where cliente.apodo='$apo' ORDER BY pedido.apodo;";

     ?>
    <div class="titulo">
        <table >
       <tr>

         <th>Nombre</th>
         <th>Direccion</th>
         <th>Email</th>
         <th>Fecha</th>
         <th>Chuche</th>
         <th>Cantidad</th>
         <th>Precio total</th>
         <th>Pago</th>
         <th>Modificar</th>
         <th>Borrar</th>
       </tr>

     </table>
    </div>
    <div class="contenido">
    <table>
      <tbody>

    <?php

      //Consulta.
      if ($result = $connection->query($consulta)) {
        while($obj = $result->fetch_object()) {

                echo "<tr>";
                echo "<td>".$obj->nombre."</td>";
                echo "<td>".$obj->direccion."</td>";
                echo "<td>".$obj->email."</td>";
                echo "<td>".$obj->fecha."</td>";
                echo "<td>".$obj->nombre_chu."</td>";
                echo "<td>".$obj->cantidad."</td>";
                echo "<td>".$obj->precio_total." € </td>";
                if (!empty($obj->pago)){
                  echo "<td>".$obj->pago."</td>";
                }else{
                  echo "<td><span>Sin pagar</span></td>";
                }

                //modificar
                echo "<td>
                      <a href='modificarpedido.php?id=$obj->id_pedido'/>
                      <img src='../img/modificar.png'/></a>
                      </td>";
                //Borrar.
                echo "<td>
                      <a href='borrarpedido.php?id=$obj->id_pedido'>
                      <img src='../img/papelera.png'/></a>
                    </td>";
                echo "</tr>";
           }
      } else {

            echo "Error: ". $sql ."<br>". mysqli_error($connection);
      }


      //Introducir los datos en la tabla.


          //Cerrar la conexion.
          $result->close();
          unset($obj);
          unset($connection);
          ?>

        </tbody>
         </table>
       </div>

    <?php


    echo "<br><a class='atras' href='../tablacliente/cliente.php'>Atras</a>";
  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
