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
<link href= "css/estilo6.css" rel= "stylesheet"  type= "text/css">
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
<form method="POST" action=""class="formulario6" onSubmit="return validarCampos4(this);">
<br><br><br><br>
 <fieldset>
<legend align= "center" ><h2>DATOS SOCIO-ECONOMICOS</h2></legend>
<center>
<div class="text">
			<label for="cedula_estu"><b>Cédula Estudiante:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_estu" value="" id="cedula_estu" size="10" maxlength="30"><span>&nbsp;*</span>
</div>
		<div id= "contenedor1">
			<div id= "picture1" class="radio">
<b>El Alumno (a) vive con : </b>
	<input type="radio" name="vive_con" id="madre" value="Madre"> 
	<label for="madre">Madre </label>
    <input type="radio" name="vive_con" id="padre" value="Padre">
	<label for="padre">Padre </label>
    <input type="radio" name="vive_con" id="ambos" value="Ambos"> 
	<label for="ambos">Ambos </label>
	</div>
	<div id= "picture2" class="text">
	<label for="otrosv"><b>Otros (especifique): </b></label>
    <input type="text" name="otros_vive" value="" id="otrosv" size="15" maxlength="30">
</div>
</div>	
<div id= "contenedor2">
<div id= "picture3" class="radio">
<b>El Alumno esta becado: </b>
	<input type="radio" name="beca" id="sib" value="Si">
	<label for="sib">Si </label>
    <input type="radio" name="beca" id="nob" value="No"> 
	<label for="nob">No </label><span>&nbsp;*</span>
	</div>
	<div id= "picture4" class="text">
	<label for="especifiqueb"><b>Especifique: </b></label>
    <input type="text" name="especifique_beca" value="" id="especifiqueb"size="15" maxlength="20">
	</div>
	</div>
<div id= "contenedor3">
<div id= "picture5" class="radio">
<b>Traslado al plantel: </b>
	<input type="radio" name="medio_traslado_plantel" id="particular" value="Particular">
	<label for="particular">Particular </label>
    <input type="radio" name="medio_traslado_plantel" id="privado" value="Privado">
	<label for="privado">Privado</label>
    <input type="radio" name="medio_traslado_plantel" id="publico" value="Público"> 
	<label for="publico">Público</label>
	<input type="radio" name="medio_traslado_plantel" id="rutaescolar" value="Ruta Escolar Chacao"> 
	<label for="rutaescolar">Ruta Escolar Chacao</label>
	</div>
	<div id= "picture6" class="text">
	<label for= "otrosru"><b>Otros: </b></label>
    <input type="text" name="otros_ruta" value="" id= "otrosru" size="15" maxlength="20">
	</div></div>
<div id= "contenedor4">
<div id= "picture7" class="radio">
<b>El Alumno (a) se retira solo (a) del Plantel: </b>
	<input type="radio" name="se_retira_solo_plantel" id="sir" value="Si">
	<label for="sir">Si </label>
    <input type="radio" name="se_retira_solo_plantel" id="nor" value="No">
	<label for="nor">No </label><span>&nbsp;*</span>
	</div>
	<div id= "picture8">
	<label for= "nhermanos"><b>N° de Hermanos: </b></label>
   <select id="nhermanos" name="n_hermanos">
    <option value="" selected=""></option>
	<option value="0">0</option>
	<option value="01">01</option>
    <option value="02">02</option>
    <option value="03">03</option>
    <option value="04">04</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07">07</option>
    <option value="08">08</option>
	<option value="09">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
	<option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
	</select><span>&nbsp;*</span>
</div></div>
<div id= "contenedor5">
<div id= "picture9" class="radio">
<b>Hermanos (as) que estudian en el Plantel: </b>
	<input type="radio" name="hermanos_en_plantel" id="sih" value="Si">
	<label for="sih">Si </label>
    <input type="radio" name="hermanos_en_plantel" id="noh" value="No"> 
	<label for="noh">No </label><span>&nbsp;*</span>
	</div>
	<div id= "picture10">
	<label for="espgrado"><b>Especifique Grado:</b> </label>
   <select id="espgrado" name="especifique_grado_hermano">
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
</select>
</div>
</div>
<div id= "contenedor6">
<div id= "picture11" class="radio">
<b>Datos de la Vivienda :</b>
	<input type="radio" name="datos_vivienda" id="propia" value="Propia">
	<label for="propia">Propia </label>
    <input type="radio" name="datos_vivienda" id="alquilado"value="Alquilado">
	<label for="alquilado">Alquilado</label>
	</div>
	<div id= "picture12" class="text">
	<label for="otrosvi"><b>Otros: </b></label>
    <input type="text" name="otros_datos_vivienda" value="" id= "otrosvi" size="15" maxlength="15">
</div>
</div>	
<div id= "contenedor7">
    <div id= "picture13">
		<a  href="Registrarinscripcion5.php" class="button1" ><span class="icon-reply">&nbsp;Anterior</span></a>
	 </div>
	<div id= "picture14">
	<button type="submit" onclick = "this.form.action = '../controlador/ProcesaRegistroinscripcion6.php';" class="button2"><span class="icon-forward"></span> Siguiente</button>
	 </div>
	 </div>
	 <br><br><br>
	<div id= "picture15">
	 (*)campos obligatorios</div>
</center>
	</fieldset>
</form>
</body>
 
</html>