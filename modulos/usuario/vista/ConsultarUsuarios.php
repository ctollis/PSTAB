<!DOCTYPE html>

<?php
session_start();
require_once("../modelo/modeloUsuarios.php");
if (isset($_SESSION['cedula'])){  // Si el usuario inicio sesion correctamente//
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


<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/estilo.css"  type "text/css">
	<link rel="stylesheet" href="../../recursos/iconos/style.css">
	<script type="text/javascript"  href="js/activarUsuarios.js"></script>
<title>UEMAB-Consultar Usuarios </title>

</head>
<body>
	
		<header id="main-header">
		
		<a id="logo-header" >
		<img src="../../recursos/logo_colegio.png" id="logo_colegio">
			<span class="nombre_sitio">U.E.M Andr&eacutes Bello</span>
			<span class="nombre_seccion">Gesti&oacuten de Usuarios</span>
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
 				<li><a href="ConsultarUsuarios.php"><span class="icon-users"></span>&nbspGesti&oacuten de Usuarios</a></li>
 				<li><a href="../../inscripcion/vista/inscripciones.php"><span class="icon-text-document"></span>&nbspInscripciones</a></li>
 				<!-- <li><a href=""><span class="icon-bar-graph"></span>&nbspEstadisticas Media</a></li> -->
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Inicial y B&aacutesica</a></li>
				<li><a href="../../comedor/vista/comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
			</ul>
		</div>

		<div id="menu_opciones" >
 			<ul class="nav">
 				
 				<li><a href="RegistrarUsuario.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Usuarios</a></li>
 				<!-- <li><a href=""><span class="icon-edit"></span>&nbsp&nbspModificar Usuario</a></li> -->
 				<!-- <li><a href=""><span class="icon-remove-user"></span>&nbsp&nbspEliminar Usuario</a></li> -->
 				<li><a href="../controlador/reporteUsuario.php"><span class="icon-print"></span>&nbsp&nbspReporte de Usuarios</a></li>
 				
 			</ul>
		</div>
		<table border="1" align="auto" cellpadding="5" cellspacing="0" id="tabla-c-u">
		
		   <br>
		   <tr> <td colspan="5" align="center"><span class="icon-user"></span>&nbspUSUARIOS ACTIVOS</td></tr>
		   <tr bgcolor="#e2e2e2">
		     <td style='color: #000000; text-align:center;'>Apellidos y Nombre</td>
			 <td style='color: #000000; text-align:center;'>Nombre Usuario</td>
			 <td style='color: #000000; text-align:center;'>Contrase&ntildea</td> 
			 <td style='color: #000000; text-align:center;'>Tipo de usuario</td> 
			 <td style='color: #000000; text-align:center;'></td> 
		  </tr>
		<?php 		  
		   $Usuario = new Usuario();

			$cnn=$Usuario->conectaBd();
			if (!$cnn) { // Si la Conexion  Falla
			   $Usuario->mensajesError(1,$cnn);
			   exit();
			}	             

			$Consulta= $Usuario->ejecutaQuery("SELECT * from pstab.usuario WHERE estado='Activo' ORDER BY Apellido asc"); //Ejecuta el Query en la Base de Datos
			if (!$Consulta) {
			   $Usuario->mensajesError(2,$cnn);
			   exit();
			}
			
			$CantidadRegistros=$Usuario->cuentaRegistro($Consulta);
			
			if ( $CantidadRegistros> 0){ // Si Hay por lo menos un Registro
    			   
				while($Registro = $Usuario->recibeRegistro($Consulta)) { //Ciclo Repetitivo mientras no sea fin de Archivo, cuando se acaban los datos devuelve Falso
					echo "<tr >";		   
					echo "<td align='left'>".$Registro["apellido"]." ".$Registro["nombre"]."</td>";
					echo "<td align='left'>".$Registro["username"]." </td>";
					echo "<td align='left'>".$Registro["clave"]."</td>"; 
					echo "<td align='center'>".$Registro["tipo_usuario"]."</td>";
					echo "<td align='center'>"."<a id='editar' href='ModificarUsuario.php?cedula=".$Registro["cedula"]."'><span class='icon-edit'>&nbspEditar</span></a></td>";					
					echo "</tr>"; 					
				} 
				echo "<tr>";
				echo "<td><br><br><p aling='center'>Total Usuarios Activos = $CantidadRegistros</td>";
				echo"</tr>";
			}
			else{
			    echo "<tr><td>No existen usuarios Activos!</td></tr>";
			    echo "</table>";
			   
	        }


		?> 

		   
		   <table  border="1" align="auto" cellpadding="5" cellspacing="0" id="tabla-c-u" >
		   <br>
		   <tr> <td colspan="5" align="center"><span class="icon-user"></span>&nbspUSUARIOS INACTIVOS</td></tr>
		   <tr bgcolor="#e2e2e2">
		     <td style='color: #000000; text-align:center;'>Apellidos y Nombre</td>
			 <td style='color: #000000; text-align:center;'>Nombre Usuario</td>
			 <td style='color: #000000; text-align:center;'>Contrase&ntildea</td> 
			 <td style='color: #000000; text-align:center;'>Tipo de usuario</td> 
			 <td style='color: #000000; text-align:center;'>Estado Usuario</td> 
		  </tr>
		<?php 		  
		   $Usuario = new Usuario();

			$cnn=$Usuario->conectaBd();
			if (!$cnn) { // Si la Conexion  Falla
			   $Usuario->mensajesError(1,$cnn);
			   exit();
			}	             

			$Consulta= $Usuario->ejecutaQuery("SELECT * from pstab.usuario WHERE estado='Inactivo'"); 
			if (!$Consulta) {
			   $Usuario->mensajesError(2,$cnn);
			   exit();
			}
			
			$CantidadRegistros=$Usuario->cuentaRegistro($Consulta);
			
			if ( $CantidadRegistros> 0){  
    			   
				while($Registro = $Usuario->recibeRegistro($Consulta)) { 
					echo "<tr >";		   
					echo "<td align='left'>".$Registro["apellido"]." ".$Registro["nombre"]."</td>";
					echo "<td align='left'>".$Registro["username"]."</td>";
					echo "<td align='left'>".$Registro["clave"]."</td>"; 
					echo "<td align='center'>".$Registro["tipo_usuario"]."</td>";

					$cedula=$Registro["cedula"];


					//echo "<div 	id='$cedula' value='$cedula'></div>";
					//echo "<td aling='center'><button value='activarUsuario' name='activarUsuario' onclick='activarUsuario(document.getElementById('$cedula').value)')>Activar</button>";
					//echo "<tr><td><span id='resultado'></span></td></tr>";

					echo "<td align='center'>"."<a id='editar' href='../controlador/activarUsuario.php?cedula=".$Registro["cedula"]."'><span class='icon-power-plug'>&nbspActivar</span></a></td>";					
					echo "</tr>"; 					
				} 				
				echo "<td><br><br><p aling='center'>Total Usuarios Inactivos = $CantidadRegistros</td>";
				echo"</tr>";
			}else{
			    echo "<tr><td>No existen usuarios Inactivos!</td></tr>";
			    echo "</table><br>";
	        }

	        
		    $Usuario->cierraConexionBd($cnn); 
		?> 
		</td>
      </tr>	  


</body>
</html>