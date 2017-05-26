<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar pedido</title>
      <link rel="shortcut icon" href="../../img/logo.ico">
</head>

<body>
    <?php
    //Open the session
    session_start();

    if (isset($_SESSION["admin"])) {
    include_once("../../connection.php");

       //Transformar $_GET en id_pedido.
       foreach ($_GET as $key => $item)

       //Comprobar.
         if ($result = $connection->query("SELECT * FROM pedido where id_pedido='$item';")) {

           if ($result1 = $connection->query("DELETE FROM contiene where id_pedido='$item';")) {

                   //Borrar.
                   if ($result2 = $connection->query("DELETE FROM pedido where id_pedido='$item';")) {
                     $obj = $result->fetch_object();
                      //  echo "<h1>El pedido $item ha sido borrada.</h1><br>";
                      echo"<script>;
                        alert ('El pedido $item ha sido borrado');
                        var pag='pedido.php?apo=$obj->apodo'
                        function redireccionar(){
                          location.href=pag;
                        }
                        setTimeout('redireccionar()',5);
                        </script>";
                   }
               }
           }else{
                 mysqli_error($connection);
               }



     //Volver atras.
      // echo "<br><a href='pedido.php?apo=$obj->apodo'>Atras</a>";
} else {
        session_destroy();
        header("Location: ../../login.php");
    }
     ?>


</body>
</html>
