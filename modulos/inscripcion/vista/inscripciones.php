<!DOCTYPE html>
<?php

session_start();
require_once("../../inscripcion/modelo/modeloinscripciones.php");
if (isset($_SESSION['cedula'])){  // Si el usuario inicio sesion correctamente
    $IdUsuarioActivo = $_SESSION['cedula']; 
    $NombreUsuarioActivo = $_SESSION['username'];
}
//Validamos si existe realmente una sesión activa o no 
if($_SESSION['tipo_usuario'] != "Admin")
{ 
	@session_start();
	unset($_SESSION["cedula"]); 
	unset($_SESSION["username"]);
	session_destroy();
	header("Location: ../../../index.php");
  exit;
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
	<link href="css/estilo.css" rel="stylesheet" type "text/css"/>
	<link rel="stylesheet" type="text/css" href="css/iconos/style.css">




	<title>UEMAB- Inscripciones</title>
</head>
<body >
		
		<header id="main-header" >
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Inscripciones</span>	
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
 				<li><a href=""><span class="icon-text-document"></span>&nbspInscripciones</a></li>
 		
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Inicial/Basica</a></li>
				<li><a href="../../comedor/vista/comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
			</ul>
			</div>
			<div id="menu_opciones" >
 			<ul class="nav">
 				<li><a href="../vista/Registrarinscripcion1.php"><span class="icon-add-user"></span>&nbsp&nbspInscribir Estudiante</a></li>
				<li><a href="Listadeinscripcion.php"><span class="icon-list"></span>&nbsp&nbspLista de Estudiantes </a></li>
 				<li><a href="Consultarinscripcion.php"><span class="icon-magnifying-glass"></span>&nbsp&nbspConsultar Estudiante</a></li>
 				
 				
 			</ul>
		</div>