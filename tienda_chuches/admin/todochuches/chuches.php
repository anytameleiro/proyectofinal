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
  <title>Todas las chuches</title>
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
    <h1>Todas las chuches</h1>

<div class="titulo">
      <table>
       <tr>
         <th>Categoria</th>
         <th>Nombre</th>
         <th>Descripcion</th>
         <th>precio</th>
         <th>Imagen</th>
         <th>Modificar</th>
         <th>Cambiar imagen</th>
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
      if ($result = $connection->query("SELECT * from chuches inner join
     categoria on categoria.id_categoria=chuches.id_categoria ORDER BY chuches.nombre_chu;")) {
      } else {

            echo "Error: ". $sql ."<br>". mysqli_error($connection);
      }
      //Introducir los datos en la tabla.
      while($obj = $result->fetch_object()) {
            $hola=$obj->descripcion;
              echo "<tr>";
              echo "<td>".$obj->nombre_cat."</td>";
              echo "<td>".$obj->nombre_chu."</td>";
              $stringDisplay=substr(strip_tags($hola),0,100);
              if(strlen(strip_tags($hola))>100){
                $stringDisplay.='...';
              }
              echo "<td>".$stringDisplay."</td>";
              echo "<td>".$obj->precio." € </td>";
              if (!empty($obj->img_chu)){
                echo '<td><img src="'.$obj->img_chu.'"/></td>';
              }else{
                echo "<td><span>Sin Imagen</span></td>";
              }

              //modificar
              echo "<td>
                    <a href='modificarchuche.php?id=$obj->id_chuche'/>
                    <img src='../img/modificar.png'/></a>
                    </td>";

                    //modificar
                    echo "<td>
                          <a href='modificarimg.php?id=$obj->id_chuche'/>
                          <img src='../img/img.png'/></a>
                          </td>";
              //Borrar.
              echo "<td>
                    <a href='borrarchuche.php?id=$obj->id_chuche'>
                    <img src='../img/papelera.png'/></a>
                    </td>";


         }
    echo "</tr>";

          ?>

        </tbody>
         </table>
       </div>

    <?php

    echo "<br><a href='anadirchuche.php'><input  id='entrar' type='submit' value='+ Añadir' /></a><br>";

    echo "<br><a class='atras' href='../admin.php'>Atras</a>";

    //Cerrar la conexion.
    $result->close();
    unset($obj);
    unset($connection);

  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
