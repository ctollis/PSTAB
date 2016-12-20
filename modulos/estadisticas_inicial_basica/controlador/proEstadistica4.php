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
$cuatrov=$_POST['cuatrov'];
$cincov=$_POST['cincov'];
$seisv=$_POST['seisv'];
$sietev=$_POST['sietev'];
$ochov=$_POST['ochov'];
$nuevev=$_POST['nuevev'];
$diezv=$_POST['diezv'];
$oncev=$_POST['oncev'];
$docev=$_POST['docev'];
$trecev=$_POST['trecev'];
$catorcev=$_POST['catorcev'];
$quincev=$_POST['quincev'];
$cuatroh=$_POST['cuatroh'];
$cincoh=$_POST['cincoh'];
$seish=$_POST['seish'];
$sieteh=$_POST['sieteh'];
$ochoh=$_POST['ochoh'];
$nueveh=$_POST['nueveh'];
$diezh=$_POST['diezh'];
$onceh=$_POST['onceh'];
$doceh=$_POST['doceh'];
$treceh=$_POST['treceh'];
$catorceh=$_POST['catorceh'];
$quinceh=$_POST['quinceh'];

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

$Consulta=$estadistica->ejecutaQuery("INSERT INTO pstab.repitientes_edad_sexo(cuatrov,
  cincov, seisv, sietev, ochov, nuevev, diezv, oncev, docev, trecev, catorcev, quincev,
  cuatroh, cincoh, seish, sieteh, ochoh, nueveh, diezh, onceh, doceh, treceh, catorceh, quinceh, docente, grado,seccion, mes, ano) VALUES ('$cuatrov',
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
        location='../vista/registroEstadistica5.php?docente=$docente&grado=$grado&seccion=$seccion&mes=$mes&ano=$ano'
        </script>";
		}

 ?> 