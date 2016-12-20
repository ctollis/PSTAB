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
<link href= "css/estilo5.css" rel= "stylesheet"  type= "text/css">
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
<form method="POST" action=""class="formulario5" onSubmit="return validarCampos3(this);">
 <fieldset>
<legend align= "center" ><h2>DATOS DEL REPRESENTANTE</h2></legend>
<center>
<form action="" class="formulario5">
<div>
<label for="cedula_estu"><b>Cédula del Estudiante:</b> </label>
    <input type="text"  onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_estu" value="" id="cedula_estu" size="10" maxlength="30"><span>&nbsp;*</span>
	</div>
	<br>
			<div class="text">
			<label for="cedular"><b>Cédula del Representante:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_r" value="" id="cedular" size="10" maxlength="30"><span>&nbsp;*</span>
	&nbsp;&nbsp;
<label for="nombresr"><b>Nombres:</b> </label>
    <input type="text" name="nombre_r" value="" id= "nombresr" size="20" maxlength="30"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="apellidosr"><b>Apellidos:<b/> </label>
    <input type="text" name="apellido_r" value="" id= "apellidosr"size="20" maxlength="30"><span>&nbsp;*</span>
	</div>
<br>	
	<div>
<label for="lugarnacimientor">Lugar de Nacimiento: </label>
    <input type="text" name="lugar_nac_r" value="" id= "lugarnacimientor" size="15" maxlength="20"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="fecha_nac"><b>Fecha de Nacimiento:</b> </label>
    <input type="text" name="fecha_nac_r" value="" id="fecha_nac" size="10" maxlength="30"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="estado_nac">Estado:</label> 
	<select id="estado_nac" name="estado_nac_r">
<option value="" selected="">seleccioné</option>
    <option value="Miranda">Miranda</option>
    <option value="Distrito Capital">Distrito Capital</option>
    <option value="Amazonas">Amazonas</option>
    <option value="Anzoátegui">Anzoátegui</option>
    <option value="Apure">Apure</option>
	<option value="Aragua">Aragua</option>
    <option value="Barinas">Barinas</option>
	<option value="Bolívar">Bolívar</option>
	<option value="Carabobo">Carabobo</option>
    <option value="Cojedes">Cojedes</option>
    <option value="Delta Amacuro">Delta Amacuro</option>
    <option value="Falcón">Falcón</option>
	<option value="Guárico">Guárico</option>
	 <option value="Lara">Lara</option>
    <option value="Mérida">Mérida</option>
    <option value="Monagas">Monagas</option>
	<option value="Nueva Esparta">Nueva Esparta</option>
    <option value="Portuguesa">Portuguesa</option>
    <option value="Sucre">Sucre</option>
    <option value="Táchira">Táchira</option>
	<option value="Trujillo">Trujillo</option>
	<option value="Vargas">Vargas</option>
    <option value="Yaracuy">Yaracuy</option>
    <option value="Zulia">Zulia</option>
</select><span>&nbsp;*</span>
		</div>
		<div id= "contenedor1">
			<div id= "picture1">
	<label for="municipior">Municipio: </label>
    <input type="text" name="municipio_nac_r" value="" id="municipior"size="10" maxlength="20"><span>&nbsp;*</span>
	</div>
			<div id= "picture2" class="radio">
	<b>Nacionalidad: </b>
	<input type="radio" name="nacionalidad_r" id="v" value="Venezolana">
	<label for="v">V</label>
    <input type="radio" name="nacionalidad_r" id="e" value="Extranjera">
	<label for="e">E</label><span>&nbsp;*</span>
	</div>
	<div id= "picture3">
	<label for="paisr">Pais: </label>
	<input type="text" name="pais_r" value="" id= "paisr" size="8" maxlength="20"><span>&nbsp;*</span>
	</div>
	<div id= "picture4" class="radio">
	<b>Sexo: </b>
	<input type="radio" name="sexo_r" id="m" value="Masculino"> 
	<label for="m">M</label>
    <input type="radio" name="sexo_r" id="f" value="Femenino"> 
	<label for="f">F</label><span>&nbsp;*</span>
	</div>
	</div>
<br>
<center ><font color= "#DF0101"><b>DIRECCIÓN ACTUAL DEL REPRESENTANTE:</b></font></center>
<br>
	<div class= "text">
 <label for="estado_actu">Estado:</label> 
	<select id="estado_actu" name="estado_actu_r">
