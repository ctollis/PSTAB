<!DOCTYPE html>

<?php
session_start();
require_once("../modelo/modeloinscripciones.php");
if (isset($_SESSION['cedula'])){  // Si el usuario inicio sesion correctamente//
	$IdUsuarioActivo = $_SESSION['cedula']; 
    $NombreUsuarioActivo = $_SESSION['username'];
}
if($_SESSION['tipo_usuario'] != "Admin")
{ 
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
} 
?>
<html>
<head>
<link href= "css/estilo8.css" rel= "stylesheet"  type= "text/css">
<link href= "css/fonts.css" rel= "stylesheet"  type= "text/css">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="css/estilo.css"  type "text/css">
		<script language="javascript" src="js/validacion_campos.js"></script>

<title>UEMAB-Inscripciones</title>
</head>
<body>
		<header id="main-header">
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Inscripción</span>
		</a>
		<nav>
			<ul>
				<li><a><span class="icon-user"></span>&nbsp&nbsp<?php echo $NombreUsuarioActivo ?></a> 
				<li><a href="../modelo/cerrar_sesion.php" id="bt_cerrar_sesion">Cerrar Sesi&oacuten</a></li>
			
			</ul>
		</nav>
		
 		</header>
<form method="POST" action=""class="formulario8" onSubmit="return validarCampos6(this);">
<br><br>
 <fieldset>
<legend align= "center" ><h2>OTROS DATOS DE INTERES</h2></legend>
<center>

	<div id= "contenedor2">
	<div id= "picture3">
			<label for="cedula_estu"><b>Cédula Estudiante:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_estu" value="" id="cedula_estu" size="10" maxlength="30"><span>&nbsp;*</span>&nbsp;&nbsp;
	</div>
<div class="radio" id= "picture4">
<b>El Alumno es Católico: </b>&nbsp;
	<input type="radio" name="catolico" id="si" value="Si">
	<label for="si">Si </label>
	<input type="radio" name="catolico" id="no" value="No"> 
	<label for="no">No </label><span>&nbsp;*</span>
	</div></div>

	<br>
	<div class="checkbox">
	<b>De ser afirmativa su respuesta indique, ha realizado: </b>&nbsp;
	
	<input name="sacramentos" type="checkbox" id= "afirmativa1" value="Bautizo">
	<label for="afirmativa1">Bautizo </label>
	
    <input name="sacramentos" type="checkbox" id= "afirmativa2" value="Comunión">
    <label for="afirmativa2">Comunión </label>	
	
	<input name="sacramentos" type="checkbox" id= "afirmativa3" value="Confirmación"> 
	<label for="afirmativa3">Confirmación </label>
	</div>
    <div class="text">
	<br>
	<b> EN CASO DE EMERGENCIA LLAMAR A:</b>
	<br><br>
	<label for= "nomapell1"><b>Nombre y Apellido: </b></label>
    <input type="text" name="nombre_apellido_emerg" value="" size="20" id= "nomapell1" maxlength="30"><span>&nbsp;*</span>&nbsp;&nbsp;&nbsp;
	<label for="telefono1"><b>Teléfono: </b></label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="telefono" value="" size="10" id="telefono1" maxlength="20"><span>&nbsp;*</span>&nbsp;&nbsp;&nbsp;
	 <label for="parentesco1"><b>Parentesco:</b> </label>
    <input type="text" name="parentesco_otro" value="" size="15" id= "parentesco1" maxlength="20"><span>&nbsp;*</span>&nbsp;&nbsp;&nbsp;
	<br><br>
	 <label for= "nomapell2"><b>Nombre y Apellido:</b> </label>
    <input type="text" name="nombre_apellido_emerg2" value="" size="20" id= "nomapell2" maxlength="30"><span>&nbsp;*</span>&nbsp;&nbsp;&nbsp;
	 <label for= "telefono2"><b>Teléfono: </b></label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="telefono2" value="" size="10" id= "telefono2" maxlength="20"><span>&nbsp;*</span>&nbsp;&nbsp;&nbsp;
	 <label for= "parentesco2"><b>Parentesco: </b></label>
    <input type="text" name="parentesco_otro2" value="" size="15" id= "parentesco2" maxlength="20"><span>&nbsp;*</span>&nbsp;&nbsp;&nbsp;
	</div>
	<div id= "contenedor1">
	<div id= "picture1">
		<a  href="Registrarinscripcion7.php" class="button1" ><span class="icon-reply">&nbsp;Anterior</span></a>
	 </div>
	<div id= "picture2">
	<button type="submit" onclick = "this.form.action = '../controlador/ProcesaRegistroinscripcion8.php';" class="button2"><span class="icon-save"></span> Finalizar</button>

	 </div>
	 </div>
	 <br><br><br>
	<div id= "picture5">
	 (*)campos obligatorios</div>
	</center>
	</fieldset>
</form>
</body>
 
</html>
	