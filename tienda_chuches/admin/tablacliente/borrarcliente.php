<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="../../img/logo.ico">
    <title>Borrar cliente</title>
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
         if ($result = $connection->query("SELECT * FROM cliente where apodo='$item';")) {


           if($item =='admin'){
             echo"<h1>No se puede borrar el administrador</h1>";

           }else{

             if ($result3 = $connection->query("DELETE from  contiene where id_pedido IN (select id_pedido from pedido where pedido.apodo='$item');")) {
                // echo "hola1";
             if ($result1 = $connection->query("DELETE FROM pedido where apodo='$item';")) {    //Borrar.

                   //Borrar.
                   if ($result2 = $connection->query("DELETE FROM cliente where apodo='$item';")) {

                      //  echo "<h1>El cliente $item ha sido borrada.</h1><br>";
                      echo"<script>;
                        alert ('El cliente $item ha sido borrada');
                        var pag='cliente.php'
                        function redireccionar(){
                          location.href=pag;
                        }
                        setTimeout('redireccionar()',5);
                        </script>";
                   }
               }
             }else{
                   mysqli_error($connection);

                         echo "Error: " . $result3 . "<br>" . mysqli_error($connection);

                 }
           }

           }else{
                 mysqli_error($connection);
               }



     //Volver atras.
      // echo "<br><a href='cliente.php'>Atras</a>";
} else {
        session_destroy();
        header("Location: ../../login.php");
    }
     ?>


</body>
</html>
