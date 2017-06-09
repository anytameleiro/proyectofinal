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
        
              $insert1=("INSERT INTO `categoria` (`id_categoria`, `nombre_cat`) VALUES
            (1, 'Gomitas'),
            (2, 'Caramelos'),
            (3, 'Nubes'),
            (4, 'Pica picas'),
            (5, 'Regaliz'),
            (6, 'Chicles'),
            (7, 'Gelatinas'),
            (8, 'Otros');");
            $result = $connection->query($insert1);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($insert1);
                  }

        
            $insert2=("INSERT INTO `chuches` (`id_chuche`, `id_categoria`, `nombre_chu`, `descripcion`, `img_chu`, `precio`) VALUES
            (1, 1, 'BOLSITAS FINI FUN ', 'SURTIDO 360 GRS 18 BOLSITAS APROX\r\n', '../../imgchu/bolsitafini.jpg', 2.72),
            (3, 1, 'OSITOS DE ORO HARIBO', '1 BOLSITA 100 GR\r\n\r\nCÃ³digo de barras  8426617002510\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.10 Kg.\r\n\r\nDisponibilidad: En stock', '../../imgchu/ositos-d-oro-haribo.jpg', 0.68),
            (4, 1, 'Delfines', 'Si eres goloso da rienda suelta a tu antojo, si eres creativo, te lo ponemos fÃ¡cil para realizar tus creaciones.\r\n\r\nEndÃºlzate, decora tus eventos, realiza tu mesa dulce y elabora los diseÃ±os mÃ¡s dulces con las mejores chuches y chocolates seleccionadas especialmente para ti, y recÃ­belas cuando desees con la mayor frescura,!como nunca las has probado!\r\n\r\nPuedes comprarlas de 100 en 100 gramos (15 unidades aprox.), o en packs de 250 unidades  (1.750 kg aproximadamente).', '../../imgchu/delfin.jpg', 1.2),
            (5, 1, 'Golosinas SandÃ­as', 'Golosinas rellenas SandÃ­as brillo Fini 65 unidades\r\nFabricante:  Fini', '../../imgchu/golosinas-.jpg', 5.25),
            (6, 1, 'Bolsita Fini Corazones ', 'Bolsita Fini 100gr Corazones Surtido Brillo 12 unidades.\r\nFabricante:  Fini.', '../../imgchu/bolsita-.jpg', 7.26),
            (7, 2, 'Caramelos Respiral Eucaliptus', 'Caramelos Respiral Eucaliptus Mentol 1 kg.\r\nFabricante:  Respiral', '../../imgchu/caramelos-respiral-eucaliptus-mentol-1-kg.jpg', 6.2),
            (8, 3, 'MASMELO CONEJOS Y PATOS', 'BOLSA 160 NUBES CONEJOS Y PATOS\r\n\r\nCÃ³digo de barras  8411500111950\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.87 Kg.', '../../imgchu/masmelo-conejos-y-patos.jpg', 5.13),
            (9, 3, 'NUBES CUBIERTAS CHOCO', 'TARRO 31 NUBES APROX. CUBIERTAS CHOCO\r\nCÃ³digo de barras  5410358102250\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.40 Kg.\r\n\r\n', '../../imgchu/haribo-nubes-cubiertas-choco-soft-kiss.jpg', 3.44),
            (10, 4, 'COOL COLA LATA', 'LATA 50 LATITAS DEXTROSA COLA\r\n\r\nCÃ³digo de barras  8437011321572\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.50 Kg.', '../../imgchu/cool-cola-lata.jpg', 8.6),
            (11, 4, 'VARITAS MAGICAS', 'LATA CON 150 PAJITAS PICA\r\n\r\nCÃ³digo de barras  8437001486731\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  1.70 Kg.', '../../imgchu/varitas-magicas-lata.jpg', 12.3),
            (12, 4, 'CANDY TOILET', 'ESTUCHE 24 BAÃ‘OS CHUCHE\r\n\r\nCÃ³digo de barras  8436031762235\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.19 Kg.', '../../imgchu/candy-toilet.jpg', 10),
            (13, 6, 'FIVE BOX SANDIA ', 'ESTUCHE 6 TARROS DE 30 CHICLES\r\n\r\nCÃ³digo de barras  4009900512343\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.62 Kg.', '../../imgchu/five-box-sandia-grageas.jpg', 15.6),
            (14, 6, 'CHICLE PELOTAS BALONCESTO', 'ESTUCHE 200 CHICLES RELLENOS LIQUIDO\r\n\r\nCÃ³digo de barras  8410525180958\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  1.25 Kg.', '../../imgchu/chicle-pelotas-baloncesto.jpg', 7.55),
            (15, 5, 'RELLENADO DON FRESON', 'TARRO 30 REGALIZ EXTRA GRANDE\r\n\r\nCÃ³digo de barras  8435063807136\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  1.50 Kg.', '../../imgchu/rellenado-don-freson.jpg', 6),
            (16, 5, 'REGALIZ GATOS XXL', 'ESTUCHE 40 UNIDADES\r\n\r\nCÃ³digo de barras  8425723002223\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.80 Kg.', '../../imgchu/regaliz-gatos-xxl-40-uds.jpg', 7),
            (17, 7, 'GELATINA FRESA ', 'TARRO 48 TARRINAS +CUCHARAS\r\n\r\nCÃ³digo de barras  8436007908124\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  2.66 Kg.', '../../imgchu/gelatina-fresa-tarrinas-zamba.jpg', 8.99),
            (18, 8, 'CHOCOLATE LINDOR', '24 STICK CHOCOLATE 38 GR LINDOR LECHE\r\nCÃ³digo artÃ­culo  CCH00278\r\nCÃ³digo de barras  04000539363108\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.91 Kg.\r\n\r\n', '../../imgchu/chocolate-en-stick-lindor-leche-stick.jpg', 16.9),
            (19, 8, 'PRINGLES SABOR JAMON', 'BOTE 165 GRAMOS\r\n\r\nCÃ³digo de barras  5053990106776\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.17 Kg.', '../../imgchu/pringles-jamon-165-grs.jpg', 15.2),
            (20, 8, 'LACASITOS MINI AZUL BOTES', '8 BOTES MINILACASITOS 129 GRS\r\n\r\nCÃ³digo de barras  18410740907580\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  1.03 Kg.', '../../imgchu/lacasitos-mini-azul-botes.jpg', 12.5);");
            $result = $connection->query($insert2);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($insert2);
                  }
        
            $insert3=("INSERT INTO `cliente` (`nombre`, `apellidos`, `direccion`, `apodo`, `email`, `contrasenia`, `telefono`, `tema`) VALUES
            ('Carmen', '', 'calle san mario,Madrid', 'Carmen', 'carmen4516@corre.edu', '81dc9bdb52d04dc20036dbd8313ed055', 123444444, 2);");
            $result = $connection->query($insert3);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($insert3);
                  }
         $insert5=("INSERT INTO `pedido` (`id_pedido`, `apodo`, `fecha`, `precio_total`, `pago`, `mes`, `year`) VALUES
            (1, 'Carmen', '2017-03-21', '34.40', 'Pagado', '', 0),
            (2, 'Carmen', '2017-04-19', '3.44', 'Pagado', '', 0),
            (3, 'Carmen', '2017-05-23', '22.65', NULL, '05', 0),
            (4, 'Carmen', '2017-05-29', '12.30', 'Pagado', '05', 2017),
            (5, 'Carmen', '2017-05-29', '10.26', 'Pagado', '05', 2017),
            (6, 'Carmen', '2017-05-29', '10.32', NULL, '05', 2017),
            (7, 'Carmen', '2017-05-29', '17.98', NULL, '05', 2017),
            (8, 'Carmen', '2017-05-29', '5.44', NULL, '05', 2017);");
            $result = $connection->query($insert5);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($insert5);
                  }
        
            $insert4=("INSERT INTO `contiene` (`id_pedido`, `id_chuche`, `cantidad`) VALUES
            (1, 9, 10),
            (2, 9, 1),
            (3, 14, 3),
            (4, 11, 1),
            (5, 8, 2),
            (6, 9, 3),
            (7, 17, 2),
            (8, 1, 2);");
            $result = $connection->query($insert4);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($insert4);
                  }
            
           
        
          
        header("Location: cinco.php");
         ?>


    </body>
</html>