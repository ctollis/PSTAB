<?php 
require_once('../../recursos/fpdf/fpdf.php');


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
$pdf->Cell(0,5,'Usuarios del Sistema UEMAB',0,1,'C');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(232,232,232,232,232,232,232);
$pdf->Cell(20,8,'Cedula',1,0,'C',True);
$pdf->Cell(33,8,'Nombre de Usuario',1,0,'C',True);
$pdf->Cell(15,8,'Clave',1,0,'C',True);
$pdf->Cell(30,8,'Nombre',1,0,'C',True);
$pdf->Cell(30,8,'Apellido',1,0,'C',True);
$pdf->Cell(30,8,'Tipo de Usuario',1,0,'C',rue);
$pdf->Cell(30,8,'Estado',1,0,'C',True);
$pdf->Ln(8);
$pdf->SetFont('Arial','',9);
$pdf->Ln(2);
//consulta,conexion con la base de datos  
$conex=pg_connect("host=localhost port=5432 password=123456 user=postgres dbname=pstab");
$sql="SELECT * from pstab.usuario";
$Registro= pg_query($conex,$sql);
$Registro2 = pg_fetch_array($Registro);
do {
	$pdf->Cell(20,8,$Registro2['cedula'],1);
$pdf->Cell(33,8,$Registro2['username'],1,0,'C');
$pdf->Cell(15,8,$Registro2['clave'],1);
$pdf->Cell(30,8,$Registro2['nombre'],1,0,'C');
$pdf->Cell(30,8,$Registro2['apellido'],1,0,'C');
$pdf->Cell(30,8,$Registro2['tipo_usuario'],1,0,'C');
$pdf->Cell(30,8,$Registro2['estado'],1,0,'C');
$pdf->Ln(8);

} while ( $Registro2 = pg_fetch_array($Registro));

$pdf->Output();
?> 



