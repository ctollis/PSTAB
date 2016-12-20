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
		echo "<form action='../controlador/proEstadistica3.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."' method='POST'>";
		?>
		<table width="65%" border="1" id="estadistica1">
		<tr><td><h4>Matricula</h4></td></tr>
			<tr>
			<td>Total de alumnos inscritos para el primer dia del mes </td>
		    <td>V: <input type="text" size="3" name="t_v_pm" value=0> H: <input type="text"  size="3" name="t_h_pm" value=0></td>
			</tr>
			<tr>
			<td>Alumnos matriculados en el mes:</td>
			<td>V: <input type="text" size="3" name="v_m_m"  value=0> H: <input type="text" name="h_m_m" size="3" value=0></td>
			</tr>
			<tr><td>Alumnos retirados en el mes:</td>
			<td>V: <input type="text" size="3" name="v_r_m"   value=0> H: <input type="text" size="3" name="h_r_m" value=0></td>
			</tr>
			<!-- <tr><td>Alumnos matriculados para el ultimo dia del mes </td>
			<td>V: <input type="text" size="3" name="v_m_um" value=0> H: <input type="text" name="h_m_um"  size="3" value=0></td>
			</tr> -->
			<tr><td><br><?php  
					echo"<a style='text-decoration: none;' href='registroEstadistica2.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."'> <span class='icon-arrow-left'></span> Atras </a>";    
                    ?></td>
                 <td colspan="2" align="right"><br><input type="submit" value="Guardar y continuar"></td>
			</tr>
        </table>

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
		echo "<form action='../controlador/proEstadistica3.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."' method='POST'>";
		?>
		<table width="65%" border="1" id="estadistica1">
		<tr><td><h4>Matricula</h4></td></tr>
			<tr>
			<td>Total de alumnos inscritos para el primer dia del mes </td>
		    <td>V: <input type="text" size="3" name="t_v_pm" value=0> H: <input type="text"  size="3" name="t_h_pm" value=0></td>
			</tr>
			<tr>
			<td>Alumnos matriculados en el mes:</td>
			<td>V: <input type="text" size="3" name="v_m_m"  value=0> H: <input type="text" name="h_m_m" size="3" value=0></td>
			</tr>
			<tr><td>Alumnos retirados en el mes:</td>
			<td>V: <input type="text" size="3" name="v_r_m"   value=0> H: <input type="text" size="3" name="h_r_m" value=0></td>
			</tr>
			<!-- <tr><td>Alumnos matriculados para el ultimo dia del mes </td>
			<td>V: <input type="text" size="3" name="v_m_um" value=0> H: <input type="text" name="h_m_um"  size="3" value=0></td>
			</tr> -->
			<tr><td><br><?php  
					echo"<a style='text-decoration: none;' href='registroEstadistica2.php?docente=".$docente."&grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."'> <span class='icon-arrow-left'></span> Atras </a>";    
                    ?></td>
                 <td colspan="2" align="right"><br><input type="submit" value="Guardar y continuar"></td>
			</tr>
        </table>

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