<option value="" selected="">seleccioné</option>
    <option value="Miranda">Miranda</option>
    <option value="Distrito Capital">Distrito Capital</option>
    <option value="Amazonas">Amazonas</option>
    <option value="Anzoátegui">Anzoátegui</option>
    <option value="Apure">Apure</option>
	<option value="Aragua">Aragua</option>
    <option value="Barinas">Barinas</option>
	<option value="Bolívar">Bolívar</option>
	<option value="Carabobo">Carabobo</option>
    <option value="Cojedes">Cojedes</option>
    <option value="Delta Amacuro">Delta Amacuro</option>
    <option value="Falcón">Falcón</option>
	<option value="Guárico">Guárico</option>
	 <option value="Lara">Lara</option>
    <option value="Mérida">Mérida</option>
    <option value="Monagas">Monagas</option>
	<option value="Nueva Esparta">Nueva Esparta</option>
    <option value="Portuguesa">Portuguesa</option>
    <option value="Sucre">Sucre</option>
    <option value="Táchira">Táchira</option>
	<option value="Trujillo">Trujillo</option>
	<option value="Vargas">Vargas</option>
    <option value="Yaracuy">Yaracuy</option>
    <option value="Zulia">Zulia</option>
</select><span>&nbsp;*</span>
&nbsp;&nbsp;
    <label for="municipiorr">Municipio: </label>
    <input type="text" name="municipio_actu_r" value="" id="municipiorr"size="10" maxlength="20"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="urbsectorr">Urb o Sector:</label>
    <input type="text" name="urb_actu_r" value="" id= "urbsectorr"size="10" maxlength="20"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="calleavenidarr">Calle o Avenida: </label>
    <input type="text" name="calle_actu_r" value="" id="calleavenidarr" size="10" maxlength="20"><span>&nbsp;*</span>
	</div>
	<br>
	<div class= "text">
	<label for="casaedificior">Casa o Edificio: </label>
    <input type="text" name="casa_edif_r" value="" id="casaedificior"size="10" maxlength="15"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="pisor">Piso: </label>
    <input type="text" name="piso_r" value="" id="pisor"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="aptor">Apto: </label>
    <input type="text" name="apto_r" value="" id="aptor"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="puntorefr">Punto de referencia cercano al domicilio: </label>
    <input type="text" name="pto_referencia_r" value="" id="puntorefr"size="20" maxlength="30"><span>&nbsp;*</span>
	</div>
	<br>
	<div>
	<label for="telefonohabr">Teléfono de Habitación: </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="telefono_hab_r" value="" id="telefonohabr" size="10" maxlength="15">
	&nbsp;&nbsp;
	<label for="telefonocelr"><b>Teléfono Celular:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="telefono_cel_r" value="" size="10" id="telefonocelr"maxlength="15"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="emailr"><b>Email: </b></label>
    <input type="text" name="email_r" value="@" id="emailr"size="15" maxlength="30">
	&nbsp;&nbsp;
	<label for="pinr">Pin: </label>
    <input type="text" name="pin_r" value="" id="pinr"size="5" maxlength="10">
	</div>
	<div id= "contenedor2">
    <div id= "picture5" class="checkbox">
	<b>Usa Redes Sociales: </b>
	<input name="redes_sociales_r" type="checkbox" id= "whatsapp" value="Whatsapp">
	<label for="whatsapp">Whatsapp</label>
    <input name="redes_sociales_r" type="checkbox" id= "facebook" value="Facebook">
	<label for="facebook">Facebook</label>
	<input name="redes_sociales_r" type="checkbox" id= "twitter"value="Twitter">
	<label for="twitter">Twitter</label>
	</div>
	<div id= "picture6" class="text" >
	<label for="otrosr"><b>Otros: </b></label>
    <input type="text" name="otro_redes_r" value="" id="otrosr"size="10" maxlength="15">	
	</div>
	<div id= "picture7" class="radio" >
	<b>Trabaja: </b>
	<input type="radio" name="trabajo_r" id="sitr" value="Si">
	<label for="sitr">Si </label>	
    <input type="radio" name="trabajo_r" id="notr" value="No">
	<label for="notr">No </label>	<span>&nbsp;*</span>
	</div>
	</div>
	<div id= "contenedor3">
	<div id= "picture8" class="text">
	<label for="profesionr">Profesión: </label>
    <input type="text" name="profesion_r" value="" id="profesionr"size="12" maxlength="15"><span>&nbsp;*</span>
	</div>
	<div id= "picture9" class="radio">
	<b>Ingreso: </b>
	<input type="radio" name="ingreso_mensual_r" id="menors" value="Menor a sueldo minimo">
	<label for="menors"> Menor a sueldo minimo</label>
    <input type="radio" name="ingreso_mensual_r" id="mayors"value="Igual o mayor a sueldo minimo"> 
	<label for="mayors">Igual o mayor a sueldo minimo</label >
	</div>
	</div>
	<br>
	<div id= "picture10" class="radio" >
	<b>Jornada Laboral: </b>
	<input type="radio" name="jornada_laboral_r" id="tiempocompletom" value="Tiempo Completo"> 
	<label for="tiempocompletom">Tiempo Completo</label>
    <input type="radio" name="jornada_laboral_r" id="mediotiempom" value="Medio Tiempo" >
	<label for="mediotiempom">Medio Tiempo</label>
	<input type="radio" name="jornada_laboral_r" id="nocturnom" value="Nocturno"> 
	<label for="nocturnom">Nocturno</label>
	</div>
	<div id= "picture11" class= "text">
	<label for="nombreemprem"> Empresa donde trabaja: </label>
    <input type="text" name="empresa_trabajo_r" value="" id="nombreemprem"size="15" maxlength="30">
	</div>
	<br>
	<br>
		<center><font color= "#DF0101"><b>DIRECCIÓN ACTUAL DEL TRABAJO DEL REPRESENTANTE:</b></font></center>	
		<br>
	<div>
	<label for="estado_trabajo">Estado:</label> 
	<select id="estado_trabajo" name="estado_trabajo_r">
