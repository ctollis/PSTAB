<?php 
require_once('../../recursos/fpdf/fpdf.php');


class PDF extends FPDF
{
}

$grado=$_GET['grado'];
$seccion=$_GET['seccion'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];

$sumav=$_GET['sumav'];
$sumah=$_GET['sumah'];
$sumat=$_GET['sumat'];
$prov=$_GET['prov'];
$proh=$_GET['proh'];
$prot=$_GET['prot'];

$total_primer_dia=$_GET['total_primer_dia'];
$alum_matriculas_mes=$_GET['alum_matriculas_mes'];
$total_varones=$_GET['total_varones'];
$total_hembras=$_GET['total_hembras'];
$tt=$_GET['tt'];
$alumnos_retirados=$_GET['alumnos_retirados'];
$varones_retirados=$_GET['varones_retirados'];
$hembras_retirados=$_GET['hembras_retirados'];
$ttr=$_GET['ttr'];

$porcv=($prov*100)/$varones_retirados;
$porcv2=number_format($porcv);
$porch=($proh*100)/$hembras_retirados;
$porch2=number_format($porch);
$porct=($prot*100)/$ttr;
$porct2=number_format($porct);

$porcentaje="%";

$frase1="ESTADÍSTICA MENSUAL";
$frase1c=utf8_decode($frase1);


//Datos del titulo
$pdf = new FPDF('P','mm','letter');
$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->Cell(40,20);
$pdf->Image('../../recursos/logo2.png',15,5,0,0,'PNG');//Elección de Imagen de cabecera
$pdf->SetFont('Arial','',9);
$pdf->Ln(12);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,5,$frase1c,0,1,'C');
$pdf->Ln(5);
//$pdf->SetFillColor(232,232,232,232,232,232,232);
$conex=pg_connect("host=localhost port=5432 password=123456 user=postgres dbname=pstab");
$sql="SELECT * FROM pstab.datos_estadisticos WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'";
$Registro= pg_query($conex,$sql);
$Registro2 = pg_fetch_assoc($Registro);
//$mes=$Registro2['mes'];

//Membrete de datos estadisticos
$pdf->SetXY(40,30);
$pdf->SetFont('Arial','B', '9');
$pdf->SetFillColor(232,232,232,232,232,232,232);
$pdf->Cell(60,6,'Mes: '.$Registro2['mes'],1,0);
$pdf->Cell(40,6,'Grado:  '.$Registro2['grado'],1,0);
$frase2="Sección: ";
$frase2c=utf8_decode($frase2);
$frase3=$Registro2['seccion'];
$frase3c=utf8_decode($frase3);
$pdf->Cell(40,6,$frase2c .$frase3c,1,0,'C');
$pdf->Ln(6);
$pdf->SetXY(40,36);
$pdf->Cell(60,6,'Docente: '.$Registro2['docente'],1,0);
$pdf->Cell(40,6,'Dias Habiles: '.$Registro2['dias_habiles'],1,0);
$pdf->Cell(40,6,$porct2.'% de asistencia ',1,0,'C'); 

$pdf->SetFont('Arial','B',9);
$pdf->Ln(15);
$frase4="Día";
$frase4c=utf8_decode($frase4);
$pdf->Cell(10,8,$frase4c,1,0,'C');

