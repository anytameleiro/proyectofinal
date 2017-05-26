<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../menu.css">
<link rel="stylesheet" type="text/css" href="categoria.css">
<script src="jquery-1.11.3.js"></script>
      <link rel="stylesheet" type="text/css" href="principal.css">
    <link rel="shortcut icon" href="../../img/logo.ico">
    <link rel="stylesheet" href="prueba.css">
  <title>TODO CHUCHES</title>
  <style>
  table{
    margin:auto;
  }

  </style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
    //SESSION ALREADY CREATED

    include_once("../menu.php");
    echo" <div class='login1'>
      <div id='login2'>";
    ?>
   <div id="blanco">

      <div id="segundo">

     <div class="slideshow-container">
  <div class="mySlides fade">
    <img src="imagenes/img1.png" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="imagenes/img2.png" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="imagenes/img3.png" style="width:100%">
  </div>
        
  <div class="mySlides fade">
    <img src="imagenes/img4.jpg" style="width:100%">
  </div>
        
  <div class="mySlides fade">
    <img src="imagenes/img5.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="imagenes/img6.jpg" style="width:100%">
  </div>
        
  <div class="mySlides fade">
    <img src="imagenes/img7.png" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="imagenes/img8.png" style="width:100%">
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
  <span class="dot" onclick="currentSlide(6)"></span> 
  <span class="dot" onclick="currentSlide(7)"></span> 
  <span class="dot" onclick="currentSlide(8)"></span> 
</div>
        


        </div>
    </div>
      <script type="text/javascript">
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
              showSlides(slideIndex += n);
            }

            function currentSlide(n) {
              showSlides(slideIndex = n);
            }

            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1} 
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none"; 
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block"; 
              dots[slideIndex-1].className += " active";
            }
        </script>
    </td>
     </tr>

</table>
    <?php
    echo" </div>";
      echo" </div>";
?>
    <div id="pricePlans">
    </div>

<?php
include_once("../info.php");
  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
