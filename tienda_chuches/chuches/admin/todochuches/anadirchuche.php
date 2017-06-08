<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir chuche</title>
    <link rel="stylesheet" type="text/css" href="../formulario.css">
      <link rel="shortcut icon" href="../../img/logo.ico">
    <style>
      span {
        width: 100px;
        display: inline-block;
        margin-bottom: 11px;
      }
    </style>
  </head>
  <body>
      <?php
      //abrir sesion
      session_start();

      if (isset($_SESSION["admin"])) {
          echo "<h1>Añadir</h1>";

		if (!isset($_POST["nom"])) : ?>
    <div id='h'>
        <form method="post" enctype='multipart/form-data'>
          <div id='i'>
            <span>Nombre:</span> <input type='text' maxlength='50' name="nom"  placeholder='Nombre' required/><br><br>
            <span id='d'>Descripcion:</span> <textarea rows='10' cols='35' maxlength='500'  name="descripcion" placeholder='Descripcion' required></textarea><br><br>
            <span>Imagen:</span><input type='file' name="image" required /><br><br>
            <span>Precio:</span> <input type='text' name="precio" pattern='[0-9]{1,6}[.]{0,1}[0-9]{0,2}' title='Solo numeros y con punto(ej: 1.55)'  placeholder='precio' required><br>

<?php

  include_once("../../connection.php");

$result2 = $connection->query("SELECT * FROM categoria");
//
echo "<span>Categoria:</span><select name='cat' required>";
while ($obj2=$result2->fetch_object()) {
          echo "<option value='$obj2->nombre_cat'>";
          echo $obj2->nombre_cat;
          echo "</option>";
}
       echo"</select>";


?>
            </div>
	          <button name="send">Enviar</button><br>
            </div>
            </form>
            <?php
            echo"<br><a href='chuches.php'>Atras</a>";
             ?>


         <?php else: ?>



  <?php
  if (isset($_POST['send'])) {
      include_once("../../connection.php");
    $cat=$_POST['cat'];

    $res = $connection->query("SELECT * FROM `categoria` WHERE `nombre_cat` = '$cat';");
    // var_dump($res);
    $obj3=$res->fetch_object();
    $categoria= $obj3->id_categoria;

    $nom=$_POST['nom'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];

    $tmp_file = $_FILES['image']['tmp_name'];
          //directorio donde se guarda la imagen
          $target_dir = "../../imgchu/";
          //nombre de imagen.
          $target_file = strtolower($target_dir . basename($_FILES['image']['name']));
          //Can we upload the file
           $valid= true;
          //si existe el nombre de la imagen

    if (file_exists("$target_file")) {

      echo "<script>;
        alert ('La imagen ya existe');
        var pag='añadirchuche.php'
        function redireccionar(){
          location.href=pag;
        }
        setTimeout('redireccionar()',5);
        </script>";

      $valid = false;
    }
    //Check the size of the file. Up to 2Mb
    if ($_FILES['image']['size'] > (2048000)) {
      $valid = false;

      echo "<script>;
        alert ('Oops! la imagen pesa mucho');
        var pag='añadirchuche.php'
        function redireccionar(){
          location.href=pag;
        }
        setTimeout('redireccionar()',5);
        </script>";
    }
    //Check the file extension: We need an image not any other different type of file
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
    if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" ) {
      $valid = false;
      echo "<script>;
        alert ('Solo imagenes JPG, JPEG, PNG');
        var pag='añadirchuche.php'
        function redireccionar(){
          location.href=pag;
        }
        setTimeout('redireccionar()',5);
        </script>";
    }
    if ($valid) {
      //Put the file in its place

      move_uploaded_file($tmp_file, $target_file);
      $consulta= "INSERT INTO `chuches` (`id_chuche`, `id_categoria`, `nombre_chu`, `descripcion`, `img_chu`, `precio`)
      VALUES (NULL, '$categoria', '$nom', '$descripcion', '$target_file', '$precio');";
      $result = $connection->query($consulta);

      if (!$result) {
      echo "Error: " . $result . "<br>" . mysqli_error($connection);

            } else {

                header ("Location: chuches.php");
              }
    }

  }
   ?>

<?php endif ?>

        <?php


    } else {
      session_destroy();
      header("Location: ../../login.php");
    }
    ?>

  </body>
</html>
