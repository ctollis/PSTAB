<?php
session_start();
require_once("../modelo/modeloUsuarios.php");


if (isset($_SESSION['cedula'])){  
    $UsuarioActivo = $_SESSION['cedula']; 
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
<link rel="stylesheet" href="CSS/estilo.css"  type "text/css">
<link rel="stylesheet" href="../../recursos/iconos/style.css">
<title>Editar Usuario</title>
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
				<li><a href="../../estadisticas_inicial_basica/vista/estadisticas.php"><span class="icon-bar-graph"></span>&nbspEstadisticas Inicial/B&aacutesica</a></li>
				<li><a href="../../comedor/vista/comedor.php"><span class="icon-new-message"></span>&nbspComedor</a></li>
			</ul>
		</div>

		<div id="menu_opciones" >
 			<ul class="nav">
 				
 				<li><a href="RegistrarUsuario.php"><span class="icon-add-user"></span>&nbsp&nbspRegistrar Usuarios</a></li>
 				<!-- <li><a href=""><span class="icon-edit"></span>&nbsp&nbspModificar Usuario</a></li> -->
 				<!-- <li><a href=""><span class="icon-remove-user"></span>&nbsp&nbspEliminar Usuario</a></li> -->
 				<li><a href=""><span class="icon-print"></span>&nbsp&nbspReporte de Usuarios</a></li>
 				
 			</ul>
		</div>
		
		
<?php 	
    // Captura la variable enviada por URL	  
    $cedula=$_GET['cedula'];
		
	$Usuario = new Usuario();

	$cnn=$Usuario->conectaBd();
	if (!$cnn) { // Si la Conexion  Falla
	   $Usuario->mensajesError(1,$cnn);
	   exit();
	}	             
	
	$Consulta= $Usuario->ejecutaQuery("SELECT * from pstab.usuario WHERE cedula='$cedula'"); //Ejecuta el Query en la Base de Datos
	if (!$Consulta) {
	   $Usuario->mensajesError(2,$cnn);
	   exit();
	}

	
			
	// Se obtiene el registro del usuario a editar en el arreglo asociativo para usar los valores para llenar el formulario
	$Registro = $Usuario->recibeRegistro($Consulta);

?>
	<form method="POST" action="../controlador/ActualizarUsuario.php"> 
	

	<table width="50%" border=0  cellpadding="5" cellspacing="0" align="center" class="tabla_editar">
	<tr><td colspan="2"><h3>Modificar o Eliminar usuarios</h3></td></tr>
	<tr>
	<td>Nombre:</td><td><input type="text" class="form-control" size="12" maxlength="20" name="nombre" value="<?php echo $Registro['nombre'];?>"></td> 
	</tr>
	<tr>
	<td>Apellido:</td><td><input type="text" class="form-control"  size="12" maxlength="20" name="apellido" value="<?php echo $Registro['apellido'];?>"></td>
	</tr> 
	<tr>
	<td>Nombre de Usuario:</td><td><input type="text" class="form-control" size="12" maxlength="20" name="username" value="<?php echo $Registro['username'];?>" ></td><td><span class="icon-warning"> No puede ser modificado</span></td>
	</tr>
	<tr>
	<td>Contraseña:</td><td><input type="text" class="form-control" size="12" maxlength="20" name="clave" value="<?php echo $Registro['clave'];?>"></td>
	</tr>
	<tr>
	<td>Cedula</td><td><input type="text" class="form-control" size="12" maxlength="20" name="cedula" value="<?php echo $Registro['cedula'];?>"> </td><td><span class="icon-warning"> No puede ser modificado</span></td>
	</tr>
	<tr>
	<td>Tipo de Usuario:</td>
	<td>
	<select name="tipo_usuario" class="form-control">
	   <?php 
	      if($Registro['tipo_usuario']=='Basico'){
            echo "<option value='Basico' selected>B&aacutesico</option>"; 
		  }else{
		    echo "<option value='Docente'>Docente</option>";
          }	
          if($Registro['tipo_usuario']=='Admin'){
            echo "<option value='Admin' selected>Administrador</option>";
		  }else{
		    echo "<option value='Admin'>Administrador</option>";
          }		  		  
	   ?>	   
	</select>
	</td>
	</tr>
	<tr ><br>
	<td align="center"><br><span class="icon-edit"></span><input type="submit" value="Modificar" name="Modificar" onClick="return confirm('Esta seguro que desea modificar el usuario?')"></td>
	<td align="center"><br><span class="icon-trash"></span><input type="submit" value="Eliminar" name="Eliminar" onClick="return confirm('Esta seguro que desea eliminar el usuario?')"></td>
	</tr>
	<tr><td><br><a style=' text-decoration:none; color: #000;' href='ConsultarUsuarios.php'><span class="icon-arrow-left"></span>&nbspVolver</a></td></tr>
	</table>
	</fieldset>
	</form> 
	
</body>
</html>