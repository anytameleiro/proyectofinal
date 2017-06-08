<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="formulario.css">
  <link rel="shortcut icon" href="../img/logo.ico">
  <title>Contraseña</title>


</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["admin"])) {

    echo "<h1>Cambiar contraseña</h1>";

  include_once("../connection.php");

    echo"<div id='h'>";
    echo "<form method='post'>";
      echo"<div id='i'>";
  echo"
  <span>Contraseña actual:</span><input type='password' name='actual' placeholder='contraseña' maxlength='64' required/><br>";

  echo"<span>Contraseña nueva:</span><input type='password' name='contnuevo1' placeholder='contraseña' maxlength='64' required/><br>
  <span>Repita la contraseña nueva:</span><input type='password' name='contnuevo2' placeholder='contraseña' maxlength='64' required/><br>";
echo"</div>";
  echo "<button name='edit'>Modificar</button>";


    echo"</div>";
  echo"</form>";
  echo "<br><a href='admin.php'>Atras</a>";

    //MAKING A SELECT QUERY

    $consulta="SELECT contrasenia from cliente where apodo='admin'";
    $result = $connection->query($consulta);
    $obj = $result->fetch_object();

    if (isset($_POST['edit'])) {


      $cont2=md5($_POST['actual']);
      $contnu=md5($_POST['contnuevo1']);
      $contnu2=md5($_POST['contnuevo2']);



    if ($obj->contrasenia==$cont2){

      if ($contnu==$contnu2){
        $consulta="UPDATE `cliente` SET `contrasenia` = '$contnu2'
        WHERE  `cliente`.`apodo` = 'admin';";

        if ($result = $connection->query($consulta)){

          echo "<script>
          alert ('Contraseña cambiada')
          var pag='admin.php'
          function redireccionar1(){
            location.href=pag;
          }
          setTimeout('redireccionar1()',5);
          </script>";
        } else {
              echo "Error: " . $result . "<br>" . mysqli_error($connection);
          }

        }else {
          echo "<script>
          alert ('Contraseña nueva no coincide')
          var pag='cambia.php'
          function redireccionar1(){
            location.href=pag;
          }
          setTimeout('redireccionar1()',5);
          </script>";

        }

      }else {
          echo "<script>
          alert ('Contraseña actual incorrecta')
          var pag='cambia.php'
          function redireccionar1(){
            location.href=pag;
          }
          setTimeout('redireccionar1()',5);
          </script>";

      }

}
unset($connection);




  } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>
</body>
</html>
