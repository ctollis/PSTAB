<?php
session_start();
require_once("../modelo/modeloUsuarios.php");


if (isset($_SESSION['cedula'])){  
    $UsuarioActivo = $_SESSION['cedula']; 
    $NombreUsuarioActivo = $_SESSION['username'];
}

    $cedula=$_GET['cedula'];
		
	$Usuario = new Usuario();
	$cnn=$Usuario->conectaBD();
	if (!$cnn) { 
	   $Usuario->mensajesError(1,$cnn);
	   exit();
	}	             
	
	$Consulta= $Usuario->ejecutaQuery(" UPDATE pstab.usuario SET estado='Activo' WHERE cedula='$cedula'"); 
	if (!$Consulta) {
	   $Usuario->mensajesError(2,$cnn);
	   exit();
	   }
	   else
	  		echo "<script type='text/javascript'> 
				alert('Usuario Activado!');
               location='../vista/ConsultarUsuarios.php'
                </script>";
		
		//echo "<p><a href='../vista/ConsultarUsuarios.php'>Click para volver</a></p>";	
	
	$Usuario->cierraConexionBd($cnn); 		
?>

</body>
</html>

