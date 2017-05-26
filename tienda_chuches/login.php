<?php
  ob_start();
?>
<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar_sesion</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="shortcut icon" href="img/logo.ico">

  </head>
  <body>

    <?php
        //FORM SUBMITTED
        if (isset($_POST["user"])) {

          include_once("connection.php");

          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $username = $_POST['user'];
          $password = $_POST['password'];

          $consulta= "SELECT * FROM cliente WHERE apodo = '$username' AND contrasenia=md5('$password')";


          //Test if the query was correct
          //SQL Injection Possible
          if ($result = $connection->query($consulta)) {

              //No rows returned
              if ($result->num_rows===0) {

                echo "<script>";
                echo "alert ('Usuario o contraseña incorecta')";
                echo "</script>";
              }
              else if ($_POST["user"]==='admin') {
                $_SESSION["admin"]=$_POST["user"];
                $_SESSION["language"]="es";
                header("Location: admin/admin.php");
              }
              else {
                //VALID LOGIN. SETTING SESSION VARS
                $_SESSION["user"]=$_POST["user"];

                $_SESSION["language"]="es";
                header("Location: cliente/categorias/principal.php");

              }

          } else {
            echo "Wrong Query";
          }
      }
    ?>
  <form action="login.php" method="post">
    <div class="login1">
      <div id="login2">
          <p>Apodo: </p><p><input name="user" placeholder="nombre" maxlength='25'required></p>
          <p>Contraseña: </p><p><input name="password" type="password" placeholder="contraseña" maxlength='64' required></p>
          <p><input id="entrar" type="submit" value="Entrar"></p>
          <p class="mensage">¿No estas registrado? <a href="registrar.php">Registrate</a></p>

      </div>
    </div>
  </form>

  </body>
</html>
