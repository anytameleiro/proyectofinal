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
  <title>Tabla cliente</title>
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

    ?>
    <a id="salir" href='../../salir.php' >Cerrar sesion</a>
    <h1>Tabla clientes</h1>
    <div class="titulo">
        <table >
       <tr>

         <th>Nombre</th>
         <th>Apellidos</th>
         <th>Direccion</th>
         <th>Apodo</th>
         <th>Email</th>
         <th>Telefono</th>
         <th>Modificar</th>
         <th>Borrar</th>
       </tr>

     </table>
    </div>
    <div class="contenido">
    <table>
      <tbody>

    <?php
       include_once("../../connection.php");
      //Consulta.
      if ($result = $connection->query("SELECT * FROM cliente ORDER BY nombre;")) {
      } else {

            echo "Error: ". $sql ."<br>". mysqli_error($connection);
      }
      //Introducir los datos en la tabla.
      while($obj = $result->fetch_object()) {

        echo "<tr>";
        echo "<td><a href='../pedido/pedido.php?apo=$obj->apodo'>".$obj->nombre."</a></td>";
        echo "<td><a href='../pedido/pedido.php?apo=$obj->apodo'>".$obj->apellidos."</a></td>";
        echo "<td><a href='../pedido/pedido.php?apo=$obj->apodo'>".$obj->direccion."</a></td>";
        echo "<td><a href='../pedido/pedido.php?apo=$obj->apodo'>".$obj->apodo."</a></td>";
        echo "<td><a href='../pedido/pedido.php?apo=$obj->apodo'>".$obj->email."</a></td>";
        echo "<td><a href='../pedido/pedido.php?apo=$obj->apodo'>".$obj->telefono."</a></td>";
              //modificar
              echo "<td>
                    <a href='modificarcliente.php?apo=$obj->apodo'/>
                    <img src='../img/modificar.png'/></a>
                    </td>";
                    //Borrar.
                    echo "<td>
                          <a href='borrarcliente.php?apo=$obj->apodo'>
                          <img src='../img/papelera.png'/></a>
                          </td>";
                    echo "</tr>";

         }

          //Cerrar la conexion.
          $result->close();
          unset($obj);
          unset($connection);
          ?>

        </tbody>
         </table>
       </div>

    <?php

    echo "<br><a class='atras' href='../admin.php'>Atras</a>";
  } else {
    session_destroy();
    header("Location: ../../login.php");
  }

 ?>
</body>
</html>
