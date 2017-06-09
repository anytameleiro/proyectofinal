<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
       <link rel="shortcut icon" href="../chuches/img/logo.ico">
    </head>
    <body>

        <?php
        require_once("../chuches/connection.php");
        
        $tabla1=("CREATE TABLE `categoria` (
          `id_categoria` int(10) NOT NULL,
          `nombre_cat` varchar(50) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
        $result = $connection->query($tabla1);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($tabla1);
                  }
        $cat=("INSERT INTO `categoria` (`id_categoria`, `nombre_cat`) VALUES
                (1, 'Gomitas'),
                (2, 'Caramelos'),
                (3, 'Nubes'),
                (4, 'Pica picas'),
                (5, 'Regaliz'),
                (6, 'Chicles'),
                (7, 'Gelatinas'),
                (8, 'Otros');");
        $result = $connection->query($cat);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($cat);
                  }
        
        $tabla2=("CREATE TABLE `chuches` (
          `id_chuche` int(10) NOT NULL,
          `id_categoria` int(10) NOT NULL,
          `nombre_chu` varchar(50) NOT NULL,
          `descripcion` varchar(500) DEFAULT NULL,
          `img_chu` varchar(150) DEFAULT NULL,
          `precio` double NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
        $result = $connection->query($tabla2);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($tabla2);
                  }
        
        $tabla3=("CREATE TABLE `cliente` (
          `nombre` varchar(25) NOT NULL,
          `apellidos` varchar(50) DEFAULT NULL,
          `direccion` varchar(50) DEFAULT NULL,
          `apodo` varchar(50) NOT NULL,
          `email` varchar(50) DEFAULT NULL,
          `contrasenia` varchar(64) NOT NULL,
          `telefono` int(9) DEFAULT NULL,
          `tema` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
        $result = $connection->query($tabla3);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($tabla3);
                  }
        
        $tabla4=("CREATE TABLE `contiene` (
          `id_pedido` int(50) NOT NULL,
          `id_chuche` int(10) NOT NULL,
          `cantidad` int(10) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
        $result = $connection->query($tabla4);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($tabla4);
                  }
        
        $tabla5=("CREATE TABLE `pedido` (
          `id_pedido` int(50) NOT NULL,
          `apodo` varchar(50) NOT NULL,
          `fecha` date NOT NULL,
          `precio_total` decimal(10,2) NOT NULL,
          `pago` varchar(20) DEFAULT NULL,
          `mes` varchar(20) NOT NULL,
          `year` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
        $result = $connection->query($tabla5);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($tabla5);
                  }
        
        
       $alter1=("ALTER TABLE `categoria`
        ADD PRIMARY KEY (`id_categoria`);");
       $result = $connection->query($alter1);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter1);
            }
        
        $alter2=("ALTER TABLE `chuches`
          ADD PRIMARY KEY (`id_chuche`,`id_categoria`),
          ADD KEY `id_chuche` (`id_chuche`),
          ADD KEY `id_categoria` (`id_categoria`);");
        $result = $connection->query($alter2);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter2);
            }
        
        $alter3=("ALTER TABLE `cliente`
        ADD PRIMARY KEY (`apodo`);");
        $result = $connection->query($alter3);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter3);
            }
        
        $alter4=("ALTER TABLE `contiene`
          ADD PRIMARY KEY (`id_pedido`,`id_chuche`),
          ADD KEY `id_pedido` (`id_pedido`),
          ADD KEY `id_chuche` (`id_chuche`);");
        $result = $connection->query($alter4);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter4);
            }
        
        $alter5=("ALTER TABLE `pedido`
          ADD PRIMARY KEY (`id_pedido`,`apodo`),
          ADD KEY `dni` (`apodo`),
          ADD KEY `id_pedido` (`id_pedido`);");
        $result = $connection->query($alter5);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter5);
            }
        
        $alter6=("ALTER TABLE `chuches`
            MODIFY `id_chuche` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");
        $result = $connection->query($alter6);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter6);
            }
        
        $alter7=("ALTER TABLE `pedido`
            MODIFY `id_pedido` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");
        $result = $connection->query($alter7);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter7);
            }
        
        $alter8=("ALTER TABLE `chuches`
            ADD CONSTRAINT `chuches_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;");
        $result = $connection->query($alter8);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter8);
            }
        
        $alter9=("ALTER TABLE `contiene`
          ADD CONSTRAINT `contiene_ibfk_4` FOREIGN KEY (`id_chuche`) REFERENCES `chuches` (`id_chuche`) ON DELETE CASCADE ON UPDATE CASCADE,
          ADD CONSTRAINT `contiene_ibfk_5` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;
        ");
        $result = $connection->query($alter9);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter9);
            }
        
        $alter10=("ALTER TABLE `pedido`
         ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`apodo`) REFERENCES `cliente` (`apodo`) ON DELETE CASCADE ON UPDATE CASCADE;");
        $result = $connection->query($alter10);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter10);
            }
        
        header("Location: tres.php");
         ?>


    </body>
</html>