$pdf->Cell(10,8,'M',1,0,'C');
$pdf->Cell(10,8,'F',1,0,'C');
$pdf->Cell(10,8,'T',1,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->Ln(8);
$sql2="SELECT * FROM pstab.asistencia_estadistica WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano' ORDER BY dia asc";
$consulta= pg_query($conex,$sql2);
$consulta2 = pg_fetch_array($consulta);
do {
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(10,6,$consulta2['dia'],1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(10,6,$consulta2['varones'],1,0);
	$pdf->Cell(10,6,$consulta2['hembras'],1,0);
	$suma=$consulta2['varones']+$consulta2['hembras'];
	$pdf->Cell(10,6,$suma,1,0);
	$pdf->Ln(6);
	}while ($consulta2 = pg_fetch_array($consulta));

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(10,6,'Total',1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(10,6,$sumav,1,0);
	$pdf->Cell(10,6,$sumah,1,0);
	$pdf->Cell(10,6,$sumat,1,0);
	$pdf->Ln(6);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(10,6,'PROM',1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(10,6,$proh,1,0);
	$pdf->Cell(10,6,$proh,1,0);
	$pdf->Cell(10,6,$prot,1,0);
	$pdf->Ln(6);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(10,6,'Porc.',1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(10,6,$porcv2.$porcentaje,1,0);
	$pdf->Cell(10,6,$porch2.$porcentaje,1,0);
	$pdf->Cell(10,6,$porct2.$porcentaje,1,0);


$sql3="SELECT * FROM pstab.matricula WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'";
$consulta = pg_query($conex,$sql3);
$matricula = pg_fetch_assoc($consulta);


$pdf->Ln(10);
$pdf->SetXY(60,50);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(110,6,'MATRICULA',1,0);
$pdf->Cell(10,6,'M',1,0);
$pdf->Cell(10,6,'F',1,0);
$pdf->Cell(10,6,'T',1,0);
$pdf->SetFont('Arial','',9);
$pdf->Ln(6);
$pdf->SetXY(60,56);
$frase5="Total de alumnos inscritos para el primer día del mes";
$frase5c=utf8_decode($frase5);
$pdf->Cell(110,6,$frase5c,1,0);
$pdf->Cell(10,6,$matricula['t_v_pm'],1,0);
$pdf->Cell(10,6,$matricula['t_h_pm'],1,0);
$t1=$matricula['t_v_pm']+$matricula['t_h_pm'];
$pdf->Cell(10,6,$t1,1,0);
$pdf->Ln(6);
$pdf->SetXY(60,62);
$pdf->Cell(110,6,'Alumnos matriculados en el mes',1,0);
$pdf->Cell(10,6,$matricula['v_m_m'],1,0);
$pdf->Cell(10,6,$matricula['h_m_m'],1,0);
$t2=$matricula['v_m_m']+$matricula['h_m_m'];
$pdf->Cell(10,6,$t2,1,0);

$pdf->Ln(6);
$pdf->SetXY(60,68);
		$total_varones=$matricula['t_v_pm']+$matricula['v_m_m'];
		$total_hembras=$matricula['t_h_pm']+$matricula['h_m_m'];
		$tt=$total_primer_dia+$alum_matriculas_mes;
$pdf->Cell(110,6,'Total',1,0);
$pdf->Cell(10,6,$total_varones,1,0);
$pdf->Cell(10,6,$total_hembras,1,0);
$pdf->Cell(10,6,$tt,1,0);
$pdf->Ln(6);
$pdf->SetXY(60,74);
$pdf->Cell(110,6,'Alumnos retirados en el mes',1,0);
$pdf->Cell(10,6,$matricula['v_r_m'],1,0);
$pdf->Cell(10,6,$matricula['h_r_m'],1,0);
$t3=$matricula['v_r_m']+$matricula['h_r_m'];
$pdf->Cell(10,6,$t3,1,0);
$pdf->Ln(6);
$pdf->SetXY(60,80);
$frase6="Alumnos matriculados para el día último del presente mes";
$frase6c=utf8_decode($frase6);
$pdf->Cell(110,6,$frase6c,1,0);
		$varones_retirados=$total_varones-$matricula['v_r_m'];
		$hembras_retirados=$total_hembras-$matricula['h_r_m'];
		$ttr=$tt-$alumnos_retirados;
$pdf->Cell(10,6,$varones_retirados,1,0);
$pdf->Cell(10,6,$hembras_retirados,1,0);
$pdf->Cell(10,6,$ttr,1,0);

$sql4="SELECT * FROM pstab.repitientes_edad_sexo WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'";
$consulta = pg_query($conex,$sql4);
$repitientes = pg_fetch_assoc($consulta);

$pdf->SetFont('Arial','B',9);
$pdf->Ln(10);
$pdf->SetXY(60,90);
$pdf->Cell(140,6,'Repitientes por edad y sexo',1,0);
$pdf->SetFont('Arial','B',9);
$pdf->Ln(6);
$pdf->SetXY(60,96);
$pdf->Cell(20,6,'',1,0);
$pdf->Cell(10,6,'4',1,0);
$pdf->Cell(10,6,'5',1,0);
$pdf->Cell(10,6,'6',1,0);
$pdf->Cell(10,6,'7',1,0);
$pdf->Cell(10,6,'8',1,0);
$pdf->Cell(10,6,'9',1,0);
$pdf->Cell(10,6,'10',1,0);
$pdf->Cell(10,6,'11',1,0);
$pdf->Cell(10,6,'12',1,0);
$pdf->Cell(10,6,'13',1,0);
$pdf->Cell(10,6,'14',1,0);
$pdf->Cell(10,6,'15',1,0);
$pdf->Ln(6);
$pdf->SetXY(60,102);
$pdf->Cell(20,6,'M',1,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(10,6,$repitientes['cuatrov'],1,0);
$pdf->Cell(10,6,$repitientes['cincov'],1,0);
$pdf->Cell(10,6,$repitientes['seisv'],1,0);
$pdf->Cell(10,6,$repitientes['sietev'],1,0);
$pdf->Cell(10,6,$repitientes['ochov'],1,0);
$pdf->Cell(10,6,$repitientes['nuevev'],1,0);
$pdf->Cell(10,6,$repitientes['diezv'],1,0);
$pdf->Cell(10,6,$repitientes['oncev'],1,0);
$pdf->Cell(10,6,$repitientes['docev'],1,0);
$pdf->Cell(10,6,$repitientes['trecev'],1,0);
$pdf->Cell(10,6,$repitientes['catorcev'],1,0);
$pdf->Cell(10,6,$repitientes['quincev'],1,0);
$pdf->Ln(6);
$pdf->SetXY(60,108);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(20,6,'F',1,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(10,6,$repitientes['cuatroh'],1,0);
$pdf->Cell(10,6,$repitientes['cincoh'],1,0);
$pdf->Cell(10,6,$repitientes['seish'],1,0);
$pdf->Cell(10,6,$repitientes['sieteh'],1,0);
$pdf->Cell(10,6,$repitientes['ochoh'],1,0);
$pdf->Cell(10,6,$repitientes['nueveh'],1,0);
$pdf->Cell(10,6,$repitientes['diezh'],1,0);
$pdf->Cell(10,6,$repitientes['onceh'],1,0);
$pdf->Cell(10,6,$repitientes['doceh'],1,0);
$pdf->Cell(10,6,$repitientes['treceh'],1,0);
$pdf->Cell(10,6,$repitientes['catorceh'],1,0);
$pdf->Cell(10,6,$repitientes['quinceh'],1,0);

$sql5="SELECT * FROM pstab.clasificacion_edad_sexo WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'";
$consulta = pg_query($conex,$sql5);
$clasificacion = pg_fetch_assoc($consulta);

$pdf->SetFont('Arial','B',9);
$pdf->Ln(10);
$pdf->SetXY(60,118);
$frase7="Clasificación por edad y sexo";
$frase7c= utf8_decode($frase7);
$pdf->Cell(140,6,$frase7c,1,0);
$pdf->SetFont('Arial','B',9);
$pdf->Ln(6);
$pdf->SetXY(60,124);
$pdf->Cell(20,6,'',1,0);
$pdf->Cell(10,6,'4',1,0);
$pdf->Cell(10,6,'5',1,0);
$pdf->Cell(10,6,'6',1,0);
$pdf->Cell(10,6,'7',1,0);
$pdf->Cell(10,6,'8',1,0);
$pdf->Cell(10,6,'9',1,0);
$pdf->Cell(10,6,'10',1,0);
$pdf->Cell(10,6,'11',1,0);
$pdf->Cell(10,6,'12',1,0);
$pdf->Cell(10,6,'13',1,0);
$pdf->Cell(10,6,'14',1,0);
$pdf->Cell(10,6,'15',1,0);
$pdf->Ln(6);
$pdf->SetXY(60,130);
$pdf->Cell(20,6,'M',1,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(10,6,$clasificacion['ccuatrov'],1,0);
$pdf->Cell(10,6,$clasificacion['ccincov'],1,0);
$pdf->Cell(10,6,$clasificacion['cseisv'],1,0);
$pdf->Cell(10,6,$clasificacion['csietev'],1,0);
$pdf->Cell(10,6,$clasificacion['cochov'],1,0);
$pdf->Cell(10,6,$clasificacion['cnuevev'],1,0);
$pdf->Cell(10,6,$clasificacion['cdiezv'],1,0);
$pdf->Cell(10,6,$clasificacion['concev'],1,0);
$pdf->Cell(10,6,$clasificacion['cdocev'],1,0);
$pdf->Cell(10,6,$clasificacion['ctrecev'],1,0);
$pdf->Cell(10,6,$clasificacion['ccatorcev'],1,0);
$pdf->Cell(10,6,$clasificacion['cquincev'],1,0);
$pdf->Ln(6);
$pdf->SetXY(60,136);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(20,6,'F',1,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(10,6,$clasificacion['ccuatroh'],1,0);
$pdf->Cell(10,6,$clasificacion['ccincoh'],1,0);
$pdf->Cell(10,6,$clasificacion['cseish'],1,0);
$pdf->Cell(10,6,$clasificacion['csieteh'],1,0);
$pdf->Cell(10,6,$clasificacion['cochoh'],1,0);
$pdf->Cell(10,6,$clasificacion['cnueveh'],1,0);
$pdf->Cell(10,6,$clasificacion['cdiezh'],1,0);
$pdf->Cell(10,6,$clasificacion['conceh'],1,0);
$pdf->Cell(10,6,$clasificacion['cdoceh'],1,0);
$pdf->Cell(10,6,$clasificacion['ctreceh'],1,0);
$pdf->Cell(10,6,$clasificacion['ccatorceh'],1,0);
$pdf->Cell(10,6,$clasificacion['cquinceh'],1,0);

$pdf->SetFont('Arial','B',9);
$pdf->Ln(10);
$pdf->SetXY(60,148);

$sql6="SELECT * FROM pstab.ingresos WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'";
$consulta = pg_query($conex,$sql6);
$ing = pg_fetch_array($consulta);

$pdf->Cell(140,6,'Ingresos',1,0);
$pdf->Ln(6);
$pdf->SetXY(60,154);
$pdf->Cell(30,6,'Nombre y Apellido',1,0);
$pdf->Cell(20,6,'F.N',1,0);
$pdf->Cell(25,6,'Lugar de Nac.',1,0);
$pdf->Cell(6,6,'E',1,0);
$pdf->Cell(6,6,'S',1,0);
$pdf->Cell(20,6,'Fecha',1,0);
$pdf->Cell(33,6,'Motivo',1,0);
$pdf->Ln(6);
$pdf->SetXY(60,160);

do {
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(30,6,$ing['nombre_apellido_i'],1);
	$pdf->Cell(20,6,$ing['f_n'],1,0);
	$pdf->Cell(25,6,$ing['lugar_nacimiento_i'],1,0);
	$pdf->Cell(6,6,$ing['edad'],1,0);
	$pdf->Cell(6,6,$ing['sexo'],1,0);
	$pdf->Cell(20,6,$ing['fecha'],1,0);
	$pdf->Cell(33,6,$ing['motivo'],1,0);
	$pdf->Ln(6);
	}while ($ing = pg_fetch_array($consulta));



$pdf->SetFont('Arial','B',9);
$pdf->Ln(10);
$pdf->SetXY(60,200);


$sql7="SELECT * FROM pstab.egresos WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'";
$consulta = pg_query($conex,$sql7);
$egre = pg_fetch_array($consulta);

$pdf->Cell(140,6,'Egresos',1,0);
$pdf->Ln(6);
$pdf->SetXY(60,206);
$pdf->Cell(30,6,'Nombre y Apellido',1,0);
$pdf->Cell(20,6,'F.N',1,0);
$pdf->Cell(25,6,'Lugar de Nac.',1,0);
$pdf->Cell(6,6,'E',1,0);
$pdf->Cell(6,6,'S',1,0);
$pdf->Cell(20,6,'Fecha',1,0);
$pdf->Cell(33,6,'Motivo',1,0);
$pdf->Ln(6);
$pdf->SetXY(60,212);
do {
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(30,6,$egre['nombre_apellido_e'],1);
	$pdf->Cell(20,6,$egre['f_n_e'],1,0);
	$pdf->Cell(25,6,$egre['lugar_nacimiento_e'],1,0);
	$pdf->Cell(6,6,$egre['edad_e'],1,0);
	$pdf->Cell(6,6,$egre['sexo_e'],1,0);
	$pdf->Cell(20,6,$egre['fecha_e'],1,0);
	$pdf->Cell(33,6,$egre['motivo_e'],1,0);
	$pdf->Ln(6);
	}while ($egre = pg_fetch_array($consulta));

$firmaDocente="________________";
$pdf->SetXY(150, 248);
$pdf->Cell(30,6,$firmaDocente,0);
$pdf->Ln(2);
$pdf->SetXY(158, 252);
$pdf->Cell(30,6,'Docente',0);


$pdf->Output();
?> 



