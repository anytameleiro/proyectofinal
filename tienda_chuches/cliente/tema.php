 <?php 
    $user=$_SESSION["user"];
    $con="SELECT tema from cliente where apodo='$user';";
    $re = $connection->query($con);
    $obj=$re->fetch_object();
    $tema=$obj->tema;

    if ($tema==0) {
        echo "<link rel='stylesheet' type='text/css' href='categoria1.css'>";
    }if ($tema==1) {
    echo "<link rel='stylesheet' type='text/css' href='categoria2.css'>";
    }if($tema==2) {
        echo "<link rel='stylesheet' type='text/css' href='categoria3.css'>";
    }
 ?>