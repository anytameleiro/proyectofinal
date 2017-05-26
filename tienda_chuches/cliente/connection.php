<?php

//CREATING THE CONNECTION
$connection = new mysqli("localhost", "root", "", "tienda_chuches");
// mysqli_set_charset("utf8",$connection);
//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}


?>
