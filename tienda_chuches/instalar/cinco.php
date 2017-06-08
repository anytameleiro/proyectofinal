<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
    <link rel="stylesheet" type="text/css" href="../chuches/admin/formulario.css">
    <link rel="shortcut icon" href="img/logo.ico">
      <style>
          b{
              font-size: 12px;
              margin-left: 5px;
          }
      </style>
  </head>
  <body>


      <?php	if (!isset($_POST["nombre"])) : ?>
      <div id='h'>
        <form method="post" enctype='multipart/form-data'>
          
             <div id='i'>
               <h1>Crear Administrador</h1>

                <span>Nombre:</span><input type="text" name="nombre" placeholder="nombre" maxlength='50' required><b>El apodo de administrador será admin</b><br>
                <span>Apellidos:</span><input type="text" name="apellidos" placeholder="apellidos" maxlength='50' ><br>
                <span>Contraseña:</span><input type="password" name="contrasenia" placeholder="contraseña" maxlength='64' required><br>
                <span>Repita la contraseña:</span><input type="password" name="cont2" placeholder="contraseña"maxlength='64' required><br>
                <span>Email:</span><input type="email" name="email" placeholder="email" maxlength='50' required><br>
                <span>Direccion:</span><input type="text" name="direccion" placeholder="direccion" maxlength='50'required><br>
                <span>Telefono:</span><input type="text" name="tel" placeholder="telefono" maxlength='9'  pattern='[0-9]{9}' title='Solo numeros' requiered><br>
                
    	          <input id="entrar" type="submit" value="Enviar" name="send">
                <p class="mensage"> <a href="login.php">Atras</a></p>
                
            </div>
         </form>
      </div>
      <?php else: ?>

    
      
 
  <?php
      include_once("../chuches/connection.php");
      
    $nom=$_POST['nombre'];
    $ape=$_POST['apellidos'];
    $cont=$_POST['contrasenia'];
    $cont2=$_POST['cont2'];
    $email=$_POST['email'];
    $dir=$_POST['direccion'];
    $tel=$_POST['tel'];


    if ($cont==$cont2){
            $consulta= "INSERT INTO cliente VALUES('$nom','$ape','$dir','admin','$email',MD5('$cont'),'$tel','0');";
            $result = $connection->query($consulta);
            if (!$result) {
               echo "Error: ". $result."<br>". mysqli_error($connection);
            } else {
              $_SESSION["user"]=admin;
              $_SESSION["language"]="es";
              echo "<script>;
                alert ('Administrador agregado');
                var pag='../chuches'
                function redireccionar(){
                  location.href=pag;
                }
                setTimeout('redireccionar()',5);
                </script>";

            }


      }else {
          echo "<script>
          alert ('Las contraseñas no coinciden')
          var pag='cinco.php'
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