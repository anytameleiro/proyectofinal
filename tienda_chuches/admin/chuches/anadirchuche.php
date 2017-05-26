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
        $id = $_GET['idcat'];
		if (!isset($_POST["nom"])) : ?>
    <div id='h'>
        <form method="post" enctype='multipart/form-data'>
          <div id='i'>
            <span>Nombre:</span> <input type='text' maxlength='50' name="nom"  placeholder='Nombre' required/><br><br>
            <span id='d'>Descripcion:</span> <textarea rows='10' cols='35' maxlength='500'  name="descripcion" placeholder='Descripcion'required></textarea><br><br>
            <span>Imagen:</span><input type='file' name="image" required /><br><br>
            <span>Precio:</span> <input type='text' name="precio" pattern='[0-9]{1,6}[.]{0,1}[0-9]{0,2}' title='Solo numeros y con punto(ej: 1.55)'  placeholder='precio' required><br>
            </div>

	          <button name="send">Enviar</button><br>
            </div>
            </form>
            <?php
            echo"<br><a href='chuches.php?idcat=$id'>Atras</a>";
             ?>


         <?php else: ?>

      <?php
        //var_dump($_POST);
        include_once("../../connection.php");
  ?>

  <?php
  if (isset($_POST['send'])) {
    $categoria = $_GET['idcat'];
    $nom=$_POST['nom'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    $tmp_file = $_FILES['image']['tmp_name'];
    $target_dir = "../../imgchu/";
    foreach ($_FILES as $key => $value) {
      foreach ($value as $key2 => $value2) {
        if ($key2 == name ) {
          $nombre = $value2;
        }
      }
    }
    $target_file = strtolower($target_dir . basename($nombre));
    //Can we upload the file

    //var_dump($target_file);
    $valid= true;
    //Check if the file already exists
    if (file_exists("$target_file")) {
      echo "<br><br><h4>La imagen ya existe</h4><br><br>";
      echo "<script>";
      echo "alert ('La imagen ya existe')";
      echo "</script>";
        echo"<br><a href='añadirchuche.php?idcat=$id'>Atras</a>";
          $valid = false;
    }
    //Check the size of the file. Up to 2Mb
    if ($_FILES['image']['size'] > (2048000)) {
      $valid = false;

      echo "<br><br><h4>Oops! la imagen es muy grande</h4><br><br>";
      echo "<script>";
      echo "alert ('Oops! la imagen es muy grande')";
      echo "</script>";
        echo"<br><a href='añadirchuche.php?idcat=$id'>Atras</a>";

    }
    //Check the file extension: We need an image not any other different type of file
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
    if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" ) {
      $valid = false;

      echo "<br><br><h4>Solo imagenes JPG, JPEG, PNG</h4><br><br>";
      echo "<script>";
      echo "alert ('Solo imagenes JPG, JPEG, PNG')";
      echo "</script>";
        echo"<br><a href='añadirchuche.php?idcat=$id'>Atras</a>";
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

     header ("Location: chuches.php?idcat=".$categoria);
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
