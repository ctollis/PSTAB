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
<link href= "css/estilo1.css" rel= "stylesheet"  type= "text/css">
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


<form method="POST" action=""class="formulario1" onSubmit="return validarCampos(this);"> 
<br><br><br><br>
 <fieldset>
<legend align= "center" ><h2>INFORMACIÓN GENERAL</h2></legend>
<center>

			<div class="text">
			<label for="cedula_estu"><b>Cédula Estudiante:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_estu" value="" id="cedula_estu" size="10" maxlength="30"><span>&nbsp;*</span>
	&nbsp;&nbsp;
			<label for="ano_escolar"><b>Año Escolar:</b></label>
<select id="ano_escolar" name="ano_escolar">
<option value="" selected="">seleccioné</option>
    <option value="2015-2016">2015-2016</option>
	<option value="2016-2017">2016-2017</option>
    <option value="2017-2018">2017-2018</option>
    <option value="2018-2019">2018-2019</option>
    <option value="2019-2020">2019-2020</option>
	<option value="2020-2021">2020-2021</option>
    <option value="2021-2022">2021-2022</option>
    <option value="2022-2023">2022-2023</option>
    <option value="2023-2024">2023-2024</option>
	<option value="2024-2025">2024-2025</option>
    <option value="2025-2026">2025-2026</option>
    <option value="2026-2027">2026-2027</option>
    <option value="2027-2028">2027-2028</option>
	<option value="2028-2029">2028-2029</option>
    <option value="2029-2030">2029-2030</option>
 </select> <span>&nbsp;*</span>&nbsp;&nbsp;
 <label for="fecha_inscripcion"><b>Fecha de Inscripción:</b> </label>
    <input type="text" name="fecha_inscripcion" value="" id="fecha_inscripcion" size="10" maxlength="30"><span>&nbsp;*</span>
 </div>
 
 <div id= "contenedor1">
<div  id= "picture1">

<label for= "grado_actual"><b>Grado o Año Actual:</b></label>
<select id="grado_actual" name="grado_actual">
<option value="" selected="">seleccioné</option>
<optgroup label="Inicial">
    <option value="1er nivel">1er nivel</option>
    <option value="2do nivel">2do nivel</option>
    <option value="3er nivel">3er nivel</option>
</optgroup>
<optgroup label="básica">
    <option value="1er grado">1er grado</option>
    <option value="2do grado">2do grado</option>
    <option value="3er grado">3er grado</option>
    <option value="4to grado">4to grado</option>
    <option value="5to grado">5to grado</option>
	<option value="6to grado">6to grado</option>
</optgroup>
 <optgroup label="Media">  
   <option value="1er año">1er año</option>
    <option value="2do año">2do año</option>
    <option value="3er año">3er año</option>
	
</optgroup>
</select><span>&nbsp;*</span>
<label for="seccion_actual"><b>Sección Actual: </b></label>
<select id="seccion_actual" name="seccion_actual">
    <option value="" selected=""></option>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
	</select><span>&nbsp;*</span>
	&nbsp;&nbsp;
<label for= "grado_cursar"><b>Grado a Cursar:</b></label>
<select id="grado_cursar" name="grado_cursar">
<option value="" selected="">seleccioné</option>
<optgroup label="Inicial">
    <option value="1er nivel">1er nivel</option>
    <option value="2do nivel">2do nivel</option>
    <option value="3er nivel">3er nivel</option>
</optgroup>
<optgroup label="basica">
    <option value="1er grado">1er grado</option>
    <option value="2do grado">2do grado</option>
    <option value="3er grado">3er grado</option>
    <option value="4to grado">4to grado</option>
    <option value="5to grado">5to grado</option>
	<option value="6to grado">6to grado</option>
</optgroup>
 <optgroup label="Media">  
    <option value="1er año">1er año</option>
    <option value="2do año">2do año</option>
    <option value="3er año">3er año</option>

</optgroup>
</select><span>&nbsp;*</span>
</div>
<div id= "picture2" class= "radio">
    <b>Repite:</b>
    <input type="radio" name="repite" value="No"id="repite1"> 
	<label for="repite1">No</label>
    <input type="radio" name="repite" value="Si" id="repite2">
	<label for="repite2">Si</label><span>&nbsp;*</span>
	
</div>
</div>

	<div id= "contenedor2">
	<div id= "picture3">
	<a  href="inscripciones.php" class="button1" ><span class="icon-home">&nbsp;Menu</span></a>
	
	 </div>
	<div id= "picture4">
	<button type="submit" onclick = "this.form.action =  '../controlador/ProcesaRegistroinscripcion1.php';"  class="button2"><span class="icon-forward"></span> Siguiente</button>
	 </div>
	 </div>
	<br><br><br><br>
	<div id= "picture5">
	 (*)campos obligatorios</div>
	
		</form>
	</center>
	</fieldset>
</form> 
</body>
</html>