<option value="" selected="">seleccioné</option>
    <option value="Miranda">Miranda</option>
    <option value="Distrito Capital">Distrito Capital</option>
    <option value="Amazonas">Amazonas</option>
    <option value="Anzoátegui">Anzoátegui</option>
    <option value="Apure">Apure</option>
	<option value="Aragua">Aragua</option>
    <option value="Barinas">Barinas</option>
	<option value="Bolívar">Bolívar</option>
	<option value="Carabobo">Carabobo</option>
    <option value="Cojedes">Cojedes</option>
    <option value="Delta Amacuro">Delta Amacuro</option>
    <option value="Falcón">Falcón</option>
	<option value="Guárico">Guárico</option>
	 <option value="Lara">Lara</option>
    <option value="Mérida">Mérida</option>
    <option value="Monagas">Monagas</option>
	<option value="Nueva Esparta">Nueva Esparta</option>
    <option value="Portuguesa">Portuguesa</option>
    <option value="Sucre">Sucre</option>
    <option value="Táchira">Táchira</option>
	<option value="Trujillo">Trujillo</option>
	<option value="Vargas">Vargas</option>
    <option value="Yaracuy">Yaracuy</option>
    <option value="Zulia">Zulia</option>
</select>
&nbsp;&nbsp;
    <label for="municipiotr">Municipio: </label>
    <input type="text" name="municipio_trabajo_r" value="" id="municipiotr"size="10" maxlength="20">
	&nbsp;&nbsp;
	<label for="urb.sectortr">Urb o Sector:</label>
    <input type="text" name="urb_trabajo_r" value="" id="urb.sectortr"  size="10" maxlength="20">
	&nbsp;&nbsp;
	<label for="calle.avenidatr">Calle o Avenida: </label>
    <input type="text" name="calle_trabajo_r" value="" id="calle.avenidatr"size="10" maxlength="20">
	</div>
	<br>
	<div>
	<label for="casa.edificiotr">Casa o Edificio: </label>
    <input type="text" name="casa_trabajo_r" value=""  id="casa.edificiotr"size="10" maxlength="15">
	&nbsp;&nbsp;
	<label for="pisotr">Piso: </label>
    <input type="text" name="piso_trabajo_r" value="" id="pisotr" size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="aptotr">Apto: </label>
    <input type="text" name="apto_trabajo_r" value="" id="aptotr"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="puntoref.tr">Punto de referencia cercano al domicilio: </label>
    <input type="text" name="referencia_trabajo_r" value="" id="puntoref.tr"size="20" maxlength="30">
	</div>
	<br>
	<div>
	<label for="telefonotrabajor">Teléfono de Trabajo: </label>
    <input type="text" name="telefono_trabajo_r" value="" id="telefonotrabajor"size="10" maxlength="10">
	&nbsp;&nbsp;
	<label for="exttr">Ext: </label>
    <input type="text" name="ext_trabajo_r" value="" id="exttr"size="8" maxlength="10">
	&nbsp;&nbsp;
	<label for="personacontacr">Persona de Contacto: </label>
    <input type="text" name="contacto_trabajo_r" value="" id="personacontacr"size="10" maxlength="10">
	&nbsp;&nbsp;
	<label for="extcr">Ext: </label>
    <input type="text" name="ext2_trabajo_r" value="" id="extcr" size="8" maxlength="10">
	</div>
	<div id= "contenedor4">
	<div id= "picture12">
		<a  href="Registrarinscripcion4.php" class="button1" ><span class="icon-reply">&nbsp;Anterior</span></a>
	 </div>
	<div id= "picture13">
	<button type="submit" onclick = "this.form.action = '../controlador/ProcesaRegistroinscripcion5.php';" class="button2"><span class="icon-forward"></span> Siguiente</button>
	
	 </div>
	 </div>
	 <br><br><br>
	<div id= "picture14">
	 (*)campos obligatorios</div>
</form>
</center>
	</fieldset>

</body>
 
</html>