<!DOCTYPE html>
<?php

session_start();
require_once("../../usuario/modelo/modeloUsuarios.php");
if (isset($_SESSION['cedula'])){  // Si el usuario inicio sesion correctamente
    $IdUsuarioActivo = $_SESSION['cedula']; 
    $NombreUsuarioActivo = $_SESSION['username'];
}
if($_SESSION['tipo_usuario'] != "Admin")
{ 
	@session_start();
  	unset($_SESSION["cedula"]); 
  	unset($_SESSION["username"]);
  	session_destroy();
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
} 
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comedor</title>
	<link href="CSS/estilo.css" rel="stylesheet" type "text/css"/>
	<link rel="stylesheet" type="text/css" href="../../recursos/iconos/style.css">
</head>
<body>
<header id="main-header" >
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Comedor</span>
		</a>
		<nav>
			<ul>
				<li><a><span class="icon-user"></span>&nbsp&nbsp<?php echo $NombreUsuarioActivo ?></a></li>
				<li><a href="../../usuario/modelo/cerrar_sesion.php" id="bt_cerrar_sesion" >Cerrar Sesi&oacuten</a></li>
			</ul>
		</nav>
		
 		</header>

 		<div id="menu" >
 			<ul>
 			<li><a href="../../pagina_principal/vista_administrador/panel_administrador.php"><span class="icon-home"></span>&nbsp&nbspInicio</a></li>
 				<li><a href="../../usuario/vista/ConsultarUsuarios.php"><span class="icon-users"></span>&nbspGesti&oacuten de Usuarios</a></li>
 				<li><a href="../../inscripcion/vista/inscripciones.php"><span class="icon-text-document"></span>&nbspInscripciones</a></li>
 				<!-- <li><a href="../../estadisticas/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Media</a></li> -->
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Inicial y B&aacutesica</a></li>
				<li><a href="comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
				
			</ul>
		</div>

		<div id="menu_opciones" >
 			<ul class="nav">
 				
 				<li><a href="RegistrarEstudianteComedor.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Estudiante</a></li>
 				<li><a href="ConsultarEstudiantesComedor.php"><span class="icon-list"></span>&nbsp&nbspLista Estudiantes Comedor</a></li>
 				<li><a href="registrarAsistencia.php"><span class="icon-edit"></span>&nbsp&nbspRegistrar Asistencia</a></li>
 				<li><a href="ConsultarAsistencia.php"><span class="icon-magnifying-glass"></span>&nbsp&nbspConsultar Asistencia</a></li>
 				
 			</ul>
		</div>
	
</body>
</html>