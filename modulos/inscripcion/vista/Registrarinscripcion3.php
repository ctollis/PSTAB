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
<link href= "css/estilo3.css" rel= "stylesheet"  type= "text/css">
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

 <form method="POST" action="" class="formulario3" onSubmit="return validarCampos7(this);">
 <fieldset>
<legend align= "center" ><h2>DATOS DE LA MADRE</h2></legend>
<center>
<div>
			<label for="cedula_estu"><b>Cédula del Estudiante:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_estu" value="" id="cedula_estu" size="10" maxlength="30"><span>&nbsp;*</span>
	</div>
	<br>
			<div class="text">
			<label for="cedula_m"><b>Cédula de la Madre:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_m" value="" id="cedula_m" size="10" maxlength="30"><span>&nbsp;*</span>
		&nbsp;&nbsp;
<label for="nombre_m"><b>Nombres:</b> </label>
    <input type="text" name="nombre_m" value="" id= "nombre_m" size="20" maxlength="30">
		&nbsp;&nbsp;
	<label for="apellido_m"><b>Apellidos:<b/> </label>
    <input type="text" name="apellido_m" value="" id= "apellido_m"size="20" maxlength="30">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</div>
	<br>	
	<div>
	&nbsp;&nbsp;
<label for="lugar_nac_m">Lugar de Nacimiento: </label>
    <input type="text" name="lugar_nac_m" value="" id= "lugar_nac_m" size="15" maxlength="20">
	&nbsp;&nbsp;
	<label for="fecha_nac_m"><b>Fecha de Nacimiento:</b> </label>
    <input type="text" name="fecha_nac_m" value="" id="fecha_nac_m" size="10" maxlength="30">
	&nbsp;&nbsp;
	<label for="estado_nac_m">Estado:</label> 
	<select id="estado_nac_m" name="estado_nac_m">
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
		</div>
		<div id= "contenedor1">
			<div id= "picture1">
	<label for="municipio_nac_m">Municipio: </label>
    <input type="text" name="municipio_nac_m" value="" id="municipio_nac_m"size="10" maxlength="20">
	</div>
			<div id= "picture2" class="radio">
	<b>Nacionalidad: </b>
	<input type="radio" name="nacionalidad_m" id="vm" value="Venezolana">
	<label for="vm">V</label>
    <input type="radio" name="nacionalidad_m" id="em" value="Extranjera" >
	<label for="em">E</label>
	</div>
	<div id= "picture3">
	<label for="pais">Pais: </label>
	  <input type="text" name="pais_m" value="" id= "pais" size="8" maxlength="20">
	</div>
	<div id= "picture4" class="radio">
	<b>Sexo: </b>
	<input type="radio" name="sexo_m" id="mm"  value="Masculino"> 
	<label for="mm">M</label>
    <input type="radio" name="sexo_m" id="fm" value="Femenino"> 
	<label for="fm">F</label>
	</div>
	</div>
	<br>
