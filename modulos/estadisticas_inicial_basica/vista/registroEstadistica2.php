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
if ($_SESSION['tipo_usuario']== "Admin") {
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
			<span class="nombre_seccion">Estadisticas Inicial y Basica</span>
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
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Inicial/B&aacutesica</a></li>
				<li><a href="../../comedor/vista/comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
			</ul>
		</div>

		<div id="menu_opciones" >
 			<ul class="nav">
 				
 				<li><a href="registroEstadisticas.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Estad&iacutesticas</a></li>
 				<li><a href="consultaEstadistica.php"><span class="icon-magnifying-glass"></span>&nbsp&nbspConsultar Estad&iacutesticas</a></li>
 				<!-- <li><a href=""><span class="icon-print"></span>&nbsp&nbspReporte de Estad&iacutesticas</a></li> -->
 				
 				
 			</ul>
		</div>
		<?php 
			$docente=$_GET['docente'];
			$grado=$_GET['grado'];
			$seccion=$_GET['seccion'];
			$mes=$_GET['mes'];
			$ano=$_GET['ano'];
		 
		echo "<div id='estadistica'>";
		echo "<form action='../controlador/proEstadistica2.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."' method='POST'>";
		?>
		<table border="2" width="40%" id="estadistica1" >
					<tr><td colspan="2">Asistencias</td></tr>
					<tr><td colspan="1">D&iacutea </td><td colspan="1"><select name="dia" id="" >
						<option value=""></option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="30">31</option>
						
			</select></td></tr> 
					<tr><td>Varones</td><td><input type="text" size="3" name="varones"></td></tr>
					<tr><td>Hembras</td><td><input type="text" size="3" name="hembras"></td></tr>
					<tr><td colspan="2" align="center"><br><input type="submit" value="Guardar" name="guardar_datos_estadisticos">
					<?php  
					echo"<a style='text-decoration: none;' href='registroEstadistica3.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."' onClick='return confirm('Desea continuar?')'> Siguiente <span class='icon-arrow-right'></span></a>";    
                    ?>
					</td></tr>
					</table></form>
		</div>
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
			<span class="nombre_seccion">Estadisticas Inicial y Basica</span>
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
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Inicial/B&aacutesica</a></li>
			</ul>
		</div>

		<div id="menu_opciones" >
 			<ul class="nav">
 				
 				<li><a href="registroEstadisticas.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Estad&iacutesticas</a></li>
 				<li><a href="consultaEstadistica.php"><span class="icon-magnifying-glass"></span>&nbsp&nbspConsultar Estad&iacutesticas</a></li>
 				<!-- <li><a href=""><span class="icon-print"></span>&nbsp&nbspReporte de Estad&iacutesticas</a></li> -->
 				
 				
 			</ul>
		</div>
		<?php 
			$docente=$_GET['docente'];
			$grado=$_GET['grado'];
			$seccion=$_GET['seccion'];
			$mes=$_GET['mes'];
			$ano=$_GET['ano'];
		 
		echo "<div id='estadistica'>";
		echo "<form action='../controlador/proEstadistica2.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."' method='POST'>";
		?>
		<table border="2" width="40%" id="estadistica1" >
					<tr><td colspan="2">Asistencias</td></tr>
					<tr><td colspan="1">D&iacutea </td><td colspan="1"><select name="dia" id="" >
						<option value=""></option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="30">31</option>
						
			</select></td></tr> 
					<tr><td>Varones</td><td><input type="text" size="3" name="varones"></td></tr>
					<tr><td>Hembras</td><td><input type="text" size="3" name="hembras"></td></tr>
					<tr><td colspan="2" align="center"><br><input type="submit" value="Guardar" name="guardar_datos_estadisticos">
					<?php  
					echo"<a style='text-decoration: none;' href='registroEstadistica3.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."' onClick='return confirm('Desea continuar?')'> Siguiente <span class='icon-arrow-right'></span></a>";    
                    ?>
					</td></tr>
					</table></form>
		</div>
}
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