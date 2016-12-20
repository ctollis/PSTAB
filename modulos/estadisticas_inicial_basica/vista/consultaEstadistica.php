<!DOCTYPE html>

<?php
session_start();
require_once("../modelo/modeloEstadisticas.php");
if (isset($_SESSION['cedula'])){  //Si el usuario inicio sesion correctamente
    $UsuarioActivo = $_SESSION['cedula'];  
    $NombreUsuarioActivo = $_SESSION['username'];
}
/*if($_SESSION['tipo_usuario'] != "Admin")
{ 
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
} */
if ($_SESSION['tipo_usuario'] == "Admin") {
	
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="CSS/estiloEstadistica.css" rel="stylesheet" type "text/css"/>
	<link rel="stylesheet" type="text/css" href="../../recursos/iconos/style.css">
	<title>UEMAB-ControlEstadisticasMensuales</title>
</head>
<body>
		
		<header id="main-header">
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Estad&iacutesticas Inicial y B&aacutesica</span>
		</a>
		<nav>
			<ul>
				<li><a><span class="icon-user"></span>&nbsp&nbsp<?php echo $NombreUsuarioActivo ?></a> 
				<li><a href="../modelo/cerrar_sesion.php" id="bt_cerrar_sesion">Cerrar Sesi&oacuten</a></li>
			
			</ul>
		</nav>
		
 		</header>

		<div id="menu" >
 			<ul>
 				<li><a href="../../pagina_principal/vista_administrador/panel_administrador.php"><span class="icon-home"></span>&nbsp&nbspInicio</a></li>
 				<li><a href="../../usuario/vista/ConsultarUsuarios.php"><span class="icon-users"></span>&nbspGesti&oacuten de Usuarios</a></li>
 				<li><a href="../../inscripcion/vista/inscripciones.php"><span class="icon-text-document"></span>&nbspInscripciones</a></li>
 				<!-- <li><a href=""><span class="icon-bar-graph"></span>&nbspEstadisticas Media</a></li> -->
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstad&iacutesticas Inicial y B&aacutesica</a></li>
				<li><a href="../../comedor/vista/comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
			</ul>
		</div>

		<div id="menu_opciones">
 			<ul class="nav">
 				
 				<li><a href="registroEstadisticas.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Estad&iacutesticas</a></li>
 				<li><a href="consultaEstadistica.php"><span class="icon-magnifying-glass"></span>&nbsp&nbspConsultar Estad&iacutesticas</a></li>
 				<!-- <li><a href=""><span class="icon-print"></span>&nbsp&nbspReporte de Estad&iacutesticas</a></li> -->
 				
 			</ul>
		</div>

		<div id="estadistica">
	<form action="../controlador/buscarEstadistica.php" method="POST">
		<table width="40%" id="estadistica1" border="1" cellspacing="8px">
			<tr><td colspan="5"><h4>Buscar Estad&iacutestica</h4></td></tr>
			<tr>
				<td>Grado&nbsp&nbsp&nbsp&nbsp<select name="grado">  
				<option value=""></option>
				<!-- <option disabled>---Bachillerato---</option> -->
				<!-- <option value="1er Año" >1er año</option> -->
				<!-- <option value="2do Año" >2do año</option> -->
				<!-- <option value="3er Año" >3er año</option> -->
				<option disabled >---Basica---</option>
				<option value="1er Grado">1er Grado</option>
				<option value="2do Grado">2do Grado</option>
				<option value="3er Grado">3er Grado</option>
				<option value="4to Grado">4to Grado</option>
				<option value="5to Grado">5to Grado</option>
				<option value="6to Grado">6to Grado</option>
				<option disabled>---Inicial---</option>
				<option value="Inicial">Inicial</option>
			</select></td>
			<td>
			&nbsp&nbsp&nbspTurno<select name="seccion">
				<option value=""> </option>
				<!-- <option value="A"> A</option>
				<option value="B"> B</option>
				<option value="C"> C</option> -->
				<option value="Mañana">Mañana</option>
				<option value="Tarde">Tarde</option>	
			</select></td>
		
		<td>Mes: <select name="mes" >
			<option value=""></option>
			<option value="Enero">Enero</option>
			<option value="Febrero">Febrero</option>
			<option value="Marzo">Marzo</option>
			<option value="Abril">Abril</option>
			<option value="Mayo">Mayo</option>
			<option value="Junio">Junio</option>
			<option value="Julio">Julio</option>
			<option value="Agosto">Agosto</option>
			<option value="Septiembre">Septiembre</option>
			<option value="Octubre">Octubre</option>
			<option value="Noviembre">Noviembre</option>
			<option value="Diciembre">Diciembre</option>
		</select></td>
		<td>
		A&ntildeo: <select name="ano" >
		<option ></option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
		</select>

		</td>

		<tr><td align="center" colspan="5"><input type="submit" value="Buscar" name="Buscar"></td></tr>
		</table>
		</form>
	</div>
</body>
</html>

<?php 
}
elseif ($_SESSION['tipo_usuario'] == "Docente") {
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="CSS/estiloEstadistica2.css" rel="stylesheet" type "text/css"/>
	<link rel="stylesheet" type="text/css" href="../../recursos/iconos/style.css">
	<title>UEMAB-ControlEstadisticasMensuales</title>
</head>
<body>
		
		<header id="main-header">
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Estad&iacutesticas Inicial y B&aacutesica</span>
		</a>
		<nav>
			<ul>
				<li><a><span class="icon-user"></span>&nbsp&nbsp<?php echo $NombreUsuarioActivo ?></a> 
				<li><a href="../modelo/cerrar_sesion.php" id="bt_cerrar_sesion">Cerrar Sesi&oacuten</a></li>
			
			</ul>
		</nav>
		
 		</header>

		<div id="menu" >
 			<ul>
 				<li><a href="../../pagina_principal/vista_administrador/panel_administrador.php"><span class="icon-home"></span>&nbsp&nbspInicio</a></li>
 				
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstad&iacutesticas Inicial y B&aacutesica</a></li>
				
			</ul>
		</div>

		<div id="menu_opciones">
 			<ul class="nav">
 				
 				<li><a href="registroEstadisticas.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Estad&iacutesticas</a></li>
 				<li><a href="consultaEstadistica.php"><span class="icon-magnifying-glass"></span>&nbsp&nbspConsultar Estad&iacutesticas</a></li>
 				<!-- <li><a href=""><span class="icon-print"></span>&nbsp&nbspReporte de Estad&iacutesticas</a></li> -->
 				
 			</ul>
		</div>

		<div id="estadistica">
	<form action="../controlador/buscarEstadistica.php" method="POST">
		<table width="40%" id="estadistica1" border="1" cellspacing="8px">
			<tr><td colspan="5"><h4>Buscar Estad&iacutestica</h4></td></tr>
			<tr>
				<td>Grado&nbsp&nbsp&nbsp&nbsp<select name="grado">  
				<option value=""></option>
				<!-- <option disabled>---Bachillerato---</option> -->
				<!-- <option value="1er Año" >1er año</option> -->
				<!-- <option value="2do Año" >2do año</option> -->
				<!-- <option value="3er Año" >3er año</option> -->
				<option disabled >---Basica---</option>
				<option value="1er Grado">1er Grado</option>
				<option value="2do Grado">2do Grado</option>
				<option value="3er Grado">3er Grado</option>
				<option value="4to Grado">4to Grado</option>
				<option value="5to Grado">5to Grado</option>
				<option value="6to Grado">6to Grado</option>
				<option disabled>---Inicial---</option>
				<option value="Inicial">Inicial</option>
			</select></td>
			<td>
			&nbsp&nbsp&nbspTurno<select name="seccion">
				<option value=""> </option>
				<!-- <option value="A"> A</option>
				<option value="B"> B</option>
				<option value="C"> C</option> -->
				<option value="Mañana">Mañana</option>
				<option value="Tarde">Tarde</option>	
			</select></td>
		
		<td>Mes: <select name="mes" >
			<option value=""></option>
			<option value="Enero">Enero</option>
			<option value="Febrero">Febrero</option>
			<option value="Marzo">Marzo</option>
			<option value="Abril">Abril</option>
			<option value="Mayo">Mayo</option>
			<option value="Junio">Junio</option>
			<option value="Julio">Julio</option>
			<option value="Agosto">Agosto</option>
			<option value="Septiembre">Septiembre</option>
			<option value="Octubre">Octubre</option>
			<option value="Noviembre">Noviembre</option>
			<option value="Diciembre">Diciembre</option>
		</select></td>
		<td>
		A&ntildeo: <select name="ano" >
		<option ></option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
		</select>

		</td>

		<tr><td align="center" colspan="5"><input type="submit" value="Buscar" name="Buscar"></td></tr>
		</table>
		</form>
	</div>
</body>
</html>

<?php 
}
else{
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
        }
?>

