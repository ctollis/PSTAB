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
<link href= "css/estilo4.css" rel= "stylesheet"  type= "text/css">
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
 <form method="POST" action=""class="formulario4" onSubmit="return validarCampos8(this);"> 
 <fieldset>
<legend align= "center" ><h2>DATOS DEL PADRE</h2></legend>
<center>

<div>
<label for="cedula_estu"><b>Cédula del Estudiante:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_estu" value="" id="cedula_estu" size="10" maxlength="30"><span>&nbsp;*</span>
	</div>
	<br>
			<div class="text">
			<label for="cedulap"><b>Cédula del Padre:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_p" value="" id="cedulap" size="10" maxlength="30"><span>&nbsp;*</span>
	&nbsp;&nbsp;
<label for="nombresp"><b>Nombres:</b> </label>
    <input type="text" name="nombre_p" value="" id= "nombresp" size="20" maxlength="30">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label for="apellidosp"><b>Apellidos:<b/> </label>
    <input type="text" name="apellido_p" value="" id= "apellidosp"size="20" maxlength="30">
	</div>
<br>	
	<div>
<label for="lugarnacimientop">Lugar de Nacimiento: </label>
    <input type="text" name="lugar_nac_p" value="" id= "lugarnacimientop" size="15" maxlength="20">
	&nbsp;&nbsp;
	<label for="fecha_nac"><b>Fecha de Nacimiento:</b> </label>
    <input type="text" name="fecha_nac_p" value="" id="fecha_nac" size="10" maxlength="30">
	&nbsp;&nbsp;
	<label for="estado_nac">Estado:</label> 
	<select id="estado_nac" name="estado_nac_p">
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
		<div id= "contenedor1">
			<div id= "picture1">
	<label for="municipiop">Municipio: </label>
    <input type="text" name="municipio_nac_p" value="" id="municipiop"size="10" maxlength="20">
	</div>
			<div id= "picture2" class="radio">
	<b>Nacionalidad: </b>
	<input type="radio" name="nacionalidad_p" id="vp" value="Venezolana">
	<label for="vp">V</label>
    <input type="radio" name="nacionalidad_p" id="ep" value="Extranjera" >
	<label for="ep">E</label>
	</div>
	<div id= "picture3">
	<label for="Paisp">Pais: </label>
	  <input type="text" name="pais_p" value="" id= "pais" size="8" maxlength="20">
	</div>
	<div id= "picture4" class="radio">
	<b>Sexo: </b>
	<input type="radio" name="sexo_p" id="mp" value="Masculino" > 
	<label for="mp">M</label>
    <input type="radio" name="sexo_p" id="fp" value="Femenino"> 
	<label for="fp">F</label>
	</div>
	</div>
