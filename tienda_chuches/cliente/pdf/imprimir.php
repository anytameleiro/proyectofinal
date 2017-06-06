<?php
  ob_start();
?>
<?php
session_start();
if (isset($_SESSION["user"])) {
$user=$_SESSION["user"];
require('/libreria/fpdf.php');
require_once("../connection.php");
    
class PDF extends FPDF
{

function Footer()
{
$this->SetY(-10);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetTitle('Pedidos');
$pdf->SetFont('Times','',20);
$pdf->Cell(190,20,utf8_decode('PEDIDOS REALIZADOS'),0,0,'C');
$pdf->ln();
$pdf->SetFont('Times','',12);

$pdf->Cell(110,5,"Nombre",1,0,'C');
$pdf->Cell(20,5,"Cantidad",1,0,'C');
$pdf->Cell(30,5,"Fecha",1,0,'C');
$pdf->Cell(30,5,"Precio total",1,0,'C');

$pdf->ln();
$pdf->AliasNbPages();
    
 if ($result = $connection->query("SELECT * from pedido inner join
     contiene on contiene.id_pedido=pedido.id_pedido inner join chuches on chuches.id_chuche=contiene.id_chuche
     where pedido.apodo='$user' and pedido.pago='Pagado';")) {
 	while($obj = $result->fetch_object()) {
$pdf->Cell(110,5,$obj->nombre_chu,1,0,'C');
$pdf->Cell(20,5,$obj->cantidad,1,0,'C');
$pdf->Cell(30,5,$obj->fecha,1,0,'C');
$pdf->Cell(30,5,$obj->precio_total,1,0,'C');


$pdf->ln();
}
}
$pdf->output();
    } else {
    session_destroy();
    header("Location: ../../login.php");
  }
?>
