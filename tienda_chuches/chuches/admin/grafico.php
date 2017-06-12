<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="estilotabla.css">
  <link rel="shortcut icon" href="../img/logo.ico">
  <title>Todas las chuches</title>
  <style>
      img{
          width: 55px;
      }
      </style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["admin"])) {

    ?>
    <a id="salir" href='../salir.php' >Cerrar sesion</a>
    <h1>Todas las chuches</h1>

     <div class="contenido" style="height: auto;overflow-x: visible;">
     <table>
      <tbody>
    <?php
       include_once("../connection.php");

      //Consulta.
        $result1 = $connection->query('SELECT count(id_chuche) AS total, categoria.nombre_cat AS cate FROM chuches inner join categoria on categoria.id_categoria=chuches.id_categoria WHERE chuches.id_categoria= 1; ');
        $obj=$result1->fetch_object();
        $id1=$obj->total;
        $nombre1=$obj->cate;

        $result2 = $connection->query('SELECT count(id_chuche) AS total, categoria.nombre_cat AS cate FROM chuches inner join categoria on categoria.id_categoria=chuches.id_categoria WHERE chuches.id_categoria= 2; ');
        $obj=$result2->fetch_object();
        $id2=$obj->total;
        $nombre2=$obj->cate;

        $result3 = $connection->query('SELECT count(id_chuche) AS total, categoria.nombre_cat AS cate FROM chuches inner join categoria on categoria.id_categoria=chuches.id_categoria WHERE chuches.id_categoria= 3; ');
        $obj=$result3->fetch_object();
        $id3=$obj->total;
        $nombre3=$obj->cate;

        $result4 = $connection->query('SELECT count(id_chuche) AS total, categoria.nombre_cat AS cate FROM chuches inner join categoria on categoria.id_categoria=chuches.id_categoria WHERE chuches.id_categoria= 4; ');
        $obj=$result4->fetch_object();
        $id4=$obj->total;
        $nombre4=$obj->cate;

        $result5 = $connection->query('SELECT count(id_chuche) AS total, categoria.nombre_cat AS cate FROM chuches inner join categoria on categoria.id_categoria=chuches.id_categoria WHERE chuches.id_categoria= 5; ');
        $obj=$result5->fetch_object();
        $id5=$obj->total;
        $nombre5=$obj->cate;

        $result6 = $connection->query('SELECT count(id_chuche) AS total, categoria.nombre_cat AS cate FROM chuches inner join categoria on categoria.id_categoria=chuches.id_categoria WHERE chuches.id_categoria= 6; ');
        $obj=$result6->fetch_object();
        $id6=$obj->total;
        $nombre6=$obj->cate;

        $result7 = $connection->query('SELECT count(id_chuche) AS total, categoria.nombre_cat AS cate FROM chuches inner join categoria on categoria.id_categoria=chuches.id_categoria WHERE chuches.id_categoria= 7; ');
        $obj=$result7->fetch_object();
        $id7=$obj->total;
        $nombre7=$obj->cate;

        $result8 = $connection->query('SELECT count(id_chuche) AS total, categoria.nombre_cat AS cate FROM chuches inner join categoria on categoria.id_categoria=chuches.id_categoria WHERE chuches.id_categoria= 8; ');
        $obj=$result8->fetch_object();
        $id8=$obj->total;
        $nombre8=$obj->cate;


        $result9 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=05 and year=YEAR(CURDATE());');
        $obj=$result9->fetch_object();
        $id9=$obj->total;
      
      $result10 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=01 and year=YEAR(CURDATE());');
        $obj=$result10->fetch_object();
        $id10=$obj->total;
      
      $result11 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=02 and year=YEAR(CURDATE());');
        $obj=$result11->fetch_object();
        $id11=$obj->total;
      
      $result12 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=03 and year=YEAR(CURDATE());');
        $obj=$result12->fetch_object();
        $id12=$obj->total;
      $result13 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=04 and year=YEAR(CURDATE());');
        $obj=$result13->fetch_object();
        $id13=$obj->total;
      
      $result14 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=06 and year=YEAR(CURDATE());');
        $obj=$result14->fetch_object();
        $id14=$obj->total;
      
      $result15 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=07 and year=YEAR(CURDATE());');
        $obj=$result15->fetch_object();
        $id15=$obj->total;
      
      $result16 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=08 and year=YEAR(CURDATE());');
        $obj=$result16->fetch_object();
        $id16=$obj->total;
      
      $result17 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=09 and year=YEAR(CURDATE());');
        $obj=$result17->fetch_object();
        $id17=$obj->total;
      
      $result18 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=10 and year=YEAR(CURDATE());');
        $obj=$result18->fetch_object();
        $id18=$obj->total;
      
      $result19 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=11 and year=YEAR(CURDATE());');
        $obj=$result19->fetch_object();
        $id19=$obj->total;
      
      $result20 = $connection->query('SELECT count(*) AS total FROM pedido WHERE mes=12 and year=YEAR(CURDATE());');
        $obj=$result20->fetch_object();
        $id20=$obj->total;
?>

 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Categoría', 'Número de productos'],
          [<?php echo "'$nombre1'"  ?>, <?php echo "$id1"  ?>],
          [<?php echo "'$nombre2'"  ?>, <?php echo "$id2"  ?>],
          [<?php echo "'$nombre3'"  ?>, <?php echo "$id3"  ?>],
          [<?php echo "'$nombre4'"  ?>, <?php echo "$id4"  ?>],
          [<?php echo "'$nombre5'"  ?>, <?php echo "$id5"  ?>],
          [<?php echo "'$nombre6'"  ?>, <?php echo "$id6"  ?>],
          [<?php echo "'$nombre7'"  ?>, <?php echo "$id7"  ?>],
          [<?php echo "'$nombre8'"  ?>, <?php echo "$id8"  ?>]
        ]);
        var options = {
          title: 'Categorías',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <!-- Display the pie chart -->
    <div id='categoriagrafico'><div id="piechart_3d" style="width: 38%;height: 400px;float:left;"></div></div>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Pedidos'],
          ['Enero',  <?php echo "$id10"  ?>],
          ['Febrero',  <?php echo "$id11"  ?>],
          ['Marzo', <?php echo "$id9"  ?>],
          ['Abril',  <?php echo "$id12"  ?>],
          ['Mayo', <?php echo "$id13"  ?>],
          ['Junio', <?php echo "$id14"  ?>],
          ['Julio',  <?php echo "$id15"  ?>],
          ['Agosto', <?php echo "$id16"  ?>],
          ['Septiembre',  <?php echo "$id17"  ?>],
          ['Octubre',  <?php echo "$id18"  ?>],
          ['Noviembre',  <?php echo "$id19"  ?>],
          ['Diciembre',  <?php echo "$id20"  ?>]
        ]);
        var options = {
          title: 'Número de Pedidos este año',
          hAxis: {title: 'Mes', titleTextStyle: {color: 'blue'}}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <div id='pedidografico'><div id="chart_div" style="width: 60%;height:400px;float:left; "></div></div>

        </tbody>
         </table>
       </div>

    <?php

   
    echo "<br><a class='atras' href='admin.php'>Atras</a>";


  } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>
</body>
</html>
