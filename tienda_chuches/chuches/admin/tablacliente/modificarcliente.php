<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar cliente</title>
      <link rel="stylesheet" type="text/css" href="../formulario.css">
      <link rel="shortcut icon" href="../../img/logo.ico">
    </head>
    <body>

      <?php
      //abrir sesion
      session_start();

      if (isset($_SESSION["admin"])) {
        echo "<h1>Modificar</h1>";
      $apo = $_GET['apo'];
      include_once("../../connection.php");

        if ($result = $connection->query("SELECT * from cliente where apodo ='$apo';")) {
          if ($apo =='admin') {

            $obj = $result->fetch_object();
            echo"<div id='h'>";
            echo "<form method='post'>";
              echo"<div id='i'>";
              echo "<span>Apodo:</span>".$obj->apodo."<br><br>";
              echo "<span>Nombre:</span><input maxlength='50' name='nom' value='$obj->nombre' required/><br><br>";
              echo "<span>Apellidos:</span><input maxlength='50' name='ape' value='$obj->apellidos' /><br><br>";
              echo "<span>Direccion:</span><input maxlength='50' name='direc' value='$obj->direccion' /><br><br>";
              echo "<span>Email:</span><input maxlength='50' name='email' value='$obj->email'/><br><br>";
              echo "<span>Telefono:</span><input maxlength='9' name='tel' value='$obj->telefono'/><br><br>";
              echo"</div>";
              echo "<button name='modi'>Modificar</button>";
              echo"</div>";
              echo"</form>";
              echo "<br><a href='cliente.php'>Atras</a>";
            }else{

        $obj = $result->fetch_object();

        echo"<div id='h'>";
        echo "<form method='post'>";
        echo"<div id='i'>";
        echo "<span>Nombre:</span><input maxlength='50' name='nom' value='$obj->nombre' required/><br><br>";
        echo "<span>Apellidos:</span><input maxlength='50' name='ape' value='$obj->apellidos'/><br><br>";
        echo "<span>Direccion:</span><input maxlength='50' name='direc' value='$obj->direccion' required/><br><br>";
        echo "<span>Apodo:</span><input maxlength='25' name='apodo' value='$obj->apodo' required/><br><br>";
        echo "<span>Email:</span><input maxlength='50' name='email' value='$obj->email'/><br><br>";
        echo "<span>Telefono:</span><input maxlength='9'  pattern='[0-9]{9}' name='tel' value='$obj->telefono' required/><br><br>";

        echo"</div>";
        echo "<button name='edit'>Modificar</button>";
        echo"</div>";
        echo"</form>";
        echo "<br><a href='cliente.php'>Atras</a>";
        }

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
        `telefono` = '$tel'
        WHERE  `cliente`.`apodo` = '$apo';";
        $result = $connection->query($consulta);

        // echo $consulta;
        if (!$result) {
          echo "<script>
          alert ('Este apodo ya existe, escriba otro')
          var pag='modificarcliente.php?apo=$apo'
          function redireccionar2(){
            location.href=pag;
          }
          setTimeout('redireccionar2()',5);
          </script>";
        }else {
              header ("Location: cliente.php");
          }


      }

      if (isset($_POST['modi'])) {


        //variables

        $nombre=$_POST['nom'];
        $apellido=$_POST['ape'];
        $direccion=$_POST['direc'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        //consulta
        $consulta="UPDATE `cliente` SET


        `nombre` = '$nombre',
        `apellidos` = '$apellido',
        `direccion` = '$direccion',
        `email` = '$email',
        `telefono` = '$tel'
        WHERE  `cliente`.`apodo` = '$apo';";

        // echo $consulta;
        if ($result = $connection->query($consulta)){
          header ("Location: cliente.php");
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