<br>
<center ><font color= "#DF0101"><b>DIRECCIÓN ACTUAL DEL PADRE:</b></font></center>
<br>
	<div class= "text">
 <label for="estado_actu">Estado:</label> 
	<select id="estado_actu" name="estado_actu_p">
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
    <label for="municipiopp">Municipio: </label>
    <input type="text" name="municipio_actu_p" value="" id="municipiopp"size="10" maxlength="20">
	&nbsp;&nbsp;
	<label for="urbsectorp">Urb o Sector:</label>
    <input type="text" name="urb_actu_p" value="" id= "urbsectorp"size="10" maxlength="20">
	&nbsp;&nbsp;
	<label for="calleavenidap">Calle o Avenida: </label>
    <input type="text" name="calle_actu_p" value="" id="calleavenidap" size="10" maxlength="20">
	</div>
	<br>
	<div class= "text">
	<label for="casaedificiop">Casa o Edificio: </label>
    <input type="text" name="casa_edif_p" value="" id="casaedificiop"size="10" maxlength="15">
	&nbsp;&nbsp;
	<label for="pisop">Piso: </label>
    <input type="text" name="piso_p" value="" id="pisop"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="aptop">Apto: </label>
    <input type="text" name="apto_p" value="" id="aptop"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="puntorefp">Punto de referencia cercano al domicilio: </label>
    <input type="text" name="pto_referencia_p" value="" id="puntorefp"size="20" maxlength="30">
	</div>
	<br>
	<div>
	<label for="telefonohabp">Teléfono de Habitación: </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="telefono_hab_p" value="" id="telefonohabp" size="10" maxlength="10">
	&nbsp;&nbsp;
	<label for="telefonocelp"><b>Teléfono Celular:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="telefono_cel_p" value="" size="10" id="telefonocelp"maxlength="10">
	&nbsp;&nbsp;
	<label for="emailp"><b>Email: </b></label>
    <input type="text" name="email_p" value="@" id="emailp"size="15" maxlength="30">
	&nbsp;&nbsp;
	<label for="pinp">Pin: </label>
    <input type="text" name="pin_p" value="" id="pinp"size="5" maxlength="10">
	</div>
	<div id= "contenedor2">
    <div id= "picture5" class="checkbox">
	<b>Usa Redes Sociales: </b>
	<input name="redes_sociales_p" type="checkbox" id= "whatsappp" value="Whatsapp">
	<label for="whatsappp">Whatsapp</label>
    <input name="redes_sociales_p" type="checkbox" id= "facebookp" value="Facebook">
	<label for="facebookp">Facebook</label>
	<input name="redes_sociales_p" type="checkbox" id= "twitterp" value="Twitter">
	<label for="twitterp">Twitter</label>
	</div>
	<div id= "picture6" class="text" >
	<label for="otrosp"><b>Otros: </b></label>
    <input type="text" name="otro_redes_p" value="" id="otrosp"size="10" maxlength="15">	
	</div>
	<div id= "picture7" class="radio" >
	<b>Trabaja: </b>
	<input type="radio" name="trabajo_p" id="sitp" value="Si">
	<label for="sitp">Si </label>	
    <input type="radio" name="trabajo_p" id="notp" value="No">
	<label for="notp">No </label>	
	</div>
	</div>
	<div id= "contenedor3">
	<div id= "picture8" class="text">
	<label for="profesionp">Profesión: </label>
    <input type="text" name="profesion_p" value="" id="profesionp"size="12" maxlength="15">
	</div>
	<div id= "picture9" class="radio">
	<b>Ingreso: </b>
	<input type="radio" name="ingreso_mensual_p" id="menorsp" value="Menor a sueldo minimo">
	<label for="menorsp"> Menor a sueldo minimo</label>
    <input type="radio" name="ingreso_mensual_p" id="mayorsp" value="Igual o mayor a sueldo minimo"> 
	<label for="mayorsp">Igual o mayor a sueldo minimo</label>
	</div>
	</div>
	<br>
	<div id= "picture10" class="radio" >
	<b>Jornada Laboral: </b>
	<input type="radio" name="jornada_laboral_p" id="tiempocompletom" value="Tiempo Completo"> 
	<label for="tiempocompletom">Tiempo Completo</label>
    <input type="radio" name="jornada_laboral_p" id="mediotiempom" value="Medio Tiempo" >
	<label for="mediotiempom">Medio Tiempo</label>
	<input type="radio" name="jornada_laboral_p" id="nocturnom" value="Nocturno"> 
	<label for="nocturnom">Nocturno</label>
	</div>
	<div id= "picture11" class= "text">
	<label for="nombreemprem"> Empresa donde trabaja: </label>
    <input type="text" name="empresa_trabajo_p" value="" id="nombreemprem"size="15" maxlength="30">
	</div>
	<br>
	<br>
		<center><font color= "#DF0101"><b>DIRECCIÓN ACTUAL DEL TRABAJO DEL PADRE:</b></font></center>	
		<br>
	<div>
   <label for="estado_trabajo">Estado:</label> 
	<select id="estado_trabajo" name="estado_trabajo_p">
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
    <label for="municipiotp">Municipio: </label>
    <input type="text" name="municipio_trabajo_p" value="" id="municipiotp"size="10" maxlength="20">
	&nbsp;&nbsp;
	<label for="urb.sectortp">Urb o Sector:</label>
    <input type="text" name="urb_trabajo_p" value="" id="urb.sectortp"  size="10" maxlength="20">
	&nbsp;&nbsp;
	<label for="calle.avenidatp">Calle o Avenida: </label>
    <input type="text" name="calle_trabajo_p" value="" id="calle.avenidatp"size="10" maxlength="20">
	</div>
	<br>
	<div>
	<label for="casa.edificiotp">Casa o Edificio: </label>
    <input type="text" name="casa_trabajo_p" value=""  id="casa.edificiotp"size="10" maxlength="15">
	&nbsp;&nbsp;
	<label for="pisotp">Piso: </label>
    <input type="text" name="piso_trabajo_p" value="" id="pisotp" size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="aptotp">Apto: </label>
    <input type="text" name="apto_trabajo_p" value="" id="aptotp"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="puntoref.tp">Punto de referencia cercano al domicilio: </label>
    <input type="text" name="referencia_trabajo_p" value="" id="puntoref.tp"size="20" maxlength="30">
	</div>
	<br>
	<div>
	<label for="telefonotrabajop">Teléfono de Trabajo: </label>
    <input type="text" name="telefono_trabajo_p" value="" id="telefonotrabajop"size="10" maxlength="10">
	&nbsp;&nbsp;
	<label for="exttp">Ext: </label>
    <input type="text" name="ext_trabajo_p" value="" id="exttp"size="8" maxlength="10">
	&nbsp;&nbsp;
	<label for="personacontacp">Persona de Contacto: </label>
    <input type="text" name="contacto_trabajo_p" value="" id="personacontacp"size="10" maxlength="30">
	&nbsp;&nbsp;
	<label for="extcp">Ext: </label>
    <input type="text" name="ext2_trabajo_p" value="" id="extcp" size="8" maxlength="10">
	</div>
	<div id= "contenedor4">
	<div id= "picture12">
		<a  href="Registrarinscripcion3.php" class="button1" ><span class="icon-reply">&nbsp;Anterior</span></a>
	 </div>
	<div id= "picture13">
	<button type="submit" onclick = "this.form.action = '../controlador/ProcesaRegistroinscripcion4.php';" class="button2"><span class="icon-forward"></span> Siguiente</button>
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