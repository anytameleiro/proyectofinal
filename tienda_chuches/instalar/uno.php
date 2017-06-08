<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
    <link rel="stylesheet" type="text/css" href="../chuches/admin/formulario.css">
       <link rel="shortcut icon" href="../chuches/img/logo.ico">
    </head>
    <body>


      <?php
		if (!isset($_POST["nombre"])) : ?>
      <div id='h'>
      <form method="post" enctype='multipart/form-data'>
        <div id='i'>

            <h1>Introduce los datos</h1>
            
          <span>Direccion IP:</span><input type="text" name="ip" required><br>
          <span>Nombre de BBDD:</span><input type="text" name="nombre" required><br>
          <span>Usuario de BBDD:</span><input type="text" name="user" required><br>
          <span>Contraseña de DDBB:</span><input type="password" name="contrasenia" ><br>

           </div>
         <input type="submit" value="Enviar" name="send">
          
        </form>
        </div>
     <?php else: ?>

      <?php
      $user=$_POST["user"];
      $ip=$_POST["ip"];
      $nombre=$_POST["nombre"];
      $contrasenia=$_POST["contrasenia"];
      $a = '<?php $connection = new mysqli("'.$ip.'", "'.$user.'", "'.$contrasenia.'", "'.$nombre.'"); 
      if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
      }?>';
      $file=fopen("../chuches/connection.php","w");
      fwrite($file,$a);
      fclose($file);
    
      $b = '<?php $connection = new mysqli("'.$ip.'", "'.$user.'", "'.$contrasenia.'", "'.$nombre.'"); 
      if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
      }?>';
      $fi=fopen("../chuches/cliente/connection.php","w");
      fwrite($fi,$b);
      fclose($fi);
        
      $connection = new mysqli("$ip","$user","$contrasenia");
      $consulta= "create database $nombre;";
        
       $result = $connection->query($consulta);
         if (!$result) {
                 echo "Query Error";
               var_dump($consulta);
            }
        
            header("Location: dos.php");
       ?>

     <?php endif ?>

    </body>
</html>