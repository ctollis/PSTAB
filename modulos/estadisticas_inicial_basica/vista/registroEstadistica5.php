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
		echo "<form action='../controlador/proEstadistica5.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."' method='POST'>";
		?>

		<table width="45%" border="1"  id="estadistica1">
				<tr><td colspan="5" align="left"><h4>Clasificacion por Edad y Sexo</h4></td></tr>
				<tr>
					<td align="center">Edad</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
								 <td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td>
				</tr>
				<tr>
					<td align="center">V</td>
					<td><input type="text" name="ccuatrov" size="2" value="0"></td>
					<td><input type="text" name="ccincov" size="2" value="0"></td>
					<td><input type="text" name="cseisv" size="2" value="0"></td>
					<td><input type="text" name="csietev" size="2" value="0"></td>
					<td><input type="text" name="cochov" size="2" value="0"></td>
					<td><input type="text" name="cnuevev" size="2" value="0"></td>
					<td><input type="text" name="cdiezv" size="2" value="0"></td>
					<td><input type="text" name="concev" size="2" value="0"></td>
					<td><input type="text" name="cdocev" size="2" value="0"></td>
					<td><input type="text" name="ctrecev" size="2" value="0"></td>
					<td><input type="text" name="ccatorcev" size="2" value="0"></td>
					<td><input type="text" name="cquincev" size="2" value="0"></td>
				</tr>
				<tr>
					<td align="center">H</td>
					<td><input type="text" name="ccuatroh" size="2" value="0"></td>
					<td><input type="text" name="ccincoh" size="2" value="0"></td>
					<td><input type="text" name="cseish" size="2" value="0"></td>
					<td><input type="text" name="csieteh" size="2" value="0"></td>
					<td><input type="text" name="cochoh" size="2" value="0"></td>
					<td><input type="text" name="cnueveh" size="2" value="0"></td>
					<td><input type="text" name="cdiezh" size="2" value="0"></td>
					<td><input type="text" name="conceh" size="2" value="0"></td>
					<td><input type="text" name="cdoceh" size="2" value="0"></td>
					<td><input type="text" name="ctreceh" size="2" value="0"></td>
					<td><input type="text" name="ccatorceh" size="2" value="0"></td>
					<td><input type="text" name="cquinceh" size="2" value="0"></td>
				</tr>
				<tr><td colspan="3"><br><?php  
					echo"<a style='text-decoration: none;' href='registroEstadistica4.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."'> <span class='icon-arrow-left'></span> Atras </a>";    
                    ?></td>
				<td colspan="15" align="right"><br><input type="submit" value="Guardar y continuar"></td></tr>
				</table>

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
		echo "<form action='../controlador/proEstadistica5.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."' method='POST'>";
		?>

		<table width="45%" border="1"  id="estadistica1">
				<tr><td colspan="5" align="left"><h4>Clasificacion por Edad y Sexo</h4></td></tr>
				<tr>
					<td align="center">Edad</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
								 <td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td>
				</tr>
				<tr>
					<td align="center">V</td>
					<td><input type="text" name="ccuatrov" size="2" value="0"></td>
					<td><input type="text" name="ccincov" size="2" value="0"></td>
					<td><input type="text" name="cseisv" size="2" value="0"></td>
					<td><input type="text" name="csietev" size="2" value="0"></td>
					<td><input type="text" name="cochov" size="2" value="0"></td>
					<td><input type="text" name="cnuevev" size="2" value="0"></td>
					<td><input type="text" name="cdiezv" size="2" value="0"></td>
					<td><input type="text" name="concev" size="2" value="0"></td>
					<td><input type="text" name="cdocev" size="2" value="0"></td>
					<td><input type="text" name="ctrecev" size="2" value="0"></td>
					<td><input type="text" name="ccatorcev" size="2" value="0"></td>
					<td><input type="text" name="cquincev" size="2" value="0"></td>
				</tr>
				<tr>
					<td align="center">H</td>
					<td><input type="text" name="ccuatroh" size="2" value="0"></td>
					<td><input type="text" name="ccincoh" size="2" value="0"></td>
					<td><input type="text" name="cseish" size="2" value="0"></td>
					<td><input type="text" name="csieteh" size="2" value="0"></td>
					<td><input type="text" name="cochoh" size="2" value="0"></td>
					<td><input type="text" name="cnueveh" size="2" value="0"></td>
					<td><input type="text" name="cdiezh" size="2" value="0"></td>
					<td><input type="text" name="conceh" size="2" value="0"></td>
					<td><input type="text" name="cdoceh" size="2" value="0"></td>
					<td><input type="text" name="ctreceh" size="2" value="0"></td>
					<td><input type="text" name="ccatorceh" size="2" value="0"></td>
					<td><input type="text" name="cquinceh" size="2" value="0"></td>
				</tr>
				<tr><td colspan="3"><br><?php  
					echo"<a style='text-decoration: none;' href='registroEstadistica4.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."'> <span class='icon-arrow-left'></span> Atras </a>";    
                    ?></td>
				<td colspan="15" align="right"><br><input type="submit" value="Guardar y continuar"></td></tr>
				</table>
	<?php 
}
else {
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>";
	}

	?>
