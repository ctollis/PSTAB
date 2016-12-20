<?php 
session_start();
require_once("../modelo/modeloEstadisticas.php");
if (isset($_SESSION['cedula'])){ 
    $UsuarioActivo = $_SESSION['cedula'];  
    $NombreUsuarioActivo = $_SESSION['username'];
  
}

$dia=$_POST['dia'];
$varones=$_POST['varones'];
$hembras=$_POST['hembras'];
$docente=$_GET['docente'];
$grado=$_GET['grado'];
$seccion=$_GET['seccion'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
//echo "'$UsuarioActivo', '$dia', '$varones', '$hembras', '$docente', '$grado', '$seccion', '$mes', '$ano'";
$estadistica= new Estadisticas();

$cnn=$estadistica->conectaBD();
if (!$cnn) { // Si la Conexion  Falla
   $estadistica->mensajesError(1,$cnn);
   exit();
}	
	
$comprobacion=$estadistica->ejecutaQuery("SELECT * FROM pstab.asistencia_estadistica where dia='$dia' and grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");
	$existe=$estadistica->recibeRegistro($comprobacion);
	if($existe!=""){
	echo "<script type='text/javascript'> 
		alert('D\u00eda ya registrado, verifique los datos');
        location='../vista/registroEstadistica2.php?docente=$docente&grado=$grado&seccion=$seccion&mes=$mes&ano=$ano'
        </script>";
		}
	

$Consulta=$estadistica->ejecutaQuery("INSERT INTO pstab.asistencia_estadistica (dia, varones, hembras, docente, grado, seccion, mes, ano) VALUES ('$dia', '$varones', '$hembras', '$docente', '$grado', '$seccion', '$mes', '$ano')"); //Ejecuta el Query en la Base de Datos

	$Registro=$estadistica->recibeRegistro($Consulta);
		if (!$Consulta) { // Si No se Ejecuta el Query
   		$estadistica->mensajesError(2,$cnn);
   		exit();
 		}
		else{
	echo "<script type='text/javascript'> 
		alert('Datos estadisticos registrados satisfactoriamente!');
        location='../vista/registroEstadistica2.php?docente=$docente&grado=$grado&seccion=$seccion&mes=$mes&ano=$ano'
        </script>";
		}

 ?>