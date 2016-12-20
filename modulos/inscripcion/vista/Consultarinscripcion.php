<!DOCTYPE html>
<?php

session_start();
require_once("../../inscripcion/modelo/modeloinscripciones.php");
if (isset($_SESSION['cedula'])){  // Si el usuario inicio sesion correctamente
    $IdUsuarioActivo = $_SESSION['cedula']; 
    $NombreUsuarioActivo = $_SESSION['username'];
}
//Validamos si existe realmente una sesión activa o no 
if($_SESSION['tipo_usuario'] != "Admin")
{ 
	@session_start();
	unset($_SESSION["cedula"]); 
	unset($_SESSION["username"]);
	session_destroy();
	header("Location: ../../../index.php");
  exit;
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
} 
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/estilo.css" rel="stylesheet" type "text/css"/>
	<link rel="stylesheet" type="text/css" href="css/iconos/style.css">
		<script src="js/funci.js" type="text/javascript"></script>
		<script language="javascript" src="js/validacion_campos.js"></script>




	<title>UEMAB-Consultar Estudiante</title>
</head>
<body onload="cargar(); cargar2(); cargar3(); cargar4(); cargar5(); cargar6(); cargar7(); cargar8()">
		
		<header id="main-header" >
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Consultar Estudiante</span>	
		</a>

		<nav>
			<ul>
				<li><a><span class="icon-user"></span>&nbsp&nbsp<?php echo $NombreUsuarioActivo ?></a></li>
				<li><a href="../../usuario/modelo/cerrar_sesion.php" id="bt_cerrar_sesion" >Cerrar Sesi&oacuten</a></li>
			</ul>
		</nav>
		
 		</header>
 		<div id="menu" >
 			<ul>
 				<li><a href="../../pagina_principal/vista_administrador/panel_administrador.php"><span class="icon-home"></span>&nbsp&nbspInicio</a></li>
 				<li><a href=""><span class="icon-text-document"></span>&nbspInscripciones</a></li>
 
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Inicial/Basica</a></li>
				<li><a href="../../comedor/vista/comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
			</ul>
			</div>
			<div id="menu_opciones" >
 			<ul class="nav">
<li><a href="../vista/Registrarinscripcion1.php"><span class="icon-add-user"></span>&nbsp&nbspInscribir Estudiante</a></li>
				<li><a href="Listadeinscripcion.php"><span class="icon-list"></span>&nbsp&nbspLista de Estudiantes </a></li>
 				<li><a href="Consultarinscripcion.php"><span class="icon-magnifying-glass"></span>&nbsp&nbspConsultar Estudiante</a></li> 				
 				
 			</ul>
		</div>
		<form method="POST" action="" >

		<br><br><br><br><br>
<fieldset  class= "fieldset1">
<legend align= "center" ><b>CONSULTAR ESTUDIANTE</b></legend>
		<div align= "center" >
<label for="cedula_estu"><b>C&eacutedula Estudiante:</b> </label>
    <input type="text" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula_estu" value="" id="cedula_estu" size="10" maxlength="30">
<colspan=3 align='right'> <button type="button"  onclick= "BuscarInscripcion(getElementById('cedula_estu').value);
BuscarEstudiante(getElementById('cedula_estu').value); BuscarMadre(getElementById('cedula_estu').value);
BuscarPadre(getElementById('cedula_estu').value); BuscarRepresentante(getElementById('cedula_estu').value);
BuscarSocioeco(getElementById('cedula_estu').value); BuscarSalud(getElementById('cedula_estu').value);
BuscarOtros(getElementById('cedula_estu').value)"><span class="icon-magnifying-glass"></span>&nbsp;Buscar</button></button> 


<br><br>  
</fieldset>
<center>
<br>
<table  class= "table1" border= 0 cellspacing="10" id="rescota">

