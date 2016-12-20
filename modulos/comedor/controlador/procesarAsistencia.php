<?php
session_start();
require_once("../modelo/modeloComedor.php");
?>

<?php 
	// $cedula=$_POST['asistencia'];
	// echo "$cedula";

	$comedor = new comedor();

		$cnn=$comedor->conectaBD();
		if (!$cnn) { // Si la Conexion  Falla
   		$comedor->mensajesError(1,$cnn);
   		exit();
		}	 

	$fecha=$_POST["fecha"];
	//echo $fecha."<br>";
	if (@$_POST["Guardar"]) {
	
		foreach ($_POST["cedulas_estu_com"] as $cedula_estu_com) {
		
		//echo $cedula_estu_com."<br>";
		$Consulta=$comedor->ejecutaQuery("INSERT INTO pstab.asistencia_comedor (cedula_estu_com, asistencia, fecha) VALUES ('$cedula_estu_com', 'Si', '$fecha')"); 	
		}	

		foreach ($_POST["cedulas_estu_com_no"] as $cedula_estu_com_no) {
		
		//echo $cedula_estu_com_no."<br>";
		$Consulta=$comedor->ejecutaQuery("INSERT INTO pstab.asistencia_comedor (cedula_estu_com, asistencia, fecha) VALUES ('$cedula_estu_com_no', 'No', '$fecha')"); 	
		}		
	}

	$Registro=$comedor->recibeRegistro($Consulta);
 	if (!$Consulta) { // Si No se Ejecuta el Query
 		 $comedor->mensajesError(2,$cnn);
  		exit();
 
	 	}else{
	 		echo "<script type='text/javascript'> 
					alert('Asistencia al comedor registrada exitosamente!');
        		location='../vista/registrarAsistencia.php'
        		</script>";	
	 	$comedor->cierraConexionBd($cnn);
	 }
	 
?>
