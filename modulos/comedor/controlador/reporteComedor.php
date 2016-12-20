<?php 
require_once('../../recursos/fpdf/fpdf.php');

$fecha=$_GET['fecha'];


class PDF extends FPDF
{
}

//Datos del titulo
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->Cell(40,20);
$pdf->Image('../../recursos/logo2.png',15,5,0,0,'PNG');//Elección de Imagen de cabecera
$pdf->SetFont('Arial','',9);
$pdf->Ln(30);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'Asistencia del comedor '.$fecha,0,1,'C');
//$pdf->Cell(0,5,$fecha,0,1,'C');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',9,0,'C');
$pdf->SetFillColor(232,232,232,232,232,232,232);
$pdf->Cell(35,8,'Cedula',1,0,'C',True);
$pdf->Cell(43,8,'Nombre ',1,0,'C',True);
$pdf->Cell(40,8,'Apellido',1,0,'C',True);
$pdf->Cell(35,8,'Grado',1,0,'C',True);
$pdf->Cell(35,8,'Asistencia',1,0,'C',True);

$pdf->Ln(8);
$pdf->SetFont('Arial','',9);
$pdf->Ln(2);
//consulta
$conex=pg_connect("host=localhost port=5432 password=123456 user=postgres dbname=pstab");
$sql="SELECT pstab.lista_comedor.cedula_estu_com, pstab.lista_comedor.nombre, pstab.lista_comedor.apellido, pstab.lista_comedor.grado, pstab.asistencia_comedor.asistencia  FROM pstab.lista_comedor JOIN pstab.asistencia_comedor ON lista_comedor.cedula_estu_com=asistencia_comedor.cedula_estu_com WHERE fecha='$fecha' ORDER BY asistencia desc";

$Registro= pg_query($conex,$sql);
$Registro2 = pg_fetch_array($Registro);
do {
$pdf->Cell(35,8,$Registro2['cedula_estu_com'],1,0,'C');
$pdf->Cell(43,8,$Registro2['nombre'],1,0,'C');
$pdf->Cell(40,8,$Registro2['apellido'],1,0,'C');
$pdf->Cell(35,8,$Registro2['grado'],1,0,'C');
$pdf->Cell(35,8,$Registro2['asistencia'],1,0,'C');
$pdf->Ln(8);

} while ( $Registro2 = pg_fetch_array($Registro));

$pdf->Output();
?> 



