<?php
session_start();
require_once("../modelo/modeloComedor.php");
if (isset($_SESSION['cedula'])){  // Si el usuario inicio sesion correctamente
    $IdUsuarioActivo = $_SESSION['cedula']; 
    $NombreUsuarioActivo = $_SESSION['username'];
}
if($_SESSION['tipo_usuario'] != "Admin")
{ 
	@session_start();
  	unset($_SESSION["cedula"]); 
  	unset($_SESSION["username"]);
  	session_destroy();
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
	echo "<script type='text/javascript'> 
			alert('No tiene permiso para ingresar!');
            location='../../../index.php'
            </script>"; 
} 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/estilo.css"  type="text/css">
<link rel="stylesheet" href="../../recursos/iconos/style.css">
<title> UEMAB-RegistroAsistenciaComedor</title>
</head>

<body>
<header id="main-header" >
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Comedor</span>
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
 				<li><a href="../../usuario/vista/ConsultarUsuarios.php"><span class="icon-users"></span>&nbspGesti&oacuten de Usuarios</a></li>
 				<li><a href=""><span class="icon-text-document"></span>&nbspInscripciones</a></li>
 				<!-- <li><a href="../../estadisticas/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Media</a></li> -->
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Inicial/B&aacutesica</a></li>
				<li><a href="comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
				
			</ul>
		</div>

		<div id="menu_opciones" >
 			<ul class="nav">
 				
 				<li><a href="RegistrarEstudianteComedor.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Estudiante</a></li>
 				<li><a href="ConsultarEstudiantesComedor.php"><span class="icon-list"></span>&nbsp&nbspLista Estudiantes Comedor</a></li>
 				<li><a href=""><span class="icon-edit"></span>&nbsp&nbspRegistrar Asistencia</a></li>
 				<!-- <li><a href=""><span class="icon-remove-user"></span>&nbsp&nbspEliminar Usuario</a></li> -->
 				<li><a href="ConsultarAsistencia.php"><span class="icon-magnifying-glass"></span>&nbsp&nbspConsultar Asistencia</a></li>
 				
 			</ul>
		</div>

<body>

<form action="../controlador/procesarAsistencia.php" method="POST" onSubmit="return campos_2(this);">
<table width="50%" border="1" align="center" cellpadding="0px" cellspacing="10px" bordercolor="#e2e2e2" id="ocultar2">
		   <br>
		   	<tr><td colspan="4" ><h3><center>Registro de asistencia al comedor</center></h3></td>
		   	<td align="center"><b>Fecha</b> <input type="text" name="fecha" id="fecha" value="<?php 
		   	date_default_timezone_set('EST5EDT');
		   	echo date('d-m-o') ?>" size="9">  dd-mm-aa</td>
		   	</tr>
		   	<tr bgcolor="#e2e2e2">
		     <td style='color: #000000; text-align:center;'>Cedula</td>
			 <td style='color: #000000; text-align:center;'>Nombre </td>
			 <td style='color: #000000; text-align:center;'>Apellido</td> 
			 <td style='color: #000000; text-align:center;'>Grado</td> 
			 <td style='color: #000000; text-align:center;'>Asistencia</td>
			 <!-- <td style='color: #000000; text-align:center;'>Fecha</td> -->
		  </tr>
		   <?php 		  
		   $Usuario = new Comedor();
            $i=0;
			$cnn=$Usuario->conectaBD();
			if (!$cnn) { // Si la Conexion  Falla
			   $Usuario->controlError(1,$cnn);
			   exit();
			}	             

			$Consulta= $Usuario->ejecutaQuery("SELECT * from pstab.lista_comedor where estado='Activo' ORDER BY grado asc"); //Ejecuta el Query en la Base de Datos
			if (!$Consulta) {
			   $Usuario->controlError(2,$cnn);
			   exit();
			}
			
			// $Registro = $Usuario->recibeRegistro($Consulta);
			// $cedula_estu_com=$Registro['cedula_estu_com'];
			
			// $query= $Usuario->ejecutaQuery("SELECT * from pstab.asistencia_comedor where cedula_estu_com='$cedula_estu_com'"); //Ejecuta el Query en la Base de Datos
			// if (!$query) {
			//    $Usuario->controlError(2,$cnn);
			//    exit();
			// }

			$CantidadRegistros=$Usuario->cuentaRegistro($Consulta);
			
			if ( $CantidadRegistros> 0){ // Si Hay por lo menos un Registro
    			while($Registro = $Usuario->recibeRegistro($Consulta)) { //Ciclo Repetitivo mientras no sea fin de Archivo, cuando se acaban los datos devuelve Falso
    			$i=$i+1;
					echo "<tr bgcolor='#fcfcfc'>";		   
					echo "<td align='center'>".$Registro["cedula_estu_com"]."</td>";
					echo "<td align='center'>".$Registro["nombre"]."</td>";
					echo "<td align='center' > ".$Registro["apellido"]."</td>"; 
					echo "<td align='center'>".$Registro["grado"]."</td>";	
					echo "<td align='center'>Si&nbsp<input type='checkbox' name='cedulas_estu_com[$i]' value='".$Registro["cedula_estu_com"]."'>&nbsp&nbsp&nbspNo&nbsp<input type='checkbox' name='cedulas_estu_com_no[$i]' value='".$Registro["cedula_estu_com"]."'></td>";			
					echo "</tr>"; 					
				} 
				echo"<tr><td colspan='5' align='right'><input type='submit' name='Guardar' value='Guardar'></td></tr>";
				echo "<tr><td  colspan='5' style='color: #000000; font-weight: bold; ' align='right'> Total de Estudiantes Registrados : $CantidadRegistros</tr></td>";
				
				echo "</table><br>";
				echo"</form>";
					
			}else{
			    echo "No se encontraron alumnos del comedor";
	        }

		    $Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos
		   ?>    

		
  
</table>
</body>
</html>
</body>
</html>
