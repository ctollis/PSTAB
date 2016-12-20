<?php
session_start();
require_once("../modelo/modeloComedor.php");
?>

<html>
<head>
<title>Procesa Formulario</title>
</head>
<body>
<?php
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
//$username=$_POST["username"];
//$clave=$_POST["clave"];
$cedula=$_POST["cedula_estu_com"];
//$tipo_usuario=$_POST["tipo_usuario"];
$Modificar=$_POST["Modificar"];
$eliminar=$_POST["Eliminar"];

$Usuario = new Comedor();

//echo "'$nombre','$apellido','$cedula'";

$cnn=$Usuario->conectaBD();
if (!$cnn) { // Si la Conexion  Falla
   $Usuario->mensajesError(1,$cnn);
   exit();
}	             
if($Modificar){  // Si presionó el boton modificar
	$Consulta= $Usuario->ejecutaQuery("UPDATE pstab.lista_comedor SET nombre='$nombre', apellido='$apellido' WHERE cedula_estu_com='$cedula'"); //Ejecuta el Query en la Base de Datos
	if (!$Consulta) { // Si No se Ejecuta el Query
		$Usuario->mensajesError(2,$cnn);
		exit();
	}else{
		echo "<script type='text/javascript'> 
		alert('Estudiante Modificado exitosamente!');
        location='../vista/ConsultarEstudiantesComedor.php'
        </script>";		
	}
}


if($eliminar){ // Si preionó el boton eliminar

	$Consulta= $Usuario->ejecutaQuery("UPDATE pstab.lista_comedor SET estado='Inactivo' WHERE cedula_estu_com='$cedula'"); //Ejecuta el Query en la Base de Datos
	if (!$Consulta) { // Si No se Ejecuta el Query
		$Usuario->mensajesError(2,$cnn);
		exit();
	}else{
		echo "<script type='text/javascript'> 
		alert('Estudiante Eliminado exitosamente!');
        location='../vista/ConsultarEstudiantesComedor.php'
        </script>";	
	}
}

$Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos		
?>
</form>
</body>
</html>