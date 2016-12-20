<?php
// Crea Sesion
session_start();
// Incluye el php que se conecta a la base de datos
require_once("../modelo/modeloUsuarios.php");



//Redirecciona a otra pagina dentro del directorio de ejecucion
function redireccionar($url){ 
	ob_start();   // Se utiliza para solucionar el error de  headers already sent 
	$host=$_SERVER['HTTP_HOST'];  //Devuelve la direccion web
	//echo "Host: ".$host."<br>";
	$uri=rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); //Devuelve el Directorio desde donde se esta ejecutando la pagina que invoca la funcion.
	//echo "Uri: ".$uri."<br>";
	header("Location: http://$host$uri/$url"); //Redirecciona a la Pagina Solicitada
	ob_flush();  // Se utiliza para solucionar el error de  headers already sent 
}

$username=$_POST["username"];
$clave=$_POST["clave"]; 


$Usuario = new Usuario();
$cnn=$Usuario->conectaBd();
if (!$cnn) { 
   $Usuario->mensajesError(1,$cnn);
   exit();
}	             

$Consulta=$Usuario->ejecutaQuery("SELECT cedula, nombre, apellido, tipo_usuario, username, estado  FROM pstab.usuario WHERE username='$username' and clave='$clave' and estado='Activo'"); //Ejecuta el Query en la Base de Datos
if (!$Consulta) {
   $Usuario->mensajesError(2,$cnn);

   exit();
}


$Registro = $Usuario->recibeRegistro($Consulta);

// $estado=$Registro['estado'];
$tipo_usuario=$Registro['tipo_usuario'];

// invoca el método contar registros
if ($Usuario->cuentaRegistro($Consulta) > 0){ 	
	
	// Crea variables de sesion con la consulta para conservar nombre de usuario y el idusuario entre paginas
	$_SESSION["tipo_usuario"]= $Registro['tipo_usuario'];
	$_SESSION['cedula']=$Registro['cedula'];
    $_SESSION['username']=$Registro['username']; 
    $_SESSION['nombreApellido']=$Registro['nombre']." ".$Registro['apellido'];  

    redireccionar ("../../pagina_principal/vista_administrador/panel_administrador.php");	

  }
else {
	
		echo "<script type='text/javascript'> 
				alert('Usuario o contraseña incorrecta, Verifique los datos por favor!');
               location='../../../index.php'
                </script>";

 //    echo("Usuario/contraseña incorrecta o inactivo, Verifique los datos por favor!");
	// echo "<p><a href='../../../index.php'>Click para volver</a></p>";
   }

$Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos		   
?>