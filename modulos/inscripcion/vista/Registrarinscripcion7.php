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
<link href= "css/estilo7.css" rel= "stylesheet"  type= "text/css">
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
		<br>
<form method="POST" action=""class="formulario7" onSubmit="return validarCampos5(this);">
 <fieldset >
<legend align= "center" ><h2>DATOS DE SALUD</h2></legend>
<center>
<div class="text">
			<label for="cedula_estu"><b>Cédula Estudiante:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_estu" value="" id="cedula_estu" size="10" maxlength="30"><span>&nbsp;*</span>
</div>
		<div id= "contenedor1">
			<div id= "picture1" class="radio">
<b>Grupo Sanguineo : </b>
	<input type="radio" name="grupo_sang"  id= "ga" value="A">
	<label for="ga">A </label>
    <input type="radio" name="grupo_sang"  id= "gb"  value="B">
	<label for="gb">B </label>
    <input type="radio" name="grupo_sang" id= "gab" value="AB">
	<label for="gab">AB </label>
	<input type="radio" name="grupo_sang" id= "go" value="O">
	<label for="go">O</label>
	
<b>Factor RH : </b>
	<input type="radio" name="factor_rh"  id= "factor+" value="Positivo">
	<label for="factor+">+ </label>
    <input type="radio" name="factor_rh"  id= "factor-" value="Negativo" >
	<label for="factor-">- </label>
	</div >
	
	<div id= "picture2" class="text">
	<label for= "talla"><b>Talla: </b></label>
    <input type="text" name="talla" value="" id= "talla"size="3" maxlength="5">
	
	<label for= "peso"><b>peso:</b> </label>
    <input type="text" name="peso" value="" id="peso" size="3" maxlength="5">
	</div>
	</div>
	
	<div id= "contenedor2">
	<div id= "picture3"class="radio">
	<b>Padece alguna Enfermedad: </b>
	<input type="radio" name="padece_enfermedad" id="sie" value="Si"> 
	<label for="sie">Si</label>
    <input type="radio" name="padece_enfermedad" id="noe" value="No">
	<label for="noe">No</label><span>&nbsp;*</span>
	</div>
	
	<div   id= "picture4"class="text">
	<label for= "espenfer"><b>Especifique: </b></label>
	<input type="text" name="especifique_enfermedad" value="" id= "espenfer" size="15" maxlength="15">
	</div>
	</div>
	
	<div id= "contenedor3">
	<div id= "picture5" class="radio" >
	<b>El Alumno Tiene alguna diversidad funcional:</b>
	<input type="radio" name="diversidad_funcional" id="sid" value="Si" >
	<label for="sid">Si</label>
    <input type="radio" name="diversidad_funcional" id="nod" value="No">
	<label for="nod">No</label><span>&nbsp;*</span>
	</div>
	<div  id= "picture6"class="text">
<label for= "espdiv"><b>Especifique:</b> </label>
	<input type="text" name="especifique_diversidad" value=""  id= "espdiv" size="15" maxlength="15">
	</div>
	</div>
	<div id= "contenedor5">
	<div id= "picture9" class="radio" >
<b>Operado:</b>
	<input type="radio" name="operaciones" id="siop" value="Si"> 
	<label for="siop">Si </label>
    <input type="radio" name="operaciones" id="noop" value="No">
	<label for="noop">No </label><span>&nbsp;*</span>
	</div>
	<div  id= "picture10"class="text">
	<label for="espope"><b>Especifique: </b></label>
	<input type="text" name="especifique_operacion" value="" size="15"  id= "espope" maxlength="15">
	</div>
	</div>
	<br>
	<center><B>ALERGICO:</B></center>
	<div id= "contenedor6">
	<div id= "picture11" class="radio" >
	<b>Alimentos: </b>
	<input type="radio" name="alergias_alimentos" id="siali"  value="Si"> 
	<label for="siali">Si </label>
    <input type="radio" name="alergias_alimentos" id="noali" value="No">
	<label for="noali">No </label><span>&nbsp;*</span>
