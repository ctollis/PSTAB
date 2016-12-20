<?php 
session_start();
require_once("../modelo/modeloEstadisticas.php");
if (isset($_SESSION['cedula'])){ 
    $UsuarioActivo = $_SESSION['cedula'];  
    $NombreUsuarioActivo = $_SESSION['username'];
  
}

$docente=$_GET['docente'];
$grado=$_GET['grado'];
$seccion=$_GET['seccion'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$cuatrov=$_POST['ccuatrov'];
$cincov=$_POST['ccincov'];
$seisv=$_POST['cseisv'];
$sietev=$_POST['csietev'];
$ochov=$_POST['cochov'];
$nuevev=$_POST['cnuevev'];
$diezv=$_POST['cdiezv'];
$oncev=$_POST['concev'];
$docev=$_POST['cdocev'];
$trecev=$_POST['ctrecev'];
$catorcev=$_POST['ccatorcev'];
$quincev=$_POST['cquincev'];
$cuatroh=$_POST['ccuatroh'];
$cincoh=$_POST['ccincoh'];
$seish=$_POST['cseish'];
$sieteh=$_POST['csieteh'];
$ochoh=$_POST['cochoh'];
$nueveh=$_POST['cnueveh'];
$diezh=$_POST['cdiezh'];
$onceh=$_POST['conceh'];
$doceh=$_POST['cdoceh'];
$treceh=$_POST['ctreceh'];
$catorceh=$_POST['ccatorceh'];
$quinceh=$_POST['cquinceh'];

$estadistica= new Estadisticas();

$cnn=$estadistica->conectaBD();
if (!$cnn) { // Si la Conexion  Falla
   $estadistica->mensajesError(1,$cnn);
   exit();
}	
	
	// $comprobacion=$estadistica->ejecutaQuery("SELECT * FROM pstab.datos_estadisticos where cedula_doc='$UsuarioActivo' and grado='$grado' and seccion='$seccion' and mes='$mes'");
	// $existe=$estadistica->recibeRegistro($comprobacion);
	// if($existe!=""){
	// echo "<script type='text/javascript'> 
	// 	alert('Datos estadisticos ya se encuentran registrados, verifique los datos!');
 //        location='../vista/registroEstadisticas.php'
 //        </script>";
	// }

$Consulta=$estadistica->ejecutaQuery("INSERT INTO pstab.clasificacion_edad_sexo(ccuatrov,
  ccincov, cseisv, csietev, cochov, cnuevev, cdiezv, concev, cdocev, ctrecev, ccatorcev, cquincev,
  ccuatroh, ccincoh, cseish, csieteh, cochoh, cnueveh, cdiezh, conceh, cdoceh, ctreceh, ccatorceh, cquinceh, docente, grado, seccion, mes, ano) VALUES ('$cuatrov',
  '$cincov', '$seisv', '$sietev', '$ochov', '$nuevev', '$diezv', '$oncev', '$docev', '$trecev', '$catorcev', '$quincev',
  '$cuatroh', '$cincoh', '$seish', '$sieteh', '$ochoh', '$nueveh', '$diezh', '$onceh', '$doceh', '$treceh', '$catorceh', '$quinceh', '$docente', '$grado', '$seccion', '$mes', '$ano')"); //Ejecuta el Query en la Base de Datos

	$Registro=$estadistica->recibeRegistro($Consulta);
		if (!$Consulta) { // Si No se Ejecuta el Query
   		$estadistica->mensajesError(2,$cnn);
   		exit();
 		}
		else{

		echo "<script type='text/javascript'> 
		alert('Datos estadisticos registrados satisfactoriamente!');
        location='../vista/registroIngresos.php?docente=$docente&grado=$grado&seccion=$seccion&mes=$mes&ano=$ano'
        </script>";
		}

 ?> 