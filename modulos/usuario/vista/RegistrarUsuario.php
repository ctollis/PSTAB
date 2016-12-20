<?php

session_start();
require_once("../modelo/modeloUsuarios.php");
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

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="CSS/estilo.css"  type "text/css">
	<link rel="stylesheet" href="../../recursos/iconos/style.css" type="text/css">
	<script language="javascript" src="js/campos_vacios.js"></script>
	<script language="javascript" src="js/validaciones.js"></script>
	
<title>UEMAB-Registro-Usuario</title>
</head>
<body onload=document.getElementById('cedula').focus()>
	<header id="main-header">
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Gesti&oacuten de Usuarios</span>
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
 				<li><a href="ConsultarUsuarios.php"><span class="icon-users"></span>&nbspGesti&oacuten de Usuarios</a></li>
 				<li><a href="../../inscripcion/vista/inscripciones.php"><span class="icon-text-document"></span>&nbspInscripciones</a></li>
 				<!-- <li><a href=""><span class="icon-bar-graph"></span>&nbspEstadisticas Media</a></li> -->
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Inicial/B&aacutesica</a></li>
				<li><a href="../../comedor/vista/comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
			</ul>
		</div>

		<div id="menu_opciones" >
 			<ul class="nav">
 				
 				<li><a href="RegistrarUsuario.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Usuarios</a></li>
 				<li><a href="ConsultarUsuarios.php"><span class="icon-edit"></span>&nbsp&nbspConsultar Usuarios</a></li>
 				<!-- <li><a href=""><span class="icon-remove-user"></span>&nbsp&nbspEliminar Usuario</a></li> -->
 				<!-- <li><a href=""><span class="icon-print"></span>&nbsp&nbspReporte de Usuarios</a></li> -->
 				
 			</ul>
		</div>


<form method="POST" action="../controlador/ProcesarRegistroUsuario.php" name="form-registro-usuario" onSubmit="return validarCampos(this);"> 
<table width="30%" align="center" border=2 class="tabla_editar"  cellpadding="8" cellspacing="5">
<tr><td colspan="3"><h3 class="icon-add-user">&nbsp&nbspRegistrar Usuario</h3><br></td></tr>
<tr>
<td>Cédula:</td><td><input type="text" class="form-control-registro" maxlength="8" size="12"  name="cedula" id="cedula" onkeypress="return soloNumeros(event)"></td>
<td><span>*</span></td> 
</tr>
<tr>
<td>Nombre:</td><td><input type="date" class="form-control-registro" size="12" maxlength="20" name="nombre" id="nombre"></td><td><span>*</span></td> 
</tr>
<tr>
<td>Apellido:</td><td><input type="text"  class="form-control-registro" size="12" maxlength="20"  name="apellido" id="apellido"></td><td><span>*</span></td> 
</tr> 
<tr>
<td>Nombre de Usuario:</td><td><input type="text"  class="form-control-registro" maxlength="20" size="12"  name="username" id="username"></td><td><span>*</span></td> 
</tr>
<tr>
<td>Contraseña:</td><td><input type="text" class="form-control-registro" maxlength="20" size="12"  name="clave" id="clave"></td><td><span>*</span></td> 
</tr>
<tr>
<td>Tipo de Usuario: 
<td>
<select name="tipo_usuario" class="form-control" id="tipo_usuario" >
	<option value=""></option>
    <option value="Docente">Docente</option>
    <option value="Comedor">Comedor</option>
    <option value="Admin">Administrador</option>
</select><td><span>*</span></td> 
</td>
</tr>

<tr>
<td colspan="3" align='right'><br><span class="icon-new-message">&nbsp<input type="submit" value="Registrar" name="submit"></td>
</tr>
<tr><td colspan="3" align="center"><br>(*)campos obligatorios</td></tr>
<tr><td><a  style=' text-decoration:none; color: #000;' href="../vista/ConsultarUsuarios.php"><span class="icon-arrow-left">Volver</span></a></td></tr>
</table>
</form> 
</body>
</html>