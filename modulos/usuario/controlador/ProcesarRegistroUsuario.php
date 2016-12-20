<?php

session_start();
require_once("../modelo/modeloUsuarios.php");
 
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$username=$_POST["username"];
$clave=$_POST["clave"];
$cedula=$_POST["cedula"];
$tipo_usuario=$_POST["tipo_usuario"];

$Usuario = new Usuario();

$cnn=$Usuario->conectaBD();
if (!$cnn) { // Si la Conexion  Falla
   $Usuario->mensajesError(1,$cnn);
   exit();
}	             
//echo"'$cedula','$username', '$clave', '$nombre', '$apellido','$tipo_usuario'";
	$comprobacion=$Usuario->ejecutaQuery("SELECT * FROM pstab.usuario where cedula='$cedula' or username='$username'");
	$existe=$Usuario->recibeRegistro($comprobacion);
	if($existe!=""){
	echo "<script type='text/javascript'> 
		alert('Usuario ya existe, verifique los datos!');
        location='../vista/ConsultarUsuarios.php'
        </script>";
	}
	$Consulta=$Usuario->ejecutaQuery("INSERT INTO pstab.usuario (cedula, username, clave, nombre, apellido, tipo_usuario, estado) VALUES ('$cedula','$username', '$clave', '$nombre', '$apellido','$tipo_usuario', 'Activo')"); //Ejecuta el Query en la Base de Datos

	$Registro=$Usuario->recibeRegistro($Consulta);
		if (!$Consulta) { // Si No se Ejecuta el Query
   		$Usuario->mensajesError(2,$cnn);
   		exit();
 		}
		else{
	echo "<script type='text/javascript'> 
		alert('Usuario Registrado Satisfactoriamente!');
        location='../vista/ConsultarUsuarios.php'
        </script>";
		}

$Usuario->cierraConexionBd($cnn); 		
?>
</form>
</body>
</html>

