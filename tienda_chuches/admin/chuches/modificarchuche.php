<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar chuche</title>
    <link rel="stylesheet" type="text/css" href="../formulario.css">
    <link rel="shortcut icon" href="../../img/logo.ico">
    </head>
    <body>

      <?php
      //abrir sesion
      session_start();

      if (isset($_SESSION["admin"])) {
        echo "<h1>Modificar</h1>";
      $id = $_GET['id'];
      include_once("../../connection.php");

      if ($result = $connection->query("SELECT c.*, ca.nombre_cat from chuches c join categoria ca on c.id_categoria=ca.id_categoria
        where c.id_chuche = '$id';")) {

        $obj = $result->fetch_object();
        echo"<div id='h'>";
        echo "<form method='post'>";
          echo"<div id='i'>";
        echo "<span>Id:</span>".$obj->id_chuche ."<br><br>";

        echo "<span>Nombre:</span><input maxlength='50' name='nombre' value='$obj->nombre_chu' required/><br><br>";

        echo "<span id='d'>Descripcion:</span><textarea rows='10' cols='35' maxlength='500' name='desc'>".$obj->descripcion."</textarea><br><br>";

        echo "<span>Precio:</span><input name='precio' value='$obj->precio' pattern='[0-9]{1,6}[.]{0,1}[0-9]{0,2}' title='Solo numeros y con punto(ej: 1.55)' required /><br><br>";

        $result2 = $connection->query("SELECT * FROM categoria");

        echo "<span>Categoria:</span><select name='cat' required><br><br>";

        while ($obj2=$result2->fetch_object()) {
          if($obj2->nombre_cat == $obj->nombre_cat){
                  echo "<option selected>";
                  echo $obj2->nombre_cat;
                  echo "</option>";
            }else{
              echo "<option>";
              echo $obj2->nombre_cat;
              echo "</option>";
            }
        }
               echo"</select>";
               $cat=$_POST['cat'];
               $result3 = $connection->query("SELECT id_categoria FROM `categoria` WHERE `nombre_cat` = '$cat';");
               $obj3=$result3->fetch_object();
               $categoria= $obj3->id_categoria;



  echo"</div>";
          echo "<button name='edit'>Modificar</button>";
          echo"</div>";
        echo"</form>";
        echo "<br><a href='chuches.php?idcat=$obj->id_categoria'>Atras</a>";

      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }


      if (isset($_POST['edit'])) {

        //variables
        $nombre=$_POST['nombre'];
        $desc=$_POST['desc'];
        $precio=$_POST['precio'];

        //consulta
        $consulta="UPDATE `chuches` SET

        `nombre_chu` =  '$nombre',
        `descripcion` =  '$desc',
        `precio` =  '$precio',
        `id_categoria`='$categoria'


        WHERE  `chuches`.`id_chuche` = '$id';";



        if ($result = $connection->query($consulta)){
          header ("Location: chuches.php?idcat=".$obj->id_categoria);
        } else {
              echo "Error: " . $result . "<br>" . mysqli_error($connection);
          }
      }
      unset($connection);


    } else {
      session_destroy();
      header("Location: ../../login.php");
    }
    ?>
    </body>
</html>
