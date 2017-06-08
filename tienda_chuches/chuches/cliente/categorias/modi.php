<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar chuche</title>
    <link rel="stylesheet" type="text/css" href="../menu.css">
    <link rel="stylesheet" type="text/css" href="categoria.css">
      <link rel="shortcut icon" href="../../img/logo.ico">
    <title>TODO CHUCHES</title>
      <style>
      body{
          min-width: 796px;
      }
</style>
    </head>
    <body>

      <?php
      //abrir sesion
      session_start();

      if (isset($_SESSION["user"])) {
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
        echo "<h1>Modificar perfil</h1>";

      $apo = $_GET['apo'];
        if ($result2 = $connection->query("SELECT * from cliente where apodo ='$apo';")) {

        $obj = $result2->fetch_object();

        echo"<div id='h'>";
        echo "<form method='post'>";
          echo"<div id='i'>";
        echo "<span>Nombre:</span><input maxlength='50' name='nom' value='$obj->nombre' required/><br><br>";
        echo "<span>Apellidos:</span><input maxlength='50' name='ape' value='$obj->apellidos'/><br><br>";
        echo "<span>Direccion:</span><input maxlength='50' name='direc' value='$obj->direccion' required/><br><br>";
        echo "<span>Apodo:</span><input maxlength='25' name='apodo' value='$obj->apodo' required/><br><br>";
        echo "<span>Email:</span><input maxlength='50' name='email' value='$obj->email'/><br><br>";
        echo "<span>Telefono:</span><input maxlength='9'  pattern='[0-9]{9}' name='tel' value='$obj->telefono' title='Solo numeros' required/><br><br>";


        echo"</div>";
        echo "<button name='edit'>Modificar</button>";
        echo"</div>";
        echo"</form>";
        echo"</div>";
      echo"</td>";

    echo"</table>";
    echo" </div>";
      echo" </div>";


      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }


      if (isset($_POST['edit'])) {


        //variables

        $nombre=$_POST['nom'];
        $apellido=$_POST['ape'];
        $direccion=$_POST['direc'];
        $apodo=$_POST['apodo'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        //consulta
        $consulta="UPDATE `cliente` SET


        `nombre` = '$nombre',
        `apellidos` = '$apellido',
        `direccion` = '$direccion',
        `apodo` = '$apodo',
        `email` = '$email',
        `telefono` ='$tel'
        WHERE  `cliente`.`apodo` = '$apo';";

        $result = $connection->query($consulta);
        // echo $consulta;
        if (!$result) {
          echo "<script>
          alert ('Este apodo ya existe, escriba otro')
          var pag='modi.php?apo=$apo'
          function redireccionar2(){
            location.href=pag;
          }
          setTimeout('redireccionar2()',5);
          </script>";
        }else {
                header ("Location: perfil.php");
          }

      }
include_once("../info.php");

      unset($connection);


    } else {
      session_destroy();
      header("Location: ../../login.php");
    }
    ?>
    </body>
</html>
