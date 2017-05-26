<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar chuche</title>
    <link rel="stylesheet" type="text/css" href="../estilotabla.css">
      <link rel="shortcut icon" href="../../img/logo.ico">
</head>

<body>
    <?php
    //Open the session
    session_start();

    if (isset($_SESSION["admin"])) {

    include_once("../../connection.php");

       //Transformar $_GET en id_chuche.
       foreach ($_GET as $key => $item)
       //Comprobar.
         if ($result = $connection->query("SELECT * FROM chuches where id_chuche=$item;")) {
           $obj = $result->fetch_object();
           $image = $obj->img_chu;
             //Borrar.
             if ($result3 = $connection->query("DELETE  FROM pedido WHERE id_pedido IN (SELECT id_pedido from contiene where id_chuche=$item);")) {
              if ($result1 = $connection->query("DELETE FROM contiene where id_chuche=$item;")) {



                   //Borrar.
                   if ($result2 = $connection->query("DELETE FROM chuches where id_chuche=$item;")) {
                      unlink("$image");
                      //  echo "<h1>chuche $item ha sido borrada.</h1><br>";
                      echo"<script>;
                        alert ('chuche $item ha sido borrada');
                        var pag='chuches.php?idcat=$obj->id_categoria'
                        function redireccionar(){
                          location.href=pag;
                        }
                        setTimeout('redireccionar()',5);
                        </script>";
                   }
               }
             }
           }else{
                 mysqli_error($connection);
               }



     //Volver atras.
      echo "<br><a href='chuches.php'>Atras</a>";
} else {
        session_destroy();
        header("Location: ../../login.php");
    }
     ?>


</body>
</html>
