<?php
session_start();
require_once("../modelo/modeloUsuarios.php");


if (isset($_SESSION['cedula'])){  // Si el usuario inicio sesion correctamente
    $UsuarioActivo = $_SESSION['cedula']; 
    $NombreUsuarioActivo = $_SESSION['username'];
}
?>

<html>
<head>
<title>Editar Usuario</title>
</head>
<body>

<header >
		<header id="main-header">
		
		<a id="logo-header" >
			<span class="nombre_sitio">U.E.M Andres bello</span>
			<span class="nombre_seccion">Gestion de Usuarios</span>
		</a>
		<nav>
			<ul>
				<li><a> Usuario Actual: <?php echo $NombreUsuarioActivo ?></a>
					<a href="../base_datos/cerrar_sesion.php"><input type="button" value="Cerrar Sesion" ></a>
				</li>
			</ul>
		</nav>
		
 		</header>
<?php 	
    // Captura la variable enviada por URL	  
    $cedula=$_GET['cedula'];
		
	$Usuario = new Usuario();

	$cnn=$Usuario->conectaBd();
	if (!$cnn) { // Si la Conexion  Falla
	   $Usuario->mensajesError(1,$cnn);
	   exit();
	}	             
echo "SELECT * from pstab.usuario WHERE cedula='$cedula'";
	$Consulta= $Usuario->ejecutaQuery("SELECT * from pstab.usuario WHERE cedula='$cedula'"); //Ejecuta el Query en la Base de Datos
	if (!$Consulta) {
	   $Usuario->mensajesError(2,$cnn);
	   exit();
	}
	?>


	<form method="post" action="ActualizarUsuario.php"> 
	<td><input type="submit" value=" Eliminar " name="Eliminar"></td>
