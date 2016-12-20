<?php
session_start();
require_once("../modelo/modeloEstadisticas.php");
if (isset($_SESSION['cedula'])){  //Si el usuario inicio sesion correctamente
    $UsuarioActivo = $_SESSION['cedula'];  
    $NombreUsuarioActivo = $_SESSION['username'];
}
/*if($_SESSION['tipo_usuario'] != "Admin" && $_SESSION['tipo_usuario'] != "Basico")
{ 
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
} */
if ($_SESSION['tipo_usuario'] == "Admin") {
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="../vista/CSS/estiloEstadistica.css" rel="stylesheet" type "text/css"/>
	<link rel="stylesheet" type="text/css" href="../../recursos/iconos/style.css">
	<title>UEMAB-ControlEstadisticasMensuales</title>
</head>
<body>
		
		<header id="main-header">
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Estad&iacutesticas Inicial y B&aacutesica</span>
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
 				<li><a href="../../usuario/vista/ConsultarUsuarios.php"><span class="icon-users"></span>&nbspGesti&oacuten de Usuarios</a></li>
 				<li><a href="../../inscripcion/vista/inscripciones.php"><span class="icon-text-document"></span>&nbspInscripciones</a></li>
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstad&iacutesticas Inicial y B&aacutesica</a></li>
				<li><a href="../../comedor/vista/comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
			</ul>
		</div>

		<div id="menu_opciones">
 			<ul class="nav">
 				
 				<li><a href="../vista/registroEstadisticas.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Estad&iacutesticas</a></li>
 				<li><a href="../vista/consultaEstadistica.php"><span class="icon-print"></span>&nbsp&nbspConsultar Estad&iacutesticas</a></li>
 				
 				
 			</ul>
		</div>

<?php 

$grado=$_POST['grado'];
$seccion=$_POST['seccion'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];

$estadistica= new Estadisticas();

$cnn=$estadistica->conectaBD();
if (!$cnn) { // Si la Conexion  Falla
   $estadistica->mensajesError(1,$cnn);
   exit();
}	


//echo "$grado, $seccion, $mes, $ano";
//inicio tabla madre
echo "<table border=0 id=tabla_estadisticas width='40%' cellspacing='15px'>";
echo "<tr><td colspan='2'>";
$Consulta=$estadistica->ejecutaQuery("SELECT * FROM pstab.datos_estadisticos WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");

$Registro = $estadistica->enviaRegistro($Consulta);
	//echo $Registro;
			echo"<table border='1' align='auto' cellpadding='5' cellspacing='0' id='datos_esa' width='100%'>";
			echo "<tr bgcolor='#e2e2e2'><td colspan='3' align='center'><b>ESTAD&IacuteSTICA MENSUAL</b></h4></td></tr>";
					echo "<tr>";		   
					echo "<td align='center'><b>Mes:</b> ".$Registro["mes"]."</td>";
					echo "<td align='center'><b>Grado:</b>   ".$Registro["grado"]." </td>";
					echo "<td align='center'><b>Secci&oacuten:</b> ".$Registro["seccion"]."</td>";
					echo "</tr>"; 
					echo "<tr>";
					echo "<td align='center' colspan='2'><b>Docente:</b>".$Registro["docente"]."</td>";
					echo "<td align='center' ><b>Dias Habiles:</b>".$Registro["dias_habiles"]."</td>";
					//echo "<td align='center'><b>% de Asistencia:</b>  </td>";					
					echo "</tr>"; 					 
				echo "</table>";

echo"</td></tr>";
?>

<tr><td rowspan="30">

<table border="1" width="100%" >
		   <tr> <td colspan="4" align="center"><b>Asistencias</b></td></tr>
		   <tr bgcolor="#e2e2e2">
		     <td style='color: #000000; text-align:center;'>D&iacutea</td>
			 <td style='color: #000000; text-align:center;'>M</td>
			 <td style='color: #000000; text-align:center;'>F</td> 
			 <td style='color: #000000; text-align:center;'>T</td> 
<?php 

		$consulta2=$estadistica->ejecutaQuery("SELECT * FROM pstab.asistencia_estadistica WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano' ORDER BY dia asc");

		while($asist = $estadistica->recibeRegistro($consulta2)) { //Ciclo Repetitivo mientras no sea fin de Archivo, cuando se acaban los datos devuelve Falso
					echo "<tr >";		   
					echo "<td align='left' style='text-align:center'>".$asist["dia"]." </td>";
					echo "<td align='left' style='text-align:center'>".$asist["varones"]." </td>";
					if ($asist["varones"]) {
						$sumav+=$asist["varones"];
					}
					echo "<td align='left' style='text-align:center'>".$asist["hembras"]."</td>";
					if ($asist["hembras"]) {
						$sumah+=$asist["hembras"];
					} 
					$suma=$asist["varones"]+$asist["hembras"];
					if ($asist["varones"]+$asist["hembras"]) {
						$sumat+=$asist["varones"]+$asist["hembras"];
					}
					echo "<td align='left' style='text-align:center'><input type='text' size=1 name='totales' value='".$suma."' readonly></td>";			
					echo "</tr>";					
				}
				//echo $sumav;
				//echo $sumah;
				//echo $sumat;
				echo "<tr><td style='font-size=10px'><b>Total</b></td>";
				echo "<td>".$sumav."</td>";
				echo "<td>".$sumah."</td>";
				echo "<td>".$sumat."</td>";
				echo "</tr>";
				echo "<tr><td style='font-size=10px'><b>Prom</b></td>";
				$prov=$sumav/$Registro["dias_habiles"];
				echo "<td>".$prov."</td>";
				$proh=$sumah/$Registro["dias_habiles"];
				echo "<td>".$proh."</td>";
				$prot=$sumat/$Registro["dias_habiles"];
				echo "<td>".$prot."</td>";

				echo "</table>";
echo"</td>";
echo "<td>";

	$consulta3=$estadistica->ejecutaQuery("SELECT * FROM pstab.matricula WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");
	$matricula = $estadistica->enviaRegistro($consulta3);


	$total_primer_dia=$matricula['t_v_pm']+$matricula['t_h_pm'];
	$alum_matriculas_mes=$matricula['v_m_m']+$matricula['h_m_m'];
	$alumnos_retirados=$matricula['v_r_m']+$matricula['h_r_m'];

	echo"<table border='1' width='100%' id='maticula'>";
		  echo" <tr> <td  align='center'><b>Matricula</b></td><td align='center'>M</td><td align='center'>F</td><td align='center'>T</td></tr>";
		   echo"<tr >";
		   echo"<td style='color: #000000; text-align:left;'>Total de alumnos inscritos para el primer día del mes</td>";
		   
		   echo"<td>".$matricula['t_v_pm']."</td><td>".$matricula['t_h_pm']."</td><td>".$total_primer_dia."</td>";
		   echo"</tr>";
		   echo"<tr>";
		   echo"<td style='color: #000000; text-align:left;'>Alumnos matriculados en el mes</td>";
		   echo"<td>".$matricula['v_m_m']."</td><td>".$matricula['h_m_m']."</td><td>".$alum_matriculas_mes."</td>";
		   echo"</tr>";
		   echo"<tr>";
		   echo"<td style='color: #000000; text-align:left;'>Total</td>";

	//totales
		$total_varones=$matricula['t_v_pm']+$matricula['v_m_m'];
		$total_hembras=$matricula['t_h_pm']+$matricula['h_m_m'];
		$tt=$total_primer_dia+$alum_matriculas_mes;


		   echo"<td>".$total_varones."</td><td>".$total_hembras."</td><td>".$tt."</td>";
		   echo"</tr>";
		   echo"<tr>";
		   echo"<td style='color: #000000; text-align:left;'>Alumnos retirados en el mes</td>";
		   echo"<td>".$matricula['v_r_m']."</td><td>".$matricula['h_r_m']."</td><td>".$alumnos_retirados."</td>";
		   echo"</tr>";

	//alumnos retirados mes
		$varones_retirados=$total_varones-$matricula['v_r_m'];
		$hembras_retirados=$total_hembras-$matricula['h_r_m'];
		$ttr=$tt-$alumnos_retirados;

		   echo"<tr>";
		   echo"<td style='color: #000000; text-align:left;'>Alumnos matriculados para el día último del presente mes</td>";
		   echo"<td>".$varones_retirados."</td><td>".$hembras_retirados."</td><td>".$ttr."</td>";
		   echo"</tr>";
		   echo "</table>";
	
echo"</td>";
echo"</tr>";
?>
<tr><td>
		<table width="100%" border="1"  id="repitntes">
				<tr><td colspan="13" align="left"><b><h4>Repitientes por edad y sexo</h4></b></td></tr>
				<tr bgcolor="#e2e2e2">
					<td align="center">Edad</td><td align='center'>4</td>
												<td align='center'>5</td>
												<td align='center'>6</td>
												<td align='center'>7</td>
												<td align='center'>8</td>
												<td align='center'>9</td>
								 				<td align='center'>10</td>
								 				<td align='center'>11</td>
								 				<td align='center'>12</td>
								 				<td align='center'>13</td>
								 				<td align='center'>14</td>
								 				<td align='center'>15</td>
				</tr>
	<?php  
	$consulta4=$estadistica->ejecutaQuery("SELECT * FROM pstab.repitientes_edad_sexo WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");
	$repitientes = $estadistica->enviaRegistro($consulta4);
				echo"<tr>";
					echo"<td align='center'>M</td>";
					echo"<td><input type='text' name='cuatrov' size='2' value='".$repitientes['cuatrov']."' readonly></td>";
					echo"<td><input type='text' name='cincov' size='2' value='".$repitientes['cincov']."' readonly></td>";
					echo"<td><input type='text' name='seisv' size='2' value='".$repitientes['seisv']."' readonly></td>";
					echo"<td><input type='text' name='sietev' size='2' value='".$repitientes['sietev']."' readonly></td>";
					echo"<td><input type='text' name='ochov' size='2' value='".$repitientes['ochov']."' readonly></td>";
					echo"<td><input type='text' name='nuevev' size='2' value='".$repitientes['nuevev']."' readonly></td>";
					echo"<td><input type='text' name='diezv' size='2' value='".$repitientes['diezv']."' readonly></td>";
					echo"<td><input type='text' name='oncev' size='2' value='".$repitientes['oncev']."' readonly></td>";
					echo"<td><input type='text' name='docev' size='2' value='".$repitientes['docev']."' readonly></td>";
					echo"<td><input type='text' name='trecev' size='2' value='".$repitientes['trecev']."' readonly></td>";
					echo"<td><input type='text' name='catorcev' size='2' value='".$repitientes['catorcev']."' readonly></td>";
					echo"<td><input type='text' name='quincev' size='2' value='".$repitientes['quincev']."' readonly></td>";
				echo"</tr>";				
				echo"<tr>";
					echo"<td align='center'>F</td>";
					echo"<td><input type='text' name='cuatroh' size='2' value='".$repitientes['cuatroh']."' readonly></td>";
					echo"<td><input type='text' name='cincoh' size='2' value='".$repitientes['cincoh']."' readonly></td>";
					echo"<td><input type='text' name='seish' size='2' value='".$repitientes['seish']."' readonly></td>";
					echo"<td><input type='text' name='sieteh' size='2' value='".$repitientes['sieteh']."' readonly></td>";
					echo"<td><input type='text' name='ochoh' size='2' value='".$repitientes['ochoh']."' readonly></td>";
					echo"<td><input type='text' name='nueveh' size='2' value='".$repitientes['nueveh']."' readonly></td>";
					echo"<td><input type='text' name='diezh' size='2' value='".$repitientes['diezh']."' readonly></td>";
					echo"<td><input type='text' name='onceh' size='2' value='".$repitientes['onceh']."' readonly></td>";
					echo"<td><input type='text' name='doceh' size='2' value='".$repitientes['doceh']."' readonly></td>";
					echo"<td><input type='text' name='treceh' size='2' value='".$repitientes['treceh']."' readonly></td>";
					echo"<td><input type='text' name='catorceh' size='2' value='".$repitientes['catorceh']."' readonly></td>";
					echo"<td><input type='text' name='quinceh' size='2' value='".$repitientes['quinceh']."' readonly></td>";
				echo"</tr>";
				echo"</table>";
?>
</td></tr>
<tr><td>
	<table width="100%" border="1" >
				<tr><td colspan="13" align="left"><b><h4>Clasificaci&oacuten por edad y sexo</h4></b></td></tr>
				<tr bgcolor="#e2e2e2">
					<td align="center">Edad</td><td align='center'>4</td>
												<td align='center'>5</td>
												<td align='center'>6</td>
												<td align='center'>7</td>
												<td align='center'>8</td>
												<td align='center'>9</td>
								 				<td align='center'>10</td>
								 				<td align='center'>11</td>
								 				<td align='center'>12</td>
								 				<td align='center'>13</td>
								 				<td align='center'>14</td>
								 				<td align='center'>15</td>
				</tr>
	<?php  
	$consulta5=$estadistica->ejecutaQuery("SELECT * FROM pstab.clasificacion_edad_sexo WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");
	$clasificacion = $estadistica->enviaRegistro($consulta5);
				echo"<tr>";
					echo"<td align='center'>M</td>";
					echo"<td><input type='text' name='ccuatrov' size='2' value='".$clasificacion['ccuatrov']."' readonly></td>";
					echo"<td><input type='text' name='ccincov' size='2' value='".$clasificacion['ccincov']."' readonly></td>";
					echo"<td><input type='text' name='cseisv' size='2' value='".$clasificacion['cseisv']."' readonly></td>";
					echo"<td><input type='text' name='csietev' size='2' value='".$clasificacion['csietev']."' readonly></td>";
					echo"<td><input type='text' name='cochov' size='2' value='".$clasificacion['cochov']."' readonly></td>";
					echo"<td><input type='text' name='cnuevev' size='2' value='".$clasificacion['cnuevev']."' readonly></td>";
					echo"<td><input type='text' name='cdiezv' size='2' value='".$clasificacion['cdiezv']."' readonly></td>";
					echo"<td><input type='text' name='concev' size='2' value='".$clasificacion['concev']."' readonly></td>";
					echo"<td><input type='text' name='cdocev' size='2' value='".$clasificacion['cdocev']."' readonly></td>";
					echo"<td><input type='text' name='ctrecev' size='2' value='".$clasificacion['ctrecev']."' readonly></td>";
					echo"<td><input type='text' name='ccatorcev' size='2' value='".$clasificacion['ccatorcev']."' readonly></td>";
					echo"<td><input type='text' name='cquincev' size='2' value='".$clasificacion['cquincev']."' readonly></td>";
				echo"</tr>";				
				echo"<tr>";
					echo"<td align='center'>F</td>";
					echo"<td><input type='text' name='ccuatroh' size='2' value='".$clasificacion['ccuatroh']."' readonly></td>";
					echo"<td><input type='text' name='ccincoh' size='2' value='".$clasificacion['ccincoh']."' readonly></td>";
					echo"<td><input type='text' name='cseish' size='2' value='".$clasificacion['cseish']."' readonly></td>";
					echo"<td><input type='text' name='csieteh' size='2' value='".$clasificacion['csieteh']."' readonly></td>";
					echo"<td><input type='text' name='cochoh' size='2' value='".$clasificacion['cochoh']."' readonly></td>";
					echo"<td><input type='text' name='cnueveh' size='2' value='".$clasificacion['cnueveh']."' readonly></td>";
					echo"<td><input type='text' name='cdiezh' size='2' value='".$clasificacion['cdiezh']."' readonly></td>";
					echo"<td><input type='text' name='conceh' size='2' value='".$clasificacion['conceh']."' readonly></td>";
					echo"<td><input type='text' name='cdoceh' size='2' value='".$clasificacion['cdoceh']."' readonly></td>";
					echo"<td><input type='text' name='ctreceh' size='2' value='".$clasificacion['ctreceh']."' readonly></td>";
					echo"<td><input type='text' name='ccatorceh' size='2' value='".$clasificacion['ccatorceh']."' readonly></td>";
					echo"<td><input type='text' name='cquinceh' size='2' value='".$clasificacion['cquinceh']."' readonly></td>";
				echo"</tr>";
				echo"</table>";
?>
</td></tr>
<tr><td>

	<table name="ingresos" border="1" width="100%">
		<tr><td align="center" colspan="7"><b>INGRESOS</b></td></tr>
			<tr align="center" bgcolor="#e2e2e2"><td>Nombre y apellido</td><td>F.N</td><td>Lugar Nacimiento</td><td>Edad</td><td>Sexo</td><td>Fecha</td><td>Motivo</td></tr>

<?php  
$consulta6=$estadistica->ejecutaQuery("SELECT * FROM pstab.ingresos WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");

while($ingresos= $estadistica->recibeRegistro($consulta6)) { 
					echo "<tr >";		   
					echo "<td align='left'>".$ingresos["nombre_apellido_i"]."</td>";
					echo "<td align='left'>".$ingresos["f_n"]." </td>";
					echo "<td align='left'>".$ingresos["lugar_nacimiento_i"]."</td>"; 
					echo "<td align='center'>".$ingresos["edad"]."</td>";
					echo "<td align='center'>".$ingresos["sexo"]."</td>";
					echo "<td align='center'>".$ingresos["fecha"]."</td>";
					echo "<td align='center'>".$ingresos["motivo"]."</td>";		
					echo "</tr>"; 					
				} 
				echo "</table>";	
?>
</td></tr>
<tr><td>
<table name="egresos" border="1" width="100%">
		<tr><td align="center" colspan="7"><b>EGRESOS</b></td></tr>
			<tr align="center" bgcolor="#e2e2e2"><td>Nombre y apellido</td><td>F.N</td><td>Lugar Nacimiento</td><td>Edad</td><td>Sexo</td><td>Fecha</td><td>Motivo</td></tr>

<?php  
$consulta7=$estadistica->ejecutaQuery("SELECT * FROM pstab.egresos WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");

while($egresos= $estadistica->recibeRegistro($consulta7)) { 
					echo "<tr >";		   
					echo "<td align='left'>".$egresos["nombre_apellido_e"]."</td>";
					echo "<td align='left'>".$egresos["f_n_e"]." </td>";
					echo "<td align='left'>".$egresos["lugar_nacimiento_e"]."</td>"; 
					echo "<td align='center'>".$egresos["edad_e"]."</td>";
					echo "<td align='center'>".$egresos["sexo_e"]."</td>";
					echo "<td align='center'>".$egresos["fecha_e"]."</td>";
					echo "<td align='center'>".$egresos["motivo_e"]."</td>";		
					echo "</tr>"; 					
				} 
				echo "</table>";	
?>
</td></tr>
<?php
echo"<tr><td colspan='2' align='right'><span class='icon-print'></span><a style='text-decoration:none;'   href='reporteEstadistica.php?grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."&sumav=".$sumav."&sumah=".$sumah."&sumat=".$sumat."&prov=".$prov."&proh=".$proh."&prot=".$prot."&total_primer_dia=".$total_primer_dia."&alum_matriculas_mes=".$alum_matriculas_mes."&total_varones=".$total_varones."&total_hembras=".$total_hembras."&tt=".$tt."&alumnos_retirados=".$alumnos_retirados."&varones_retirados=".$varones_retirados."&hembras_retirados=".$hembras_retirados."&ttr=".$ttr."'>Imprimir</a></td></tr>";
?>
</table>
</body>
</html>

<?php 
}
elseif ($_SESSION['tipo_usuario'] == "Docente") {
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="../vista/CSS/estiloEstadistica2.css" rel="stylesheet" type "text/css"/>
	<link rel="stylesheet" type="text/css" href="../../recursos/iconos/style.css">
	<title>UEMAB-ControlEstadisticasMensuales</title>
</head>
<body>
		
		<header id="main-header">
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Estad&iacutesticas Inicial y B&aacutesica</span>
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
 			
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstad&iacutesticas Inicial y B&aacutesica</a></li>
				
			</ul>
		</div>

		<div id="menu_opciones">
 			<ul class="nav">
 				
 				<li><a href="../vista/registroEstadisticas.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Estad&iacutesticas</a></li>
 				<li><a href="../vista/consultaEstadistica.php"><span class="icon-print"></span>&nbsp&nbspConsultar Estad&iacutesticas</a></li>
 				
 				
 			</ul>
		</div>

<?php 

$grado=$_POST['grado'];
$seccion=$_POST['seccion'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];

$estadistica= new Estadisticas();

$cnn=$estadistica->conectaBD();
if (!$cnn) { // Si la Conexion  Falla
   $estadistica->mensajesError(1,$cnn);
   exit();
}	


//echo "$grado, $seccion, $mes, $ano";
//inicio tabla madre
echo "<table border=0 id=tabla_estadisticas width='40%' cellspacing='15px'>";
echo "<tr><td colspan='2'>";
$Consulta=$estadistica->ejecutaQuery("SELECT * FROM pstab.datos_estadisticos WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");

$Registro = $estadistica->enviaRegistro($Consulta);
	//echo $Registro;
			echo"<table border='1' align='auto' cellpadding='5' cellspacing='0' id='datos_esa' width='100%'>";
			echo "<tr bgcolor='#e2e2e2'><td colspan='3' align='center'><b>ESTAD&IacuteSTICA MENSUAL</b></h4></td></tr>";
					echo "<tr>";		   
					echo "<td align='center'><b>Mes:</b> ".$Registro["mes"]."</td>";
					echo "<td align='center'><b>Grado:</b>   ".$Registro["grado"]." </td>";
					echo "<td align='center'><b>Secci&oacuten:</b> ".$Registro["seccion"]."</td>";
					echo "</tr>"; 
					echo "<tr>";
					echo "<td align='center' colspan='2'><b>Docente:</b>".$Registro["docente"]."</td>";
					echo "<td align='center' ><b>Dias Habiles:</b>".$Registro["dias_habiles"]."</td>";
					//echo "<td align='center'><b>% de Asistencia:</b>  </td>";					
					echo "</tr>"; 					 
				echo "</table>";

echo"</td></tr>";
?>

<tr><td rowspan="30">

<table border="1" width="100%" >
		   <tr> <td colspan="4" align="center"><b>Asistencias</b></td></tr>
		   <tr bgcolor="#e2e2e2">
		     <td style='color: #000000; text-align:center;'>D&iacutea</td>
			 <td style='color: #000000; text-align:center;'>M</td>
			 <td style='color: #000000; text-align:center;'>F</td> 
			 <td style='color: #000000; text-align:center;'>T</td> 
<?php 

		$consulta2=$estadistica->ejecutaQuery("SELECT * FROM pstab.asistencia_estadistica WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano' ORDER BY dia asc");

		while($asist = $estadistica->recibeRegistro($consulta2)) { //Ciclo Repetitivo mientras no sea fin de Archivo, cuando se acaban los datos devuelve Falso
					echo "<tr >";		   
					echo "<td align='left' style='text-align:center'>".$asist["dia"]." </td>";
					echo "<td align='left' style='text-align:center'>".$asist["varones"]." </td>";
					if ($asist["varones"]) {
						$sumav+=$asist["varones"];
					}
					echo "<td align='left' style='text-align:center'>".$asist["hembras"]."</td>";
					if ($asist["hembras"]) {
						$sumah+=$asist["hembras"];
					} 
					$suma=$asist["varones"]+$asist["hembras"];
					if ($asist["varones"]+$asist["hembras"]) {
						$sumat+=$asist["varones"]+$asist["hembras"];
					}
					echo "<td align='left' style='text-align:center'><input type='text' size=1 name='totales' value='".$suma."' readonly></td>";			
					echo "</tr>";					
				}
				//echo $sumav;
				//echo $sumah;
				//echo $sumat;
				echo "<tr><td style='font-size=10px'><b>Total</b></td>";
				echo "<td>".$sumav."</td>";
				echo "<td>".$sumah."</td>";
				echo "<td>".$sumat."</td>";
				echo "</tr>";
				echo "<tr><td style='font-size=10px'><b>Prom</b></td>";
				$prov=$sumav/$Registro["dias_habiles"];
				echo "<td>".$prov."</td>";
				$proh=$sumah/$Registro["dias_habiles"];
				echo "<td>".$proh."</td>";
				$prot=$sumat/$Registro["dias_habiles"];
				echo "<td>".$prot."</td>";

				echo "</table>";
echo"</td>";
echo "<td>";

	$consulta3=$estadistica->ejecutaQuery("SELECT * FROM pstab.matricula WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");
	$matricula = $estadistica->enviaRegistro($consulta3);


	$total_primer_dia=$matricula['t_v_pm']+$matricula['t_h_pm'];
	$alum_matriculas_mes=$matricula['v_m_m']+$matricula['h_m_m'];
	$alumnos_retirados=$matricula['v_r_m']+$matricula['h_r_m'];

	echo"<table border='1' width='100%' id='maticula'>";
		  echo" <tr> <td  align='center'><b>Matricula</b></td><td align='center'>M</td><td align='center'>F</td><td align='center'>T</td></tr>";
		   echo"<tr >";
		   echo"<td style='color: #000000; text-align:left;'>Total de alumnos inscritos para el primer día del mes</td>";
		   
		   echo"<td>".$matricula['t_v_pm']."</td><td>".$matricula['t_h_pm']."</td><td>".$total_primer_dia."</td>";
		   echo"</tr>";
		   echo"<tr>";
		   echo"<td style='color: #000000; text-align:left;'>Alumnos matriculados en el mes</td>";
		   echo"<td>".$matricula['v_m_m']."</td><td>".$matricula['h_m_m']."</td><td>".$alum_matriculas_mes."</td>";
		   echo"</tr>";
		   echo"<tr>";
		   echo"<td style='color: #000000; text-align:left;'>Total</td>";

	//totales
		$total_varones=$matricula['t_v_pm']+$matricula['v_m_m'];
		$total_hembras=$matricula['t_h_pm']+$matricula['h_m_m'];
		$tt=$total_primer_dia+$alum_matriculas_mes;


		   echo"<td>".$total_varones."</td><td>".$total_hembras."</td><td>".$tt."</td>";
		   echo"</tr>";
		   echo"<tr>";
		   echo"<td style='color: #000000; text-align:left;'>Alumnos retirados en el mes</td>";
		   echo"<td>".$matricula['v_r_m']."</td><td>".$matricula['h_r_m']."</td><td>".$alumnos_retirados."</td>";
		   echo"</tr>";

	//alumnos retirados mes
		$varones_retirados=$total_varones-$matricula['v_r_m'];
		$hembras_retirados=$total_hembras-$matricula['h_r_m'];
		$ttr=$tt-$alumnos_retirados;

		   echo"<tr>";
		   echo"<td style='color: #000000; text-align:left;'>Alumnos matriculados para el día último del presente mes</td>";
		   echo"<td>".$varones_retirados."</td><td>".$hembras_retirados."</td><td>".$ttr."</td>";
		   echo"</tr>";
		   echo "</table>";
	
echo"</td>";
echo"</tr>";
?>
<tr><td>
		<table width="100%" border="1"  id="repitntes">
				<tr><td colspan="13" align="left"><b><h4>Repitientes por edad y sexo</h4></b></td></tr>
				<tr bgcolor="#e2e2e2">
					<td align="center">Edad</td><td align='center'>4</td>
												<td align='center'>5</td>
												<td align='center'>6</td>
												<td align='center'>7</td>
												<td align='center'>8</td>
												<td align='center'>9</td>
								 				<td align='center'>10</td>
								 				<td align='center'>11</td>
								 				<td align='center'>12</td>
								 				<td align='center'>13</td>
								 				<td align='center'>14</td>
								 				<td align='center'>15</td>
				</tr>
	<?php  
	$consulta4=$estadistica->ejecutaQuery("SELECT * FROM pstab.repitientes_edad_sexo WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");
	$repitientes = $estadistica->enviaRegistro($consulta4);
				echo"<tr>";
					echo"<td align='center'>M</td>";
					echo"<td><input type='text' name='cuatrov' size='2' value='".$repitientes['cuatrov']."' readonly></td>";
					echo"<td><input type='text' name='cincov' size='2' value='".$repitientes['cincov']."' readonly></td>";
					echo"<td><input type='text' name='seisv' size='2' value='".$repitientes['seisv']."' readonly></td>";
					echo"<td><input type='text' name='sietev' size='2' value='".$repitientes['sietev']."' readonly></td>";
					echo"<td><input type='text' name='ochov' size='2' value='".$repitientes['ochov']."' readonly></td>";
					echo"<td><input type='text' name='nuevev' size='2' value='".$repitientes['nuevev']."' readonly></td>";
					echo"<td><input type='text' name='diezv' size='2' value='".$repitientes['diezv']."' readonly></td>";
					echo"<td><input type='text' name='oncev' size='2' value='".$repitientes['oncev']."' readonly></td>";
					echo"<td><input type='text' name='docev' size='2' value='".$repitientes['docev']."' readonly></td>";
					echo"<td><input type='text' name='trecev' size='2' value='".$repitientes['trecev']."' readonly></td>";
					echo"<td><input type='text' name='catorcev' size='2' value='".$repitientes['catorcev']."' readonly></td>";
					echo"<td><input type='text' name='quincev' size='2' value='".$repitientes['quincev']."' readonly></td>";
				echo"</tr>";				
				echo"<tr>";
					echo"<td align='center'>F</td>";
					echo"<td><input type='text' name='cuatroh' size='2' value='".$repitientes['cuatroh']."' readonly></td>";
					echo"<td><input type='text' name='cincoh' size='2' value='".$repitientes['cincoh']."' readonly></td>";
					echo"<td><input type='text' name='seish' size='2' value='".$repitientes['seish']."' readonly></td>";
					echo"<td><input type='text' name='sieteh' size='2' value='".$repitientes['sieteh']."' readonly></td>";
					echo"<td><input type='text' name='ochoh' size='2' value='".$repitientes['ochoh']."' readonly></td>";
					echo"<td><input type='text' name='nueveh' size='2' value='".$repitientes['nueveh']."' readonly></td>";
					echo"<td><input type='text' name='diezh' size='2' value='".$repitientes['diezh']."' readonly></td>";
					echo"<td><input type='text' name='onceh' size='2' value='".$repitientes['onceh']."' readonly></td>";
					echo"<td><input type='text' name='doceh' size='2' value='".$repitientes['doceh']."' readonly></td>";
					echo"<td><input type='text' name='treceh' size='2' value='".$repitientes['treceh']."' readonly></td>";
					echo"<td><input type='text' name='catorceh' size='2' value='".$repitientes['catorceh']."' readonly></td>";
					echo"<td><input type='text' name='quinceh' size='2' value='".$repitientes['quinceh']."' readonly></td>";
				echo"</tr>";
				echo"</table>";
?>
</td></tr>
<tr><td>
	<table width="100%" border="1" >
				<tr><td colspan="13" align="left"><b><h4>Clasificaci&oacuten por edad y sexo</h4></b></td></tr>
				<tr bgcolor="#e2e2e2">
					<td align="center">Edad</td><td align='center'>4</td>
												<td align='center'>5</td>
												<td align='center'>6</td>
												<td align='center'>7</td>
												<td align='center'>8</td>
												<td align='center'>9</td>
								 				<td align='center'>10</td>
								 				<td align='center'>11</td>
								 				<td align='center'>12</td>
								 				<td align='center'>13</td>
								 				<td align='center'>14</td>
								 				<td align='center'>15</td>
				</tr>
	<?php  
	$consulta5=$estadistica->ejecutaQuery("SELECT * FROM pstab.clasificacion_edad_sexo WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");
	$clasificacion = $estadistica->enviaRegistro($consulta5);
				echo"<tr>";
					echo"<td align='center'>M</td>";
					echo"<td><input type='text' name='ccuatrov' size='2' value='".$clasificacion['ccuatrov']."' readonly></td>";
					echo"<td><input type='text' name='ccincov' size='2' value='".$clasificacion['ccincov']."' readonly></td>";
					echo"<td><input type='text' name='cseisv' size='2' value='".$clasificacion['cseisv']."' readonly></td>";
					echo"<td><input type='text' name='csietev' size='2' value='".$clasificacion['csietev']."' readonly></td>";
					echo"<td><input type='text' name='cochov' size='2' value='".$clasificacion['cochov']."' readonly></td>";
					echo"<td><input type='text' name='cnuevev' size='2' value='".$clasificacion['cnuevev']."' readonly></td>";
					echo"<td><input type='text' name='cdiezv' size='2' value='".$clasificacion['cdiezv']."' readonly></td>";
					echo"<td><input type='text' name='concev' size='2' value='".$clasificacion['concev']."' readonly></td>";
					echo"<td><input type='text' name='cdocev' size='2' value='".$clasificacion['cdocev']."' readonly></td>";
					echo"<td><input type='text' name='ctrecev' size='2' value='".$clasificacion['ctrecev']."' readonly></td>";
					echo"<td><input type='text' name='ccatorcev' size='2' value='".$clasificacion['ccatorcev']."' readonly></td>";
					echo"<td><input type='text' name='cquincev' size='2' value='".$clasificacion['cquincev']."' readonly></td>";
				echo"</tr>";				
				echo"<tr>";
					echo"<td align='center'>F</td>";
					echo"<td><input type='text' name='ccuatroh' size='2' value='".$clasificacion['ccuatroh']."' readonly></td>";
					echo"<td><input type='text' name='ccincoh' size='2' value='".$clasificacion['ccincoh']."' readonly></td>";
					echo"<td><input type='text' name='cseish' size='2' value='".$clasificacion['cseish']."' readonly></td>";
					echo"<td><input type='text' name='csieteh' size='2' value='".$clasificacion['csieteh']."' readonly></td>";
					echo"<td><input type='text' name='cochoh' size='2' value='".$clasificacion['cochoh']."' readonly></td>";
					echo"<td><input type='text' name='cnueveh' size='2' value='".$clasificacion['cnueveh']."' readonly></td>";
					echo"<td><input type='text' name='cdiezh' size='2' value='".$clasificacion['cdiezh']."' readonly></td>";
					echo"<td><input type='text' name='conceh' size='2' value='".$clasificacion['conceh']."' readonly></td>";
					echo"<td><input type='text' name='cdoceh' size='2' value='".$clasificacion['cdoceh']."' readonly></td>";
					echo"<td><input type='text' name='ctreceh' size='2' value='".$clasificacion['ctreceh']."' readonly></td>";
					echo"<td><input type='text' name='ccatorceh' size='2' value='".$clasificacion['ccatorceh']."' readonly></td>";
					echo"<td><input type='text' name='cquinceh' size='2' value='".$clasificacion['cquinceh']."' readonly></td>";
				echo"</tr>";
				echo"</table>";
?>
</td></tr>
<tr><td>

	<table name="ingresos" border="1" width="100%">
		<tr><td align="center" colspan="7"><b>INGRESOS</b></td></tr>
			<tr align="center" bgcolor="#e2e2e2"><td>Nombre y apellido</td><td>F.N</td><td>Lugar Nacimiento</td><td>Edad</td><td>Sexo</td><td>Fecha</td><td>Motivo</td></tr>

<?php  
$consulta6=$estadistica->ejecutaQuery("SELECT * FROM pstab.ingresos WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");

while($ingresos= $estadistica->recibeRegistro($consulta6)) { 
					echo "<tr >";		   
					echo "<td align='left'>".$ingresos["nombre_apellido_i"]."</td>";
					echo "<td align='left'>".$ingresos["f_n"]." </td>";
					echo "<td align='left'>".$ingresos["lugar_nacimiento_i"]."</td>"; 
					echo "<td align='center'>".$ingresos["edad"]."</td>";
					echo "<td align='center'>".$ingresos["sexo"]."</td>";
					echo "<td align='center'>".$ingresos["fecha"]."</td>";
					echo "<td align='center'>".$ingresos["motivo"]."</td>";		
					echo "</tr>"; 					
				} 
				echo "</table>";	
?>
</td></tr>
<tr><td>
<table name="egresos" border="1" width="100%">
		<tr><td align="center" colspan="7"><b>EGRESOS</b></td></tr>
			<tr align="center" bgcolor="#e2e2e2"><td>Nombre y apellido</td><td>F.N</td><td>Lugar Nacimiento</td><td>Edad</td><td>Sexo</td><td>Fecha</td><td>Motivo</td></tr>

<?php  
$consulta7=$estadistica->ejecutaQuery("SELECT * FROM pstab.egresos WHERE grado='$grado' and seccion='$seccion' and mes='$mes' and ano='$ano'");

while($egresos= $estadistica->recibeRegistro($consulta7)) { 
					echo "<tr >";		   
					echo "<td align='left'>".$egresos["nombre_apellido_e"]."</td>";
					echo "<td align='left'>".$egresos["f_n_e"]." </td>";
					echo "<td align='left'>".$egresos["lugar_nacimiento_e"]."</td>"; 
					echo "<td align='center'>".$egresos["edad_e"]."</td>";
					echo "<td align='center'>".$egresos["sexo_e"]."</td>";
					echo "<td align='center'>".$egresos["fecha_e"]."</td>";
					echo "<td align='center'>".$egresos["motivo_e"]."</td>";		
					echo "</tr>"; 					
				} 
				echo "</table>";	
?>
</td></tr>
<?php
echo"<tr><td colspan='2' align='right'><span class='icon-print'></span><a style='text-decoration:none;'   href='reporteEstadistica.php?grado=".$grado."&seccion=".$seccion."&mes=".$mes."&ano=".$ano."&sumav=".$sumav."&sumah=".$sumah."&sumat=".$sumat."&prov=".$prov."&proh=".$proh."&prot=".$prot."&total_primer_dia=".$total_primer_dia."&alum_matriculas_mes=".$alum_matriculas_mes."&total_varones=".$total_varones."&total_hembras=".$total_hembras."&tt=".$tt."&alumnos_retirados=".$alumnos_retirados."&varones_retirados=".$varones_retirados."&hembras_retirados=".$hembras_retirados."&ttr=".$ttr."'>Imprimir</a></td></tr>";
?>
</table>
</body>
</html>
<?php 
}
else{
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
        }
?>