<tr><td colspan="3" align= "center"><legend align= "center" ><H2>INFORMACIÓN GENERAL</H2></legend></td></tr>
<tr>
	<td align= "center"><b>Año Escolar:</b>&nbsp;<input type="text" name="ano_escolar" size="8" id="ano_escolar"></td>
	<td align= "center"><b>Fecha de Inscripcion:</b>&nbsp;<input type="text" name="fecha_inscripcion" size="8" id="fecha_inscripcion"></td>
	<td align= "center"><b>Grado o año actual:</b>&nbsp;<input type="text" name="grado_actual" size="8" id="grado_actual"></td>
	</tr>
	<tr>
	<td align= "center"><b>Seccion Actual:</b>&nbsp;<input type="text" name="seccion_actual" size="1" id="seccion_actual"></td>
	<td align= "center"><b>Grado a Cursar:</b>&nbsp;<input type="text" name="grado_cursar" size="8" id="grado_cursar"></td>
	<td align= "center"><b>Repite:</b>&nbsp;<input type="text" name="repite" size="1" id="repite"></td>
	</tr>
	<tr>
	<td  colspan="3" align= "center"><button type="submit" onclick =  "if(confirm('¿Esta seguro que desea modificar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt.php';"name="accion" id="btn2" value="Modificar"><span class="icon-edit">Modificar</span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit" onclick =  "if(confirm('¿Esta seguro que desea eliminar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt.php';"name="accion" id="btn3" value="Eliminar"><span class="icon-trash">Eliminar</span></button>
</td>
	</tr>
</table>
<br>
<table  class= "table1" border= "0" cellspacing="10" id="rescota2">

<tr><td colspan="3" align= "center"><legend align= "center" ><H2>DATOS DEL ALUMNO</H2></legend></td></tr>
<tr>
	<td align="center" colspan= "3"><b>Nombres:</b>&nbsp;<input type="text" name="nombre" size="20" id="nombre">&nbsp;<b>Apellidos:</b>&nbsp;<input type="text" name="apellido" size="20" id="apellido"></td>
	</tr>
	<tr >
	<td align="center"><b>Fecha de nacimiento:</b>&nbsp;<input type="text" name="fecha_nacimiento" size="8" id="fecha_nacimiento"></td>
	<td align="center"><b>Edad:</b>&nbsp;<input type="text" name="edad" size="1" id="edad"></td>
	<td align="center"><b>Año:</b>&nbsp;<input type="text" name="ano" size="5" id="ano"></td>
    </tr>
	<tr>
	<td align="center"><b>Lugar de nacimiento:</b>&nbsp;<input type="text" name="lugar_nac" size="10" id="lugar_nac"></td>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado" size="10" id="estado"></td>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio" size="10" id="municipio"></td>
	</tr>
	<tr>
	<td align="center"><b>Nacionalidad:</b>&nbsp;<input type="text" name="nacionalidad" size="8" id="nacionalidad"></td>
	<td align="center"><b>Pais:</b>&nbsp;<input type="text" name="pais_nac" size="8" id="pais_nac"></td>
	<td align="center"><b>Sexo:</b>&nbsp;<input type="text" name="sexo" size="8" id="sexo"></td>
	</tr>
	<tr><td colspan="3" align= "center"><H4>DIRECCIÓN ACTUAL DONDE VIVE EL ALUMNO:</H4></td></tr>
<tr>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado_actu" size="10" id="estado_actu"></td>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio_actu" size="10" id="municipio_actu"></td>
	<td align="center"><b>Urb o Sector:</b>&nbsp;<input type="text" name="urb_sector" size="10" id="urb_sector"></td>
	</tr>
	<tr>
	<td align="center"><b>Calle o Avenida:</b>&nbsp;<input type="text" name="calle" size="8" id="calle"></td>
	<td align="center"><b>Casa o Edificio:</b>&nbsp;<input type="text" name="casa_edif" size="8" id="casa_edif"></td>
	<td align="center"><b>Piso:</b>&nbsp;<input type="text" name="piso" size="8" id="piso"><b>Apto:</b>&nbsp;<input type="text" name="apto" size="8" id="apto"></td>
	</tr>
	<tr>
	<td align="center"><b>Punto de referencia cercano al domicilio:</b>&nbsp;<input type="text" name="pto_referencia" size="10" id="pto_referencia"></td>
	<td align="center"><b>Representante:</b>&nbsp;<input type="text" name="representante" size="8" id="representante"></td>
	<td align="center"><b>(parentesco con el alumno):</b>&nbsp;<input type="tex" name="parentesco" size="8" id="parentesco"> </td>
	</tr>
	<tr>
	<td  colspan="3" align= "center"><button type="submit" onclick =  "if(confirm('¿Esta seguro que desea modificar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt2.php';"name="accion2" id="btn4" value="Modificar"><span class="icon-edit">Modificar</span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit" onclick =  "if(confirm('¿Esta seguro que desea eliminar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt2.php';"name="accion2" id="btn5" value="Eliminar"><span class="icon-trash">Eliminar</span></button>
	</td>
	</tr>
</table>
<br>
<table  class= "table1" border= "0" cellspacing="10" id="rescota3">

<tr><td colspan="3" align= "center"><legend align= "center" ><H2>DATOS DE LA MADRE</H2></legend></td></tr>
<tr>
	<td align="center"><b>Cedula de la Madre:</b>&nbsp;<input type="text" name="cedula_m" size="10" id="cedula_m"></td>
	<td align="center"><b>Nombres:</b>&nbsp;<input type="text" name="nombre_m" size="20" id="nombre_m"></td>
	<TD align="center"><b>Apellidos:</b>&nbsp;<input type="text" name="apellido_m" size="20" id="apellido_m"></td>
	</tr>
	<tr >
	<td align="center"><b>Lugar de nacimiento:</b>&nbsp;<input type="text" name="lugar_nac_m" size="10" id="lugar_nac_m"></td>
	<td align="center"><b>Fecha de nacimiento:</b>&nbsp;<input type="text" name="fecha_nac_m" size="8" id="fecha_nac_m"></td>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado_nac_m" size="10" id="estado_nac_m"></td>
    </tr>
	<tr>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio_nac_m" size="10" id="municipio_nac_m"></td>
	<td align="center"><b>Nacionalidad:</b>&nbsp;<input type="text" name="nacionalidad_m" size="8" id="nacionalidad_m"></td>
	<td align="center"><b>Pais:</b>&nbsp;<input type="text" name="pais_m" size="8" id="pais_m">&nbsp;<b>Sexo:</b>&nbsp;<input type="text" name="sexo_m" size="8" id="sexo_m"></td>
	</tr>
	<tr><td colspan="3" align= "center"><H4>DIRECCIÓN ACTUAL DE LA MADRE:</H4></td></tr>
    <tr>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado_actu_m" size="10" id="estado_actu_m"></td>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio_actu_m" size="10" id="municipio_actu_m"></td>
	<td align="center"><b>Urb o Sector:</b>&nbsp;<input type="text" name="urb_actu_m" size="10" id="urb_actu_m"></td>
	</tr>
	<tr>
	<td align="center"><b>Calle o Avenida:</b>&nbsp;<input type="text" name="calle_actu_m" size="10" id="calle_actu_m"></td>
	<td align="center"><b>Casa o Edificio:</b>&nbsp;<input type="text" name="casa_edif_m" size="5" id="casa_edif_m"></td>
	<td align="center"><b>Piso:</b>&nbsp;<input type="text" name="piso_m" size="1" id="piso_m"><b>Apto:</b>&nbsp;<input type="text" name="apto_m" size="2" id="apto_m"></td>
	</tr>
	<tr>
	<td align="center"><b>Punto de referencia cercano al domicilio:</b>&nbsp;<input type="text" name="pto_referencia_m" size="10" id="pto_referencia_m"></td>
	<td align="center"><b>Teléfono Habitación:</b>&nbsp;<input type="text" name="telefono_hab_m" size="10" id="telefono_hab_m"></td>
	<td align="center"><b>Teléfono Celular:</b>&nbsp;<input type="text"  name="telefono_cel_m" size="10" id="telefono_cel_m"></td>
	</tr>
	<tr>
	<td align="center"><b>Email:</b>&nbsp;<input type="text" name="email_m" size="20" id="email_m"></td>
	<td align="center"><b>Pin:</b>&nbsp;<input type="text" name="pin_m" size="8" id="pin_m"></td>
	<td align="center"><b>Usa Redes Sociales:</b>&nbsp;<input type="text" name="redes_sociales_m" size="15" id="redes_sociales_m"></td>
	</tr>
    <tr>
	<td align="center"><b>Otros:</b>&nbsp;<input type="text" name="otro_redes_m" size="10" id="otro_redes_m"></td>
	<td align="center"><b>Trabaja:</b>&nbsp;<input type="text" name="trabajo_m" size="1" id="trabajo_m"></td>
	<td align="center"><b>Profesión:</b>&nbsp;<input type="text" name="profesion_m" size="15" id="profesion_m"></td>
	</tr>
	<tr>
	<td align="center"><b>Ingreso Mensual:</b>&nbsp;<input type="text" name="ingreso_mensual_m" size="20" id="ingreso_mensual_m"></td>
	<td align="center"><b>Tipo de Jornada Laboral:</b>&nbsp;<input type="text" name="jornada_laboral_m" size="15" id="jornada_laboral_m"></td>
	<td align="center"><b>Empresa donde trabaja:</b>&nbsp;<input type="text" name="empresa_trabajo_m" size="15" id="empresa_trabajo_m"></td>
	</tr>
	<tr><td colspan="3" align= "center"><H4>DIRECCIÓN ACTUAL DEL TRABAJO DE LA MADRE:</H4></td></tr>
	<tr>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado_trabajo_m" size="10" id="estado_trabajo_m"></td>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio_trabajo_m" size="10" id="municipio_trabajo_m"></td>
	<td align="center"><b>Urb o Sector:</b>&nbsp;<input type="text" name="urb_trabajo_m" size="10" id="urb_trabajo_m"></td>
	</tr>
	<tr>
	<td align="center"><b>Calle o Avenida:</b>&nbsp;<input type="text" name="calle_trabajo_m" size="10" id="calle_trabajo_m"></td>
	<td align="center"><b>Casa o Edificio:</b>&nbsp;<input type="text" name="casa_trabajo_m" size="5" id="casa_trabajo_m"></td>
	<td align="center"><b>Piso:</b>&nbsp;<input type="text" name="piso_trabajo_m" size="1" id="piso_trabajo_m"><b>Apto:</b>&nbsp;<input type="text" name="apto_trabajo_m" size="2" id="apto_trabajo_m"></td>
	</tr>
	<tr>
	<td  colspan= "3" align="center"><b>Punto de referencia cercano al domicilio:</b>&nbsp;&nbsp;<input type="text" name="referencia_trabajo_m" size="10" id="referencia_trabajo_m">&nbsp; <b>Teléfono de Trabajo:</b>&nbsp;<input type="text" name="telefono_trabajo_m" size="10" id="telefono_trabajo_m"></td>
	</tr>
	<tr>
	<td align="center"><b>Ext:</b>&nbsp;<input type="text" name="ext_trabajo_m" size="4" id="ext_trabajo_m"></td>
	<td align="center"><b>Persona de contacto:</b>&nbsp;<input type="text" name="contacto_trabajo_m" size="10" id="contacto_trabajo_m"></td>
	<td align="center"><b>Ext:</b>&nbsp;<input type="text" name="ext2_trabajo_m" size="4" id="ext2_trabajo_m"></td>
	</tr>
	<tr>
	<td  colspan="3" align= "center"><button type="submit" onclick =  "if(confirm('¿Esta seguro que desea modificar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt3.php';"name="accion3" id="btn6" value="Modificar"><span class="icon-edit">Modificar</span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit" onclick =  "if(confirm('¿Esta seguro que desea eliminar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt3.php';"name="accion3" id="btn7" value="Eliminar"><span class="icon-trash">Eliminar</span></button>
	</td>
	</tr>
</table>
<br>
<table  class= "table1" border= "0" cellspacing="10" id="rescota4">

<tr><td colspan="3" align= "center"><legend align= "center" ><H2>DATOS DEL PADRE</H2></legend></td></tr>
<tr>
	<td align="center"><b>Cedula del Padre:</b>&nbsp;<input type="text" name="cedula_p" size="10" id="cedula_p"></td>
	<td align="center"><b>Nombres:</b>&nbsp;<input type="text" name="nombre_p" size="20" id="nombre_p"></td>
	<TD align="center"><b>Apellidos:</b>&nbsp;<input type="text" name="apellido_p" size="20" id="apellido_p"></td>
	</tr>
	<tr >
	<td align="center"><b>Lugar de nacimiento:</b>&nbsp;<input type="text" name="lugar_nac_p" size="10" id="lugar_nac_p"></td>
	<td align="center"><b>Fecha de nacimiento:</b>&nbsp;<input type="text" name="fecha_nac_p" size="8" id="fecha_nac_p"></td>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado_nac_p" size="10" id="estado_nac_p"></td>
    </tr>
	<tr>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio_nac_p" size="10" id="municipio_nac_p"></td>
	<td align="center"><b>Nacionalidad:</b>&nbsp;<input type="text" name="nacionalidad_p" size="8" id="nacionalidad_p"></td>
	<td align="center"><b>Pais:</b>&nbsp;<input type="text" name="pais_p" size="8" id="pais_p">&nbsp;<b>Sexo:</b>&nbsp;<input type="text" name="sexo_p" size="8" id="sexo_p"></td>
	</tr>
	<tr><td colspan="3" align= "center"><H4>DIRECCIÓN ACTUAL DEL PADRE:</H4></td></tr>
    <tr>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado_actu_p" size="10" id="estado_actu_p"></td>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio_actu_p" size="10" id="municipio_actu_p"></td>
	<td align="center"><b>Urb o Sector:</b>&nbsp;<input type="text" name="urb_actu_p" size="10" id="urb_actu_p"></td>
	</tr>
	<tr>
	<td align="center"><b>Calle o Avenida:</b>&nbsp;<input type="text" name="calle_actu_p" size="10" id="calle_actu_p"></td>
	<td align="center"><b>Casa o Edificio:</b>&nbsp;<input type="text" name="casa_edif_p" size="5" id="casa_edif_p"></td>
	<td align="center"><b>Piso:</b>&nbsp;<input type="text" name="piso_p" size="1" id="piso_p"><b>Apto:</b>&nbsp;<input type="text" name="apto_p" size="2" id="apto_p"></td>
	</tr>
	<tr>
	<td align="center"><b>Punto de referencia cercano al domicilio:</b>&nbsp;<input type="text" name="pto_referencia_p" size="15" id="pto_referencia_p"></td>
	<td align="center"><b>Teléfono Habitación:</b>&nbsp;<input type="text" name="telefono_hab_p" size="10" id="telefono_hab_p"></td>
	<td align="center"><b>Teléfono Celular:</b>&nbsp;<input type="text"  name="telefono_cel_p" size="10" id="telefono_cel_p"></td>
	</tr>
	<tr>
	<td align="center"><b>Email:</b>&nbsp;<input type="text" name="email_p" size="20" id="email_p"></td>
	<td align="center"><b>Pin:</b>&nbsp;<input type="text" name="pin_p" size="8" id="pin_p"></td>
	<td align="center"><b>Usa Redes Sociales:</b>&nbsp;<input type="text" name="redes_sociales_p" size="15" id="redes_sociales_p"></td>
	</tr>
    <tr>
	<td align="center"><b>Otros:</b>&nbsp;<input type="text" name="otro_redes_p" size="10" id="otro_redes_p"></td>
	<td align="center"><b>Trabaja:</b>&nbsp;<input type="text" name="trabajo_p" size="1" id="trabajo_p"></td>
	<td align="center"><b>Profesión:</b>&nbsp;<input type="text" name="profesion_p" size="15" id="profesion_p"></td>
	</tr>
	<tr>
	<td align="center"><b>Ingreso Mensual:</b>&nbsp;<input type="text" name="ingreso_mensual_p" size="20" id="ingreso_mensual_p"></td>
	<td align="center"><b>Tipo de Jornada Laboral:</b>&nbsp;<input type="text" name="jornada_laboral_p" size="15" id="jornada_laboral_p"></td>
	<td align="center"><b>Empresa donde trabaja:</b>&nbsp;<input type="text" name="empresa_trabajo_p" size="15" id="empresa_trabajo_p"></td>
	</tr>
	<tr><td colspan="3" align= "center"><H4>DIRECCIÓN ACTUAL DEL TRABAJO DEL PADRE:</H4></td></tr>
	<tr>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado_trabajo_p" size="10" id="estado_trabajo_p"></td>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio_trabajo_p" size="10" id="municipio_trabajo_p"></td>
	<td align="center"><b>Urb o Sector:</b>&nbsp;<input type="text" name="urb_trabajo_p" size="10" id="urb_trabajo_p"></td>
	</tr>
	<tr>
	<td align="center"><b>Calle o Avenida:</b>&nbsp;<input type="text" name="calle_trabajo_p" size="10" id="calle_trabajo_p"></td>
	<td align="center"><b>Casa o Edificio:</b>&nbsp;<input type="text" name="casa_trabajo_p" size="5" id="casa_trabajo_p"></td>
	<td align="center"><b>Piso:</b>&nbsp;<input type="text" name="piso_trabajo_p" size="1" id="piso_trabajo_p"><b>Apto:</b>&nbsp;<input type="text" name="apto_trabajo_p" size="2" id="apto_trabajo_p"></td>
	</tr>
	<tr>
	<td  colspan= "3" align="center"><b>Punto de referencia cercano al domicilio:</b>&nbsp;<input type="text" name="referencia_trabajo_p" size="15" id="referencia_trabajo_p">&nbsp;&nbsp;<b>Teléfono de Trabajo:</b>&nbsp;<input type="text" name="telefono_trabajo_p" size="10" id="telefono_trabajo_p"></td>
	</tr>
	<tr>
	<td align="center"><b>Ext:</b>&nbsp;<input type="text" name="ext_trabajo_p" size="4" id="ext_trabajo_p"></td>
	<td align="center"><b>Persona de contacto:</b>&nbsp;<input type="text" name="contacto_trabajo_p" size="15" id="contacto_trabajo_p"></td>
	<td align="center"><b>Ext:</b>&nbsp;<input type="text" name="ext2_trabajo_p" size="4" id="ext2_trabajo_p"></td>
	</tr>
	<tr>
	<td  colspan="3" align= "center"><button type="submit" onclick =  "if(confirm('¿Esta seguro que desea modificar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt4.php';"name="accion4" id="btn8" value="Modificar"><span class="icon-edit">Modificar</span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit" onclick =  "if(confirm('¿Esta seguro que desea eliminar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt4.php';"name="accion4" id="btn9" value="Eliminar"><span class="icon-trash">Eliminar</span></button>
	</td>
	</tr>
</table>
<br>
<table  class= "table1" border= "0" cellspacing="10" id="rescota5">

<tr><td colspan="3" align= "center"><legend align= "center" ><H2>DATOS DEL REPRESENTANTE</H2></legend></td></tr>
<tr>
	<td align="center"><b>Cedula del Padre:</b>&nbsp;<input type="text" name="cedula_r" size="10" id="cedula_r"></td>
	<td align="center"><b>Nombres:</b>&nbsp;<input type="text" name="nombre_r" size="20" id="nombre_r"></td>
	<TD align="center"><b>Apellidos:</b>&nbsp;<input type="text" name="apellido_r" size="20" id="apellido_r"></td>
	</tr>
	<tr >
	<td align="center"><b>Lugar de nacimiento:</b>&nbsp;<input type="text" name="lugar_nac_r" size="10" id="lugar_nac_r"></td>
	<td align="center"><b>Fecha de nacimiento:</b>&nbsp;<input type="text" name="fecha_nac_r" size="8" id="fecha_nac_r"></td>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado_nac_r" size="10" id="estado_nac_r"></td>
    </tr>
	<tr>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio_nac_r" size="10" id="municipio_nac_r"></td>
	<td align="center"><b>Nacionalidad:</b>&nbsp;<input type="text" name="nacionalidad_r" size="8" id="nacionalidad_r"></td>
	<td align="center"><b>Pais:</b>&nbsp;<input type="text" name="pais_r" size="10" id="pais_r">&nbsp;<b>Sexo:</b>&nbsp;<input type="text" name="sexo_r" size="8" id="sexo_r"></td>
	</tr>
	<tr><td colspan="3" align= "center"><H4>DIRECCIÓN ACTUAL DEL REPRESENTANTE:</H4></td></tr>
    <tr>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado_actu_r" size="10" id="estado_actu_r"></td>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio_actu_r" size="10" id="municipio_actu_r"></td>
	<td align="center"><b>Urb o Sector:</b>&nbsp;<input type="text" name="urb_actu_r" size="10" id="urb_actu_r"></td>
	</tr>
	<tr>
	<td align="center"><b>Calle o Avenida:</b>&nbsp;<input type="text" name="calle_actu_r" size="10" id="calle_actu_r"></td>
	<td align="center"><b>Casa o Edificio:</b>&nbsp;<input type="text" name="casa_edif_r" size="5" id="casa_edif_r"></td>
	<td align="center"><b>Piso:</b>&nbsp;<input type="text" name="piso_r" size="1" id="piso_r"><b>Apto:</b>&nbsp;<input type="text" name="apto_r" size="2" id="apto_r"></td>
	</tr>
	<tr>
	<td align="center"><b>Punto de referencia cercano al domicilio:</b>&nbsp;<input type="text" name="pto_referencia_r" size="10" id="pto_referencia_r"></td>
	<td align="center"><b>Teléfono Habitación:</b>&nbsp;<input type="text" name="telefono_hab_r" size="10" id="telefono_hab_r"></td>
	<td align="center"><b>Teléfono Celular:</b>&nbsp;<input type="text"  name="telefono_cel_r" size="10" id="telefono_cel_r"></td>
	</tr>
	<tr>
	<td align="center"><b>Email:</b>&nbsp;<input type="text" name="email_r" size="8" id="email_r"></td>
	<td align="center"><b>Pin:</b>&nbsp;<input type="text" name="pin_r" size="8" id="pin_r"></td>
	<td align="center"><b>Usa Redes Sociales:</b>&nbsp;<input type="text" name="redes_sociales_r" size="8" id="redes_sociales_r"></td>
	</tr>
    <tr>
	<td align="center"><b>Otros:</b>&nbsp;<input type="text" name="otro_redes_r" size="8" id="otro_redes_r"></td>
	<td align="center"><b>Trabaja:</b>&nbsp;<input type="text" name="trabajo_r" size="8" id="trabajo_r"></td>
	<td align="center"><b>Profesión:</b>&nbsp;<input type="text" name="profesion_r" size="8" id="profesion_r"></td>
	</tr>
	<tr>
	<td align="center"><b>Ingreso Mensual:</b>&nbsp;<input type="text" name="ingreso_mensual_r" size="20" id="ingreso_mensual_r"></td>
	<td align="center"><b>Tipo de Jornada Laboral:</b>&nbsp;<input type="text" name="jornada_laboral_r" size="15" id="jornada_laboral_r"></td>
	<td align="center"><b>Empresa donde trabaja:</b>&nbsp;<input type="text" name="empresa_trabajo_r" size="15" id="empresa_trabajo_r"></td>
	</tr>
	<tr><td colspan="3" align= "center"><H4>DIRECCIÓN ACTUAL DEL TRABAJO DEL REPRESENTANTE:</H4></td></tr>
	<tr>
	<td align="center"><b>Estado:</b>&nbsp;<input type="text" name="estado_trabajo_r" size="10" id="estado_trabajo_r"></td>
	<td align="center"><b>Municipio:</b>&nbsp;<input type="text" name="municipio_trabajo_r" size="10" id="municipio_trabajo_r"></td>
	<td align="center"><b>Urb o Sector:</b>&nbsp;<input type="text" name="urb_trabajo_r" size="10" id="urb_trabajo_r"></td>
	</tr>
	<tr>
	<td align="center"><b>Calle o Avenida:</b>&nbsp;<input type="text" name="calle_trabajo_r" size="10" id="calle_trabajo_r"></td>
	<td align="center"><b>Casa o Edificio:</b>&nbsp;<input type="text" name="casa_trabajo_r" size="5" id="casa_trabajo_r"></td>
	<td align="center"><b>Piso:</b>&nbsp;<input type="text" name="piso_trabajo_r" size="1" id="piso_trabajo_r"><b>Apto:</b>&nbsp;<input type="text" name="apto_trabajo_r" size="2" id="apto_trabajo_r"></td>
	</tr>
	<tr>
	<td  colspan= "3" align="center"><b>Punto de referencia cercano al domicilio:</b>&nbsp;<input type="text" name="referencia_trabajo_r" size="15" id="referencia_trabajo_r">&nbsp;&nbsp;<b>Teléfono de Trabajo:</b>&nbsp;<input type="text" name="telefono_trabajo_r" size="10" id="telefono_trabajo_r"></td>
	</tr>
	<tr>
	<td align="center"><b>Ext:</b>&nbsp;<input type="text" name="ext_trabajo_r" size="4" id="ext_trabajo_r"></td>
	<td align="center"><b>Persona de contacto:</b>&nbsp;<input type="text" name="contacto_trabajo_r" size="15" id="contacto_trabajo_r"></td>
	<td align="center"><b>Ext:</b>&nbsp;<input type="text" name="ext2_trabajo_r" size="4" id="ext2_trabajo_r"></td>
	</tr>
	<tr>
	<td  colspan="3" align= "center"><button type="submit" onclick =  "if(confirm('¿Esta seguro que desea modificar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt5.php';"name="accion5" id="btn10" value="Modificar"><span class="icon-edit">Modificar</span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit" onclick =  "if(confirm('¿Esta seguro que desea eliminar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt5.php';"name="accion5" id="btn11" value="Eliminar"><span class="icon-trash">Eliminar</span></button>
	</td>
	</tr>
</table>
<br>
<table  class= "table1" border= 0 cellspacing="10" id="rescota6">

<tr><td colspan="2" align= "center"><legend align= "center" ><H2>DATOS SOCIO-ECONOMICOS</H2></legend></td></tr>
    <tr>
	<td align= "center"><b>El Alumno (a) vive con :</b>&nbsp;<input type="text" name="vive_con" size="8" id="vive_con"></td>
	<td ><b>Otros (especifique):</b>&nbsp;<input type="text" name="otros_vive" size="8" id="otros_vive"></td>
	</tr>
	<tr>
	<td align= "center"><b>El Alumno esta becado:</b>&nbsp;<input type="text" name="beca" size="1" id="beca"></td>
	<td><b>Especifique:</b>&nbsp;<input type="text" name="especifique_beca" size="10" id="especifique_beca"></td>
	</tr>
	<tr>
	<td align= "center"><b>Medio de Traslado al plantel: </b>&nbsp;<input type="text" name="medio_traslado_plantel" size="10" id="medio_traslado_plantel"></td>
	<td ><b>Otros:</b>&nbsp;<input type="text" name="otros_ruta" size="8" id="otros_ruta"></td>
	</tr>
	<tr>
	<td align= "center"><b>El Alumno (a) se retira solo (a) del Plantel:</b>&nbsp;<input type="text" name="se_retira_solo_plantel" size="1" id="se_retira_solo_plantel"></td>
	<td ><b>N° de Hermanos:</b>&nbsp;<input type="text" name="n_hermanos" size="1" id="n_hermanos"></td>
	</tr>
	<tr>
	<td align= "center"><b>Hermanos (as) que estudian en el Plantel:</b>&nbsp;<input type="text" name="hermanos_en_plantel" size="1" id="hermanos_en_plantel"></td>
	<td ><b>Especifique Grado:</b>&nbsp;<input type="text" name="especifique_grado_hermano" size="8" id="especifique_grado_hermano"></td>
	</tr>
	<tr>
	<td align= "center"><b>Datos de la Vivienda :</b>&nbsp;<input type="text" name="datos_vivienda" size="8" id="datos_vivienda"></td>
	<td ><b>Otros:</b>&nbsp;<input type="text" name="otros_datos_vivienda" size="8" id="otros_datos_vivienda"></td>
	</tr>
	<tr>
	<td  colspan="3" align= "center"><button type="submit" onclick =  "if(confirm('¿Esta seguro que desea modificar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt6.php';"name="accion6" id="btn12" value="Modificar"><span class="icon-edit">Modificar</span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit" onclick =  "if(confirm('¿Esta seguro que desea eliminar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt6.php';"name="accion6" id="btn13" value="Eliminar"><span class="icon-trash">Eliminar</span></button>
	</td>
	</tr>
</table>
<br>
<table  class= "table1" border= "0" cellspacing="10" id="rescota7">

<tr><td colspan="3" align= "center"><legend align= "center" ><H2>DATOS DE SALUD</H2></legend></td></tr>
<tr>
	<td align="center"><b>Grupo Sanguineo :</b>&nbsp;<input type="text" name="grupo_sang" size="1" id="grupo_sang"></td>
	<td ><b>Factor RH :</b>&nbsp;<input type="text" name="factor_rh" size="8" id="factor_rh"></td>
	<TD ><b>Talla:</b>&nbsp;<input type="text" name="talla" size="4" id="talla"></td>
	</tr>
	<tr >
	<td align="center"><b>Peso:</b>&nbsp;<input type="text" name="peso" size="4" id="peso"></td>
	<td ><b>Padece alguna Enfermedad:</b>&nbsp;<input type="text" name="padece_enfermedad" size="1" id="padece_enfermedad"></td>
	<td align="center"><b>Especifique:</b>&nbsp;<input type="text" name="especifique_enfermedad" size="10" id="especifique_enfermedad"></td>
    </tr>
	<tr>
	<td colspan= "3" align="center"><b>El Alumno Tiene alguna diversidad funcional:</b>&nbsp;<input type="text" name="diversidad_funcional" size="1" id="diversidad_funcional">&nbsp;<b>Especifique:</b>&nbsp;<input type="text" name="especifique_diversidad" size="15" id="especifique_diversidad"></td>
	</tr>
    <tr>
	<td colspan= "3" align="center"><b>Operado:</b>&nbsp;<input type="text" name="operaciones" size="1" id="operaciones">&nbsp;<b>Especifique: </b>&nbsp;<input type="text" name="especifique_operacion" size="15" id="especifique_operacion"></td>
	</tr>
		<tr><td colspan="3" align= "center"><H4>ALERGICO:</H4></td></tr>
	<tr>
	<td colspan= "3" align="center"><b>Alimentos:</b>&nbsp;<input type="text" name="alergias_alimentos" size="1" id="alergias_alimentos">&nbsp;<b>Especifique:</b>&nbsp;<input type="text" name="especifique_alergia_alimento" size="15" id="especifique_alergia_alimento"></td>
	</tr>
	<tr>
	<td colspan= "3" align="center"><b>Medicamento:</b>&nbsp;<input type="text" name="alergias_medicamentos" size="1" id="alergias_medicamentos">&nbsp;<b>Especifique:</b>&nbsp;<input type="text" name="especifique_alergia_medicamento" size="15" id="especifique_alergia_medicamento"></td>
	</tr>
	<tr>
	<td colspan= "3" align="center"><b>Otros:</b>&nbsp;<input type="text" name="alergias_otros" size="1" id="alergias_otros">&nbsp;<b>Especifique:</b>&nbsp;<input type="text" name="especifique_alergia_otros" size="15" id="especifique_alergia_otros"></td>
	</tr>
    <tr>
	<td colspan= "3" align="center"><b>Indique si sigue algún régimen especial de Alimentación o Tratamiento:</b>&nbsp;<input type="text" name="alim_trata_espe" size="1" id="alim_trata_espe">&nbsp;<b>Especifique:</b>&nbsp;<input type="text" name="especifique_alimentacion" size="15" id="especifique_alimentacion"></td>
	</tr>
	<tr>
	<td colspan= "3" align="center"><b>Vacunas:</b>&nbsp;<input type="text" name="vacunas" size="15" id="vacunas">&nbsp;<b>otros:</b>&nbsp;<input type="text" name="otros_vacuna" size="8" id="otros_vacuna"></td>
	</tr>
	<tr>
	<td align="center"><b>Enfermedades Padecidas::</b>&nbsp;<input type="text" name="enfermedades_padecidas" size="15" id="enfermedades_padecidas"></td>
	<td align="center"><b>Especifique:</b>&nbsp;<input type="text" name="especifique_enfermedades_padecidas" size="15" id="especifique_enfermedades_padecidas"></td>
	<td align="center"><b>otros:</b>&nbsp;<input type="text" name="otros_enfermedades" size="8" id="otros_enfermedades">
    </td>	
	</tr>
	<tr>
	<td  colspan="3" align= "center"><button type="submit" onclick =  "if(confirm('¿Esta seguro que desea modificar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt7.php';"name="accion7" id="btn14" value="Modificar"><span class="icon-edit">Modificar</span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit" onclick =  "if(confirm('¿Esta seguro que desea eliminar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt7.php';"name="accion7" id="btn15" value="Eliminar"><span class="icon-trash">Eliminar</span></button>
	</td>
	</tr>
</table>
<br>
<table  class= "table1" border= 0 cellspacing="10" id="rescota8">

<tr><td colspan="3" align= "center"><legend align= "center" ><H2>OTROS DATOS DE INTERES</H2></legend></td></tr>
<tr>
	<td colspan="3" align= "center"><b>El Alumno es Católico:</b>&nbsp;<input type="text" name="catolico" size="1" id="catolico"></td>
	</tr>
	<tr>
	<td colspan="3" align= "center"><b>De ser afirmativa su respuesta indique, ha realizado:</b>&nbsp;<input type="text" name="sacramentos" size="15" id="sacramentos"></td>
	</tr>
    <tr><td colspan="3" align= "center"><font color= "red" ><H4>EN CASO DE EMERGENCIA LLAMAR A:</H4></font></td></tr>

	<tr>
	<td><b>Nombre y Apellido: </b>&nbsp;<input type="text" name="nombre_apellido_emerg" size="20" id="nombre_apellido_emerg"></td>
	<td><b>Teléfono:</b>&nbsp;<input type="text" name="telefono" size="10" id="telefono"></td>
	<td><b>Parentesco:</b>&nbsp;<input type="text" name="parentesco_otro" size="8" id="parentesco_otro"></td>
	</tr>	
	<tr>
	<td><b>Nombre y Apellido:</b>&nbsp;<input type="text" name="nombre_apellido_emerg2" size="20" id="nombre_apellido_emerg2"></td>
	<td><b>Teléfono:</b>&nbsp;<input type="text" name="telefono2" size="10" id="telefono2"></td>
	<td><b>Parentesco:</b>&nbsp;<input type="text" name="parentesco_otro2" size="8" id="parentesco_otro2"></td>
	</tr>
	<tr>
	<td  colspan="3" align= "center"><button type="submit" onclick =  "if(confirm('¿Esta seguro que desea modificar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt8.php';"name="accion8" id="btn16" value="Modificar"><span class="icon-edit">Modificar</span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit" onclick =  "if(confirm('¿Esta seguro que desea eliminar la Inscripción?') == false){return false;}; this.form.action = '../controlador/cnt8.php';"name="accion8" id="btn17" value="Eliminar"><span class="icon-trash">Eliminar</span></button>
	</td>
	</tr>
</table>
</center>
</form>
</div>

</html>
