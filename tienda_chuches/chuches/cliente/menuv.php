<?php
  ob_start();
?>
<?php
if (isset($_SESSION["user"])) {
include_once("../../connection.php");
$user=$_SESSION["user"];

  echo"<div class='content'>

<div class='u'>
  <div class='arrow'></div>
    <a href='perfil.php'>Mi perfil</a>
    <a href='modi.php?apo=$user'>Modificar perfil</a>
    <a href='contrasenia.php?apo=$user'>Cambiar contraseña</a>
    <a href='pedidos.php'>Pedidos</a>
    <a href='cambio_css.php' >Temas</a>
  </div>
</div>";
  echo"</td>";
} else {
  session_destroy();
  header("Location: ../login.php");
}

?>
