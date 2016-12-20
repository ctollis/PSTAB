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
$t_v_pm=$_POST['t_v_pm']; //Total de alumnos inscritos para el primer dia del mes
$t_h_pm=$_POST['t_h_pm']; //Total de alumnos inscritos para el primer dia del mes
$v_m_m=$_POST['v_m_m'];   //Alumnos matriculados en el mes
$h_m_m=$_POST['h_m_m'];   //Alumnos matriculados en el mes
$v_r_m=$_POST['v_r_m'];   //Alumnos retirados en el mes
$h_r_m=$_POST['h_r_m'];	  //Alumnos retirados en el mes		
//$v_m_um=$_POST['v_m_um']; //Alumnos matriculados para el ultimo dia del mes
//$h_m_um=$_POST['h_m_um']; //Alumnos matriculados para el ultimo dia del mes


$estadistica= new Estadisticas();

$cnn=$estadistica->conectaBD();
if (!$cnn) { // Si la Conexion  Falla
   $estadistica->mensajesError(1,$cnn);
   exit();
}	

$Consulta=$estadistica->ejecutaQuery("INSERT INTO pstab.matricula (t_v_pm, t_h_pm, v_m_m, h_m_m, v_r_m, h_r_m, docente, grado, seccion, mes, ano) VALUES ('$t_v_pm', '$t_h_pm', '$v_m_m', '$h_m_m', '$v_r_m', '$h_r_m', '$docente', '$grado', '$seccion', '$mes', '$ano')"); //Ejecuta el Query en la Base de Datos

	$Registro=$estadistica->recibeRegistro($Consulta);
		if (!$Consulta) { // Si No se Ejecuta el Query
   		$estadistica->mensajesError(2,$cnn);
   		exit();
 		}
		else{
	echo "<script type='text/javascript'> 
		alert('Datos estadisticos registrados satisfactoriamente!');
        location='../vista/registroEstadistica4.php?docente=$docente&grado=$grado&seccion=$seccion&mes=$mes&ano=$ano'
        </script>";
		}

 ?>