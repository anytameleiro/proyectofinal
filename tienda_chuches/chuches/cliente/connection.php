<?php $connection = new mysqli("localhost", "root", "root", "prueba"); 
      if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
      }?>