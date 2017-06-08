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

    echo"<div id='h'>";
    echo "<form method='post' enctype='multipart/form-data'>";
      echo"<div id='i'>";

      echo"<span>Imagen:</span><input type='file' name='image' required /><br><br>";

      echo"</div>";
              echo "<button name='edit'>Modificar</button>";
              echo"</div>";
              echo"</form>";
              include_once("../../connection.php");

              $result3 = $connection->query("SELECT * from chuches where id_chuche = '$id';");
              $obj3 = $result3->fetch_object();
                echo "<br><a href='chuches.php?idcat=$obj3->id_categoria'>Atras</a>";

              if (isset($_POST['edit'])) {

                $result = $connection->query("SELECT * from chuches where id_chuche = '$id';");
                  $obj = $result->fetch_object();
                  $imagen=$obj->img_chu;

                $tmp_file = $_FILES['image']['tmp_name'];
                //directorio donde se guarda la imagen
                $target_dir = "../../imgchu/";
                //nombre de imagen.
                $target_file = strtolower($target_dir . basename($_FILES['image']['name']));


                //Can we upload the file
                 $valid= true;


                     unlink($imagen);
                     $con= "UPDATE `chuches` SET `img_chu` = '' WHERE `chuches`.`id_chuche` = $id;";
                    $resul = $connection->query($con);

                 //Check the size of the file. Up to 2Mb
                 if ($_FILES['image']['size'] > (2048000)) {
                   $valid = false;
                   echo "<script>;
                     alert ('Oops! la imagen pesa mucho');
                     var pag='modificarimg.php?id=$id'
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
                     var pag='modificarimg.php?id=$id'
                     function redireccionar(){
                       location.href=pag;
                     }
                     setTimeout('redireccionar()',5);
                     </script>";
                 }


                 if ($valid) {


                     move_uploaded_file($tmp_file, $target_file);
                       $consulta= "UPDATE `chuches` SET
                       `img_chu` = '$target_file'
                       WHERE  `chuches`.`id_chuche` = '$id';";
                       $resu = $connection->query($consulta);


                       if (!$result) {
                       echo "Error: " . $result . "<br>" . mysqli_error($connection);

                             } else {

                      header ("Location: chuches.php?idcat=".$obj->id_categoria);
                    }
              }
            }



  } else {
          session_destroy();
          header("Location: ../../login.php");
            }
    ?>
  </body>
</html>
