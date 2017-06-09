<?php
  ob_start();
?>
<?php
session_start();
$primero="chuches/connection.php";
$segundo="chuches/cliente/connection.php";
$uno="instalar/uno.php";
$dos="instalar/dos.php";
$tres="instalar/tres.php";
$cuatro="instalar/cuatro.php";
$cinco="instalar/cinco.php";
$dir = "instalar";
if(file_exists($primero)){
require_once($primero);
require_once($segundo);
unlink($uno);
unlink($dos);
unlink($tres);
unlink($cuatro);
unlink($cinco);
rmdir($dir);
header("Location: chuches/index.php");
}else{
header("Location: instalar/uno.php");
}
?>
