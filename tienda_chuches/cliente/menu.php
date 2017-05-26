<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<title></title>
</head>

<body>

<?php


if (isset($_SESSION["user"])) {


include_once("../../connection.php");

?>
<div id="cuerpo">

    <div id="imagen"><img id="chico" src="../fondoimg/logo.png" style="padding-left: 20px;"/></div>

    <div id="titulo"><h1>TODO CHUCHES</h1></div>

    <div id="cerrar"><p><a id="salir" href='../../salir.php' >Cerrar sesion</a></p><br>
    <?php

    echo"<a id='perfil' href='perfil.php'>Mi perfil</a>";

    ?>

    </div>
    
</div>
<div class="topnav" id="myTopnav">
        
        <a href="principal.php">Inicio</a>
<?php
//MAKING A SELECT QUERY

$consulta= "SELECT * FROM categoria";
if ($result = $connection->query($consulta)) {


      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW

          echo "<a href='categoria1.php?idcat=$obj->id_categoria'>".$obj->nombre_cat."</a>";

        }


      ?>

         <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
  <?php

      $result->close();
      unset($obj);
      unset($connection);


}
} else {
  session_destroy();
  header("Location: ../login.php");
}


?>
    <script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</body>
</html>