<center ><font color= "#DF0101"><b>DIRECCIÓN ACTUAL DE LA MADRE:</b></font></center>
<br>
	<div class= "text">
 <label for="estado_actu">Estado:</label> 
	<select id="estado_actu" name="estado_actu_m">
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
    <label for="municipio_actu">Municipio: </label>
    <input type="text" name="municipio_actu_m" value="" id="municipio_actu"size="10" maxlength="20">
	&nbsp;&nbsp;
	<label for="urb_actu">Urb o Sector:</label>
    <input type="text" name="urb_actu_m" value="" id= "urb_actu"size="10" maxlength="20">
	&nbsp;&nbsp;
	<label for="calle_actu">Calle o Avenida: </label>
    <input type="text" name="calle_actu_m" value="" id="calle_actu" size="10" maxlength="20">
	</div>
	<br>
	<div class= "text">
	<label for="casa_edif">Casa o Edificio: </label>
    <input type="text" name="casa_edif_m" value="" id="casa_edif"size="10" maxlength="15">
	&nbsp;&nbsp;
	<label for="piso">Piso: </label>
    <input type="text" name="piso_m" value="" id="piso"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="apto">Apto: </label>
    <input type="text" name="apto_m" value="" id="apto"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="pto_referencia">Punto de referencia cercano al domicilio: </label>
    <input type="text" name="pto_referencia_m" value="" id="pto_referencia"size="20" maxlength="30">
	</div>
	<br>
	<div>
	<label for="telefono_hab">Teléfono de Habitación: </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="telefono_hab_m" value="" id="telefono_hab" size="10" maxlength="10">
	&nbsp;&nbsp;
	<label for="telefono_cel"><b>Teléfono Celular:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="telefono_cel_m" value="" size="10" id="telefono_cel"maxlength="10">
	&nbsp;&nbsp;
	<label for="email"><b>Email: </b></label>
    <input type="text" name="email_m" value="@" id="email"size="15" maxlength="30">
	&nbsp;&nbsp;
	<label for="pin">Pin: </label>
    <input type="text" name="pin_m" value="" id="pin"size="5" maxlength="10">
	</div>
	<div id= "contenedor2">
    <div id= "picture5" class="checkbox">
	<b>Usa Redes Sociales: </b>
	<input name="redes_sociales_m" type="checkbox" id= "whatsappm" value="WhatsApp">
	<label for="whatsappm">Whatsapp</label>
    <input name="redes_sociales_m" type="checkbox" id= "facebookm" value="Facebook" >
	<label for="facebookm">Facebook</label>
	<input name="redes_sociales_m" type="checkbox" id= "twitterm" value="Twitter">
	<label for="twitterm">Twitter</label>
	</div>

	<div id= "picture6" class="text" >
	<label for="otro_redes"><b>Otros: </b></label>
    <input type="text" name="otro_redes_m" value="" id="otro_redes"size="10" maxlength="15">	
	</div>
	<div id= "picture7" class="radio" >
	<b>Trabaja: </b>
	<input type="radio" name="trabajo_m" id="sitm" value="Si">
	<label for="sitm">Si </label>	
    <input type="radio" name="trabajo_m" id="notm" value="No">
	<label for="notm">No </label>	
	</div>
	</div>
	<div id= "contenedor3">
	<div id= "picture8" class="text">
	<label for="profesionm">Profesión: </label>
    <input type="text" name="profesion_m" value="" id="profesionm"size="12" maxlength="15">
	</div>
	<div id= "picture9" class="radio">
	<b>Ingreso: </b>
	<input type="radio" name="ingreso_mensual_m" id="menorsm" value="Menor a sueldo minimo">
	<label for="menorsm"> Menor a sueldo minimo</label>
    <input type="radio" name="ingreso_mensual_m" id="mayorsm" value="Igual o mayor a sueldo minimo"> 
	<label for="mayorsm">Igual o mayor a sueldo minimo</label>
	</div>
	</div>
	<br>
	<div id= "picture10" class="radio" >
	<b>Jornada Laboral: </b>
	<input type="radio" name="jornada_laboral_m" id="tiempocompletom" value="Tiempo Completo"> 
	<label for="tiempocompletom">Tiempo Completo</label>
    <input type="radio" name="jornada_laboral_m" id="mediotiempom" value="Medio Tiempo" >
	<label for="mediotiempom">Medio Tiempo</label>
	<input type="radio" name="jornada_laboral_m" id="nocturnom" value="Nocturno"> 
	<label for="nocturnom">Nocturno</label>
	</div>
	<div id= "picture11" class= "text">
	<label for="nombreemprem"> Empresa donde trabaja: </label>
    <input type="text" name="empresa_trabajo_m" value="" id="nombreemprem"size="15" maxlength="30">
	</div>
	<br>
	<br>
		<center><font color= "#DF0101"><b>DIRECCIÓN ACTUAL DEL TRABAJO DE LA MADRE:</b></font></center>	
		<br>
	<div>
	<label for="estado_trabajo">Estado:</label> 
	<select id="estado_trabajo" name="estado_trabajo_m">
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
    <label for="municipio_trabajo">Municipio: </label>
    <input type="text" name="municipio_trabajo_m" value="" id="municipio_trabajo"size="10" maxlength="20">
	&nbsp;&nbsp;
	<label for="urb_trabajo">Urb o Sector:</label>
    <input type="text" name="urb_trabajo_m" value="" id="urb_trabajo"  size="10" maxlength="20">
	&nbsp;&nbsp;
	<label for="calle.avenidatm">Calle o Avenida: </label>
    <input type="text" name="calle_trabajo_m" value="" id="calle.avenidatm"size="10" maxlength="20">
	</div>
	<br>
	<div>
	<label for="casa.edificiotm">Casa o Edificio: </label>
    <input type="text" name="casa_trabajo_m" value=""  id="casa.edificiotm"size="10" maxlength="15">
	&nbsp;&nbsp;
	<label for="pisotm">Piso: </label>
    <input type="text" name="piso_trabajo_m" value="" id="pisotm" size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="aptotm">Apto: </label>
    <input type="text" name="apto_trabajo_m" value="" id="aptotm"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="puntoref.tm">Punto de referencia cercano al domicilio: </label>
    <input type="text" name="referencia_trabajo_m" value="" id="puntoref.tm"size="20" maxlength="30">
	</div>
	<br>
	<div>
	<label for="telefonotrabajom">Teléfono de Trabajo: </label>
    <input type="text" name="telefono_trabajo_m" value="" id="telefonotrabajom"size="10" maxlength="10">
	&nbsp;&nbsp;
	<label for="exttm">Ext: </label>
    <input type="text" name="ext_trabajo_m" value="" id="exttm"size="8" maxlength="10">
	&nbsp;&nbsp;
	<label for="personacontacm">Persona de Contacto: </label>
    <input type="text" name="contacto_trabajo_m" value="" id="personacontacm"size="10" maxlength="10">
	&nbsp;&nbsp;
	<label for="extcm">Ext: </label>
    <input type="text" name="ext2_trabajo_m" value="" id="extcm" size="8" maxlength="10">
	</div>
	<div id= "contenedor4">
	<div id= "picture12">
		<a  href="Registrarinscripcion2.php" class="button1" ><span class="icon-reply">&nbsp;Anterior</span></a>
	 </div>
	<div id= "picture13">
	<button type="submit" onclick = "this.form.action = '../controlador/ProcesaRegistroinscripcion3.php';" class="button2"><span class="icon-forward"></span> Siguiente</button>
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
