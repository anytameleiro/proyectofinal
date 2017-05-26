<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador</title>
  <link rel="stylesheet" type="text/css" href="estilotabla.css">
  <link rel="shortcut icon" href="../img/logo.ico">

</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["admin"])) {

    ?>
    <a id='salir' href="../salir.php" >Cerrar sesion</a>
    <h1>Bienvenido administrador</h1>


    <ul class="link" id="admin" >
    <li>
      <a href="todochuches/chuches.php">  <span>Todas las chuches  </span></a>

    </li>

    <li>
    	<a  href="categorias/categoria.php">
            <span>Tabla categoria</span>
        </a>
    </li>

    <li>
	     <a href="tablacliente/cliente.php">
            <span>Tabla cliente</span>
         </a>
    </li>

    <li>
    	<a href="cambia.php">
            <span>Cambiar contraseña</span>
        </a>
    </li>
    <li>
    	<a href="grafico.php">
            <span>Gráfico</span>
        </a>
    </li>

</ul>
    <?php
    } else {
    session_destroy();
    header("Location: ../login.php");
    }


    ?>
    </body>
    </html>
