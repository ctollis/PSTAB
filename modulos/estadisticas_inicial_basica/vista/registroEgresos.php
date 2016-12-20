<!DOCTYPE html>

<?php
session_start();
require_once("../modelo/modeloEstadisticas.php");
if (isset($_SESSION['cedula'])){  //Si el usuario inicio sesion correctamente
    $UsuarioActivo = $_SESSION['cedula'];  
    $NombreUsuarioActivo = $_SESSION['username'];
}
/*if($_SESSION['tipo_usuario'] != "Admin" && $_SESSION['tipo_usuario'] != "Basico")
{ 
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
} */
if ($_SESSION['tipo_usuario'] != "Admin") {
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
		echo "<form action='../controlador/proEgreso.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."' method='POST'>";
		?>
 
				<table name="ingresos" border="1" width="30%" id="ingresos" cellspacing="6px">
					<tr><td align="center" colspan="7"><b>EGRESOS</b></td></tr>
					<tr align="center"><td>Nombre y apellido</td><td>F.N</td><td>Lugar Nacimiento</td><td>Edad</td><td>Sexo</td><td>Fecha</td><td>Motivo</td></tr>
					<?php 
					for ($i=1; $i <=4 ; $i++) { 
					echo"<tr>";
						echo"<td><input type='text' name='nombre_apellido$i'></td>";
						echo"<td><input type='text' name='fn$i'></td>";
						echo"<td><input type='text' name='lugar_nacimiento$i'></td>";
						echo"<td><input type='text' size='3' name='edad$i'></td>";
						echo"<td><select name='sexo$i'>";
							echo"<option value=''></option>";
							echo"<option value='M'>M</option>";
							echo"<option value='F'>F</option>";
							echo"</select></td>";
						echo"<td><input type='text' size='8' name='fecha$i'></td>";
						echo"<td><input type='text' size='10' name='motivo$i'></td>";
					echo"</tr>";
						}
					?>
					<tr><td colspan="7" align="right"><input type="submit" name="guardar" value="Guardar y Continuar "></td></tr>
				</table>
				</form>
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
		echo "<form action='../controlador/proEgreso.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."' method='POST'>";
		?>
 
				<table name="ingresos" border="1" width="30%" id="ingresos" cellspacing="6px">
					<tr><td align="center" colspan="7"><b>EGRESOS</b></td></tr>
					<tr align="center"><td>Nombre y apellido</td><td>F.N</td><td>Lugar Nacimiento</td><td>Edad</td><td>Sexo</td><td>Fecha</td><td>Motivo</td></tr>
					<?php 
					for ($i=1; $i <=4 ; $i++) { 
					echo"<tr>";
						echo"<td><input type='text' name='nombre_apellido$i'></td>";
						echo"<td><input type='text' name='fn$i'></td>";
						echo"<td><input type='text' name='lugar_nacimiento$i'></td>";
						echo"<td><input type='text' size='3' name='edad$i'></td>";
						echo"<td><select name='sexo$i'>";
							echo"<option value=''></option>";
							echo"<option value='M'>M</option>";
							echo"<option value='F'>F</option>";
							echo"</select></td>";
						echo"<td><input type='text' size='8' name='fecha$i'></td>";
						echo"<td><input type='text' size='10' name='motivo$i'></td>";
					echo"</tr>";
						}
					?>
					<tr><td colspan="7" align="right"><input type="submit" name="guardar" value="Guardar y Continuar "></td></tr>
				</table>
				</form>
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