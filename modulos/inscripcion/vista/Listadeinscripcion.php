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




	<title>UEMAB- lista de Estudiantes</title>
</head>
<body >
		
		<header id="main-header" >
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">lista de Estudiantes</span>	
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
		<br><br><br>
<body>
<center>
<div class="list_estu">
<table width="50%" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#e2e2e2" id="lista">
		   <br>
		   	<tr><td colspan="5" ><h3><center>Lista de Estudiantes</center></h3></td></tr>
		     <tr bgcolor="#e2e2e2">
		     <td style='color: #000000; text-align:center;'>Cédula del Estudiante</td>
			 <td style='color: #000000; text-align:center;'>Nombres</td>
			 <td style='color: #000000; text-align:center;'>Apellidos</td> 
			 <td style='color: #000000; text-align:center;'>Grado Actual</td> 
			  <td style='color: #000000; text-align:center;'>Sección Actual</td> 

			 <td style='color: #000000; text-align:center;'></td>
			 <!-- <td style='color: #000000; text-align:center;'>Fecha</td> -->
		  </tr>
 <?php 		  
		   $Usuario = new AdministradorBd();

			$cnn=$Usuario->conectaBd();
			if (!$cnn) { // Si la Conexion  Falla
			   $Usuario->controlError(1,$cnn);
			   exit();
			}	             

			$Consulta= $Usuario->ejecutaQuery("SELECT pstab.inscripcion.cedula_estu, pstab.estudiante.nombre, pstab.estudiante.apellido, pstab.inscripcion.grado_actual, pstab.inscripcion.seccion_actual FROM pstab.inscripcion join pstab.estudiante on inscripcion.cedula_estu=estudiante.cedula_estu"); //Ejecuta el Query en la Base de Datos


			if (!$Consulta) {
			   $Usuario->controlError(2,$cnn);
			   exit();
			}
			
			$CantidadRegistros=$Usuario->cuentaRegistro($Consulta);
			
			if ( $CantidadRegistros> 0){ // Si Hay por lo menos un Registro
    			   
				while($Registro = $Usuario->obtieneRegistro($Consulta)) { //Ciclo Repetitivo mientras no sea fin de Archivo, cuando se acaban los datos devuelve Falso
					echo "<tr bgcolor='#fcfcfc'>";	
                    echo "<td align='center'>".$Registro["cedula_estu"]."</td>"; 
					echo "<td align='center'>".$Registro["nombre"]."</td>";
					echo "<td align='center'>".$Registro["apellido"]."</td>";
					echo "<td align='center'>".$Registro["grado_actual"]."</td>";	
					echo "<td align='center'>".$Registro["seccion_actual"]."</td>";
                    echo "</tr>";					
				} 
				echo "<br>";
				echo "<tr>";
				echo "<td  colspan='5' style='color: #000000; font-weight: bold; ' align='right'> Total de Estudiantes Registrados : $CantidadRegistros</td>";
				echo "</tr>";
		
				echo "</table><br>";	
			}else{
			    echo "No se encontraron alumnos del comedor";
	        }
		    $Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos
			
			
		   ?> 
		</td>
      </tr>	  



</body>
</html>