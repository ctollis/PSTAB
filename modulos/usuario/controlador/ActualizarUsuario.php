<?php
session_start();
require_once("../modelo/modeloUsuarios.php");
?>

<html>
<head>
<title>Procesa Formulario</title>
</head>
<body>
<?php
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$username=$_POST["username"];
$clave=$_POST["clave"];
$cedula=$_POST["cedula"];
$tipo_usuario=$_POST["tipo_usuario"];
$Modificar=$_POST["Modificar"];
$eliminar=$_POST["Eliminar"];

$Usuario = new Usuario();

//echo "'$nombre','$apellido','$clave','$tipo_usuario','$username','$cedula'";

$cnn=$Usuario->conectaBD();
if (!$cnn) { // Si la Conexion  Falla
   $Usuario->mensajesError(1,$cnn);
   exit();
}	             
if($Modificar){  // Si presionó el boton modificar
	$Consulta= $Usuario->ejecutaQuery("UPDATE pstab.usuario SET nombre='$nombre', apellido='$apellido', clave='$clave', tipo_usuario='$tipo_usuario' WHERE cedula='$cedula'"); //Ejecuta el Query en la Base de Datos
	if (!$Consulta) { // Si No se Ejecuta el Query
		$Usuario->mensajesError(2,$cnn);
		exit();
	}else{
		echo "<script type='text/javascript'> 
		alert('Usuario modificado Satisfactoriamente!');
        location='../vista/ConsultarUsuarios.php'
        </script>";
		
	}
}
if($eliminar){ // Si preionó el boton eliminar

	$Consulta= $Usuario->ejecutaQuery("UPDATE pstab.usuario SET estado='Inactivo' WHERE cedula='$cedula'"); //Ejecuta el Query en la Base de Datos
	if (!$Consulta) { // Si No se Ejecuta el Query
		$Usuario->mensajesError(2,$cnn);
		exit();
	}else{
		echo "<script type='text/javascript'> 
		alert('Usuario Eliminado Satisfactoriamente!');
        location='../vista/ConsultarUsuarios.php'
        </script>";
		
	}
}
$Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos		
?>
</form>
</body>
</html>