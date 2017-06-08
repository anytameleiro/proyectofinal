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
  <title>Tabla categoria</title>

</head>
<style>


    img{
        width: 55px;
    }

    </style>
<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["admin"])) {

    ?>
    <a id="salir" href='../../salir.php' >Cerrar sesion</a>
    <h1>Tabla categoria</h1>
    <div class="titulo">
        <table >
       <tr>
         <th>Id categoria</th>
         <th>Nombre</th>
         <th>Modificar</th>
       </tr>

     </table>
    </div>
    <div class="contenido">
    <table>
      <tbody>

    <?php
     include_once("../../connection.php");
      //Consulta.
      if ($result = $connection->query("SELECT * FROM categoria;")) {

      //Introducir los datos en la tabla.
      while($obj = $result->fetch_object()) {

              echo "<tr>";
              echo "<td><a href='../chuches/chuches.php?idcat=$obj->id_categoria'>".$obj->id_categoria."</a></td>";//mostrar tabla Chuches
              echo "<td><a href='../chuches/chuches.php?idcat=$obj->id_categoria'>".$obj->nombre_cat."</a></td>";//mostrar tabla Chuches

              //modificar
              echo "<td>
                    <a href='modificarcat.php?idcat=$obj->id_categoria'/>
                    <img src='../img/modificar.png'/></a>
                    </td>";
              echo "</tr>";
         }

          //Cerrar la conexion.
          $result->close();
          unset($obj);
          unset($connection);
        } else {

              echo "Error: ". $sql ."<br>". mysqli_error($connection);
        }
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

//<div style='height:100%;width:100%'>
 ?>
</body>
</html>
