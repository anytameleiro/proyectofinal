<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="../../img/logo.ico">
    <title></title>
</head>

<body>
    <?php
    //Open the session
    session_start();

    if (isset($_SESSION["user"])) {
    include_once("../connection.php");

       //Transformar $_GET en id_pedido.
       foreach ($_GET as $key => $item)

       //Comprobar.
         if ($result = $connection->query("SELECT * FROM pedido inner join contiene on contiene.id_pedido=pedido.id_pedido where pedido.id_pedido='$item';")) {

           if ($result1 = $connection->query("DELETE FROM contiene where id_pedido='$item';")) {

                   //Borrar.
                   if ($result2 = $connection->query("DELETE FROM pedido where id_pedido='$item';")) {
                     $obj = $result->fetch_object();

                    header("Location: descripcion.php?id=$obj->id_chuche");
                   }
               }
           }else{
                 mysqli_error($connection);
               }


} else {
        session_destroy();
        header("Location: ../../login.php");
    }
     ?>


</body>
</html>
