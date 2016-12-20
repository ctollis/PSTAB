<!DOCTYPE html>
<?php

session_start();
require_once("../../usuario/modelo/modeloUsuarios.php");
if (isset($_SESSION['cedula'])){  // Si el usuario inicio sesion correctamente
    $IdUsuarioActivo = $_SESSION['cedula']; 
    $NombreUsuarioActivo = $_SESSION['username'];
}
//Validamos si existe realmente una sesión activa o no 
/*if($_SESSION['tipo_usuario'] != "Admin")
{ 
	@session_start();
	unset($_SESSION["cedula"]); 
	unset($_SESSION["username"]);
	session_destroy();
	
 //  exit;
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
}*/ 
?>

<?php 
if ($_SESSION['tipo_usuario'] == "Admin") {
?>

<html>
<head>
	<link href="../../../estilos/estilo.css" rel="stylesheet" type "text/css"/>
	<link rel="stylesheet" type="text/css" href="../../recursos/iconos/style.css">
	<title>UEMAB-Panel-Administrador</title>
</head>
<body>

		<header id="main-header" >
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Panel Administrador</span>	
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
 				<li><a href="../../usuario/vista/ConsultarUsuarios.php"><span class="icon-users"></span>&nbspGesti&oacuten de Usuarios</a></li>
 				<li><a href="../../inscripcion/vista/inscripciones.php"><span class="icon-text-document"></span>&nbspInscripciones</a></li>
 				<!-- <li><a href="../../estadisticas/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Media</a></li> -->
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstad&iacutesticas Inicial y B&aacutesica</a></li>
				<li><a href="../../comedor/vista/comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
				
			</ul>
		</div> 
</body>
</html>
<?php  }
elseif ($_SESSION['tipo_usuario'] == "Docente") {
?>

<html>
<head>
	
	<link href="../../../estilos/estilo.css" rel="stylesheet" type "text/css"/>
	<link rel="stylesheet" type="text/css" href="../../recursos/iconos/style.css">
	<title>UEMAB-Panel-Docente</title>
</head>
<body>
		<header id="main-header" >
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Panel Administrador</span>	
		</a>
		<nav>
			<ul>
				<li><a><span class="icon-user"></span>&nbsp&nbsp<?php echo $NombreUsuarioActivo ?></a></li>
				<li><a href="../../usuario/modelo/cerrar_sesion.php" id="bt_cerrar_sesion" >Cerrar Sesion</a></li>
			</ul>
		</nav>
		
 		</header>

 		<div id="menu" >
 			<ul>
 				<li><a href="panel_administrador.php"><span class="icon-home"></span>&nbsp&nbspInicio</a></li>
 				<!-- <li><a href=""><span class="icon-text-document"></span>&nbspInscripciones</a></li> -->
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Inicial/Basica</a></li>
				<!-- <li><a href="">Estadisticas Inicial/Basica</a></li> -->
				<!-- <li><a href=""><span class="icon-new-message"></span>&nbspComedor</a></li> -->
			</ul>
		</div>
</body>
</html>

<?php 
	}
	else
	{
		echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
	}
?>






