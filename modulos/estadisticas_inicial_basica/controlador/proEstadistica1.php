<?php 
session_start();
require_once("../modelo/modeloEstadisticas.php");
if (isset($_SESSION['cedula'])){ 
    $UsuarioActivo = $_SESSION['cedula'];  
    $NombreUsuarioActivo = $_SESSION['username'];
    $nombreApellido=$_SESSION['nombreApellido'];
}

$docente=$_POST['docente'];
$grado=$_POST['grado'];
$seccion=$_POST['seccion'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$dias_habiles=$_POST['dias_habiles'];

//echo "'$docente', '$grado', '$seccion', '$mes', '$dias_habiles' ";

$estadistica= new Estadisticas();

$cnn=$estadistica->conectaBD();
if (!$cnn) { // Si la Conexion  Falla
   $estadistica->mensajesError(1,$cnn);
   exit();
}	
	
$comprobacion=$estadistica->ejecutaQuery("SELECT * FROM pstab.datos_estadisticos where docente='$docente' and grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano' and dias_habiles='$dias_habiles'");
	$existe=$estadistica->recibeRegistro($comprobacion);
	if($existe!=""){
	echo "<script type='text/javascript'> 
		alert('Estadisticas ya existe, verifique los datos!');
        location='../vista/registroEstadisticas.php'
        </script>";
	}
	
$Consulta=$estadistica->ejecutaQuery("INSERT INTO pstab.datos_estadisticos (docente, grado, seccion, mes, ano, dias_habiles) VALUES ('$docente', '$grado', '$seccion', '$mes', '$ano', '$dias_habiles')"); //Ejecuta el Query en la Base de Datos

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