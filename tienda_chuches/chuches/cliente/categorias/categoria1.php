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


      img{
          width: 150px;
      }

      </style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {

    include_once("../menu.php");

    include_once("../connection.php");
    
    include_once("../tema.php");
      


    //MAKING A SELECT QUERY

    $consulta="SELECT * from chuches inner join
     categoria on categoria.id_categoria=chuches.id_categoria where categoria.id_categoria=".$_GET['idcat'];

    if ($result = $connection->query($consulta)) {
    }else {

          echo "Error: ". $result."<br>". mysqli_error($connection);
    }



    echo" <div class='login1'>
      <div id='login2'>";



          while($obj = $result->fetch_object()) {

              //PRINTING EACH ROW
            echo "<ul class='plans'><a href='descripcion.php?id=$obj->id_chuche'>";
            echo"<li class='plan'>";
            echo"<ul class='planContainer'>";
            echo "<li class='title'><h2>".ucwords(strtolower($obj->nombre_chu))."</h2></li>";
            echo '<li><img src="'.$obj->img_chu.'"/></li>';
            echo "<li class='price'><p>".$obj->precio."€ </p></li>";
            echo"</ul>";
            echo"</li>";
            echo"</a></ul>";

  }
  echo" </div>";
    echo" </div>";
include_once("../info.php");
          $result->close();
          unset($obj);
          unset($connection);




  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
