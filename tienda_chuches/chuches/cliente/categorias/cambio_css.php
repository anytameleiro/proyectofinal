<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<style>
      body{
          min-width: 796px;
      }
</style>
<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
      
      $user=$_SESSION["user"];
    include_once("../menu.php");
    
    include_once("../connection.php");
      
    include_once("../tema.php");
      
        echo" <div class='login1'>
          <div id='login2'>";
          echo"<table>
          <tr><td id='m' valign='top'>";
        include_once("../menuv.php");


        echo"<td>";
        echo"<div id='blanco' style='overflow: hidden;'>";

 ?>
    <div id="color"><a href='tema0.php' ><img title="Tema azul" style="margin:10px;height:40px;width:90px" src="imagenes/azul.jpg"  /></a></div>
    <div id="color"><a href='tema1.php'><img title="Tema rojo" style="margin:10px;height:40px;width:90px" src="imagenes/rojo.png"  /></a></div>
    <div id="color"><a href='tema2.php'><img title="Tema verde" style="margin:10px;height:40px;width:90px" src="imagenes/verde.jpg"  /></a></div>
    
  
<?php

  echo"</div>";
echo"</td>";

echo"</table>";

echo" </div>";
echo" </div>";
include_once("../info.php");
  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
    
    