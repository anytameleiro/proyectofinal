<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>

<body>
<?php
  session_start();

  if (isset($_SESSION["user"])) {
      
      $user=$_SESSION["user"];
      
    include_once("../menu.php");
    
    include_once("../connection.php");
      
    include_once("../tema.php");
   
if ($result = $connection->query("UPDATE cliente SET `tema` = '2' WHERE apodo ='$user';"))
   {
  header ("Location: cambio_css.php");
} else {

      echo "Error: " . $result . "<br>" . mysqli_error($connection);
}

  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>