</div>
<div id= "picture12" class="text" >
	<label for="espali"><b>Especifique:</b> </label>
	<input type="text" name="especifique_alergia_alimento" value="" size="15" id= "espali" maxlength="15">
	</div>
	</div>
	<div id= "contenedor7">
	<div id= "picture13" class="radio" >
    <b>Medicamento:</b>
	<input type="radio" name="alergias_medicamentos" id="sime" value="Si" >
    <label for="sime">Si </label>	
    <input type="radio" name="alergias_medicamentos" id="nome" value="No">
	<label for="nome">No </label><span>&nbsp;*</span>
   </div>
   <div id= "picture14" class="text" >
	<label for="espmed"><b>Especifique:</b> </label>
	<input type="text" name="especifique_alergia_medicamento" value="" id= "espmed" size="15" maxlength="15">
	</div>
	</div>
	<div id= "contenedor8">
	<div id= "picture15" class="radio" >
	<b>Otros:</b>
	<input type="radio" name="alergias_otros" id="siot" value="Si">
	<label for="siot">Si </label>	
    <input type="radio" name="alergias_otros" id="noot" value="No">
	<label for="noot">No </label><span>&nbsp;*</span>
	</div>
	<div id= "picture16" class="text" >
	<label for="espotro"><b>Especifique:</b> </label>
	<input type="text" name="especifique_alergia_otros" value="" id= "espotro" size="15" maxlength="15">
	</div>
	</div>
	<div id= "contenedor9">
	<div id= "picture17" class="radio" >
	<b>Tiene un Régimen especial de Alimentación o Tratamiento: </b>
	<input type="radio" name="alim_trata_espe" id="sireg"  value="Si">
	<label for="sireg">Si </label>	
    <input type="radio" name="alim_trata_espe" id="noreg" value="No">
	<label for="noreg">No </label><span>&nbsp;*</span>
	</div>
	<div id= "picture18" class="text" >
	<label for="espreg"><b>Especifique:</b> </label>
	<input type="text" name="especifique_alimentacion" value="" id="espreg" size="15" maxlength="15">
	</div></div>
	<div id= "contenedor10">
	<div id= "picture19" class="checkbox" >
	<b>Vacunas:</b>
	<input name="vacunas" type="checkbox" id="bcg" value="BCG">
	<label for="bcg">BCG</label>
    <input name="vacunas" type="checkbox" id="triple" value="Triple">
	<label for="triple">Triple</label>
	<input name="vacunas" type="checkbox" id="sarampiona" value="Sarampión">
	<label for="sarampiona">Sarampión</label>
	<input name="vacunas" type="checkbox" id="meningitis" value="Meningitis">
	<label for="meningitis">Meningitis</label>
	<input name="vacunas" type="checkbox" id="antigripal" value="Antigripal">
	<label for="antigripal">Antigripal</label>
	<input name="vacunas" type="checkbox" id="hepatitisa" value="Hepatitis A">
	<label for="hepatitisa">Hepatitis A</label>
	</div>
	</div>
	<div id= "contenedor11">
	<div id= "picture20" class="checkbox" >
	<input name="vacunas" type="checkbox" id= "hepatitisb" value="Hepatitis B">
	<label for="hepatitisb">Hepatitis B</label>
	<input name="vacunas" type="checkbox" id= "neumococo" value="Neumococo">
	<label for="neumococo">Neumococo</label>
	</div>
	<div id= "picture21" class="text" >
	<label for="otrosva"><b>otros: </b></label>
    <input type="text" name="otros_vacuna" value="" id= "otrosva" size="20" maxlength="20">
	</div></div>
	<div id= "contenedor12">
	<div id= "picture22" class="checkbox" >
	<b>Enfermedades Padecidas: </b>
	<input name="enfermedades_padecidas" type="checkbox" id= "sarampione" value="Sarampión">
	<label for="sarampione">Sarampión</label>
    <input name="enfermedades_padecidas" type="checkbox" id= "rubiola" value="Rubiola">
	<label for="rubiola">Rubiola</label>
	<input name="enfermedades_padecidas" type="checkbox" id= "lechina" value="Lechina">
	<label for="lechina">Lechina</label>
	<input name="enfermedades_padecidas" type="checkbox" id="tosferina" value="Tosferina">
	<label for="tosferina">Tosferina</label>
	<input name="enfermedades_padecidas" type="checkbox" id="hepatitis" value="Hepatitis">
	<label for="hepatitis">Hepatitis</label>
	<input name="enfermedades_padecidas" type="checkbox" id="dengue" value="Dengue">
	<label for="dengue">Dengue</label>
	</div>
	</div>
	<div id= "contenedor13">
	<div id= "picture23" class="text" >
	<label for="espenpad"><b>Especifique: </b></label>
    <input type="text" name="especifique_enfermedades_padecidas" value="" id= "espenpad" size="15" maxlength="20">
	</div>
	<div id= "picture24" class="text" >
	<label for="otrosenfpad"><b>otros: </b></label>
    <input type="text" name="otros_enfermedades" value="" id= "otrosenfpad" size="15" maxlength="20">	
	</div>
	</div>
	<div id= "contenedor14">
	<div id= "picture25">
		<a  href="Registrarinscripcion6.php" class="button1" ><span class="icon-reply">&nbsp;Anterior</span></a>
	 </div>
	<div id= "picture26">
	<button type="submit" onclick = "this.form.action = '../controlador/ProcesaRegistroinscripcion7.php';" class="button2"><span class="icon-forward"></span> Siguiente</button>
	 </div>
	 </div>
	 <br><br><br>
	<div id= "picture27">
	 (*)campos obligatorios</div>
	</center>
	</fieldset>
</form>

</body>
 
</html>