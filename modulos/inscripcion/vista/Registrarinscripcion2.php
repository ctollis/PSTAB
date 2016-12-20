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
<link href= "css/estilo2.css" rel= "stylesheet"  type= "text/css">
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


<form method="POST" action=""class="formulario2" onSubmit="return validarCampos2(this);"> 
<br><br>
 <fieldset>
<legend align= "center" ><h2>DATOS DEL ALUMNO</h2></legend>
<center>
			<div class="text">
			<label for="cedula_estu"><b>Cédula de Indentidad o Cédula Escolar:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_estu" value="" id="cedula_estu" size="10" maxlength="30"><span>&nbsp;*</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="nombre"><b>Nombres:</b> </label>
    <input type="text" name="nombre" value="" id= "nombre" size="20" maxlength="30"><span>&nbsp;*</span>
	
	</div>
<br>
	<div>
	<label for="apellido"><b>Apellidos:<b/> </label>
    <input type="text" name="apellido" value="" id= "apellido"size="20" maxlength="30"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="fecha_nacimiento"><b>Fecha de Nacimiento:</b> </label>
    <input type="text" name="fecha_nacimiento" value="" id="fecha_nacimiento" size="10" maxlength="30"><span>&nbsp;*</span>
	
</div>
<br>
<div>
<label for="edad">Edad:</label> 
<select id="edad" name="edad">
    <option value="" selected=""></option>
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
    <option value="16">16</option>
	<option value="17">17</option>
    <option value="18">18</option>
	</select><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="ano">Año:</label> 
	<select id="ano" name="ano">
 <option value="" selected=""></option>
    <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
    <option value="2007">2007</option>
	<option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
	<option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
	<option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
	<option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
	<option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    <option value="2027">2027</option>
	<option value="2028">2028</option>
    <option value="2029">2029</option>
    <option value="2030">2030</option>
</select><span>&nbsp;*</span>
&nbsp;&nbsp;
	<label for="lugar_nac">Lugar de Nacimiento: </label>
    <input type="text" name="lugar_nac" value="" id="lugar_nac" size="15" maxlength="20"><span>&nbsp;*</span>
	&nbsp;&nbsp;
    <label for="estado">Estado:</label> 
	<select id="estado" name="estado"><span>&nbsp;*</span>
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
			<div id= "picture1" class= "text">
	<label for="municipio">Municipio: </label>
    <input type="text" name="municipio" value="" id="municipio" size="10" maxlength="20"><span>&nbsp;*</span>
	</div>
<div id= "picture2" class= "radio">
    	<b>Nacionalidad: </b>
	<input type="radio" name="nacionalidad" id="nacionalidad1" value="Venezolano">
	<label for="nacionalidad1">V</label>
    <input type="radio" name="nacionalidad" id="nacionalidad2" value="Extranjero" >
	<label for="nacionalidad2">E</label><span>&nbsp;*</span>
	</div>
	<div id= "picture3">
	<label for="pais_nac">Pais: </label>
	<input type="text" name="pais_nac" value="" id="pais_nac" size="10" maxlength="20"><span>&nbsp;*</span>
		</div>
		<div id= "picture4" class="radio">
	<b>Sexo: </b>
	<input type="radio" name="sexo" id="sexo1" value="Masculino" > 
	<label for="sexo1">M</label>
    <input type="radio" name="sexo" id="sexo2" value="Femenino"> 
	<label for="sexo2">F</label><span>&nbsp;*</span>
	</div>
	</div>
	<br>
	<center ><font color= "#DF0101"><b>DIRECCIÓN ACTUAL DONDE VIVE EL ALUMNO:</b></font></center>
	<br><div class= "text">
 <label for="estado_actu">Estado:</label> 
	<select id="estado_actu" name="estado_actu">
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
    <label for="municipio_actu">Municipio: </label>
    <input type="text" name="municipio_actu" value="" id="municipio_actu"size="10" maxlength="20"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	&nbsp;&nbsp;
	<label for="urb_sector">Urb o Sector:</label>
    <input type="text" name="urb_sector" value="" id= "urb_sector"size="10" maxlength="20"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="calle">Calle o Avenida: </label>
    <input type="text" name="calle" value="" id="calle" size="10" maxlength="20"><span>&nbsp;*</span>
	</div>
	<br>
	<div class= "text">
	<label for="casa_edif">Casa o Edificio: </label>
    <input type="text" name="casa_edif" value="" id="casa_edif"size="10" maxlength="15"><span>&nbsp;*</span>
	&nbsp;&nbsp;
	<label for="piso">Piso: </label>
    <input type="text" name="piso" value="" id="piso"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="apto">Apto: </label>
    <input type="text" name="apto" value="" id="apto"size="2" maxlength="5">
	&nbsp;&nbsp;
	<label for="pto_referencia">Punto de referencia cercano al domicilio: </label>
    <input type="text" name="pto_referencia" value="" id="pto_referencia"size="20" maxlength="30"><span>&nbsp;*</span>
	</div>
	<div id= "contenedor2">
			<div id= "picture5" class="radio">
	<b>Representante: <b>
	<input type="radio" name="representante" id="madre" value='Madre'>
	<label for="madre">Madre</label>
    <input type="radio" name="representante" id="padre" value= 'Padre'>
    <label for="padre">Padre</label>	
	<input type="radio" name="representante" id="otro" value='otro' > 
	<label for="otro">Otro</label>
	</div>
	<div id= "picture6"class= "text">
    <label for="parentesco">(parentesco con el alumno): </label>
    <input type="text" name="parentesco" value="" id="parentesco" size="15" maxlength="20">
	</div>
	</div>
	<div id= "contenedor3">
	<div id= "picture7">
		<a  href="Registrarinscripcion1.php" class="button1" ><span class="icon-reply">&nbsp;Anterior</span></a>
	 </div>
	<div id= "picture8">
	<button type="submit" onclick = "this.form.action = '../controlador/ProcesaRegistroinscripcion2.php';" class="button2"><span class="icon-forward"></span> Siguiente</button>
	 </div>
	 </div>
	 	<br><br><br>

	 <div id= "picture9">
	 (*)campos obligatorios</div>
</form>
</center>
	</fieldset>
</body>
</html>