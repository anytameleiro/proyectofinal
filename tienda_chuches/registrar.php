<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="shortcut icon" href="img/logo.ico">

  </head>
  <body>


      <?php	if (!isset($_POST["apodo"])) : ?>

        <form method="post" enctype='multipart/form-data'>
          <div class="login1">
            <div id="login2">


                <h2><u>Registrar</u></h2>

                <span>Apodo:</span><input type="text" name="apodo" placeholder="apodo" maxlength='25'required><br>
                <span>Nombre:</span><input type="text" name="nombre" placeholder="nombre" maxlength='50' required><br>
                <span>Apellidos:</span><input type="text" name="apellidos" placeholder="apellidos" maxlength='50' ><br>
                <span>Contraseña:</span><input type="password" name="contrasenia" placeholder="contraseña" maxlength='64' required><br>
                <span>Repita la contraseña:</span><input type="password" name="cont2" placeholder="contraseña"maxlength='64' required><br>
                <span>Email:</span><input type="email" name="email" placeholder="email" maxlength='50' ><br>
                <span>Direccion:</span><input type="text" name="direccion" placeholder="direccion" maxlength='50'required><br>
                <span>Telefono:</span><input type="text" name="tel" placeholder="telefono" maxlength='9'  pattern='[0-9]{9}' title='Solo numeros' requiered><br>
    	          <input id="entrar" type="submit" value="Enviar" name="send">
                <p class="mensage"> <a href="login.php">Atras</a></p>

            </div>
	         </div>
         </form>
      <?php else: ?>

      <?php
      include_once("connection.php");
  ?>

  <?php

    $apodo=$_POST['apodo'];
    $nom=$_POST['nombre'];
    $ape=$_POST['apellidos'];
    $cont=$_POST['contrasenia'];
    $cont2=$_POST['cont2'];
    $email=$_POST['email'];
    $dir=$_POST['direccion'];
    $tel=$_POST['tel'];


    if ($cont==$cont2){
            $consulta= "INSERT INTO cliente VALUES('$nom','$ape','$dir','$apodo','$email',MD5('$cont'),'$tel');";
            $result = $connection->query($consulta);
            if (!$result) {
              echo "<script>
              alert ('Este apodo ya existe, escriba otro')
              var pag='registrar.php'
              function redireccionar2(){
                location.href=pag;
              }
              setTimeout('redireccionar2()',5);
              </script>";
            } else {
              $_SESSION["user"]=$apodo;
              $_SESSION["language"]="es";
              var_dump($apodo);
              echo "<script>;
                alert ('Usuario registrado, bienvenid@ $nom');
                var pag='login.php'
                function redireccionar(){
                  location.href=pag;
                }
                setTimeout('redireccionar()',5);
                </script>";

            }


      }else {
          echo "<script>
          alert ('Las contraseñas no coinciden')
          var pag='registrar.php'
          function redireccionar1(){
            location.href=pag;
          }
          setTimeout('redireccionar1()',5);
          </script>";

      }
   ?>

<?php endif ?>

  </body>
</html>
