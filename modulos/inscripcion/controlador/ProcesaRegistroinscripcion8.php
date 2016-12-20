<?php

session_start();
require_once("../modelo/modeloinscripciones.php");

?>
<html>
<head>
<title>Procesa Formulario</title>
</head>
<body>
<?php
$cedula_estu=$_POST["cedula_estu"];
$catolico=$_POST["catolico"];
$sacramentos=$_POST["sacramentos"];
$nombre_apellido_emerg=$_POST["nombre_apellido_emerg"];
$parentesco_otro=$_POST["parentesco_otro"];
$telefono=$_POST["telefono"];
$nombre_apellido_emerg2=$_POST["nombre_apellido_emerg2"];
$parentesco_otro2=$_POST["parentesco_otro2"];
$telefono2=$_POST["telefono2"];
$Usuario = new AdministradorBd();

$cnn=$Usuario->conectaBd();
if (!$cnn) { // Si la Conexion  Falla
   $Usuario->controlError(1,$cnn);
   exit();
}	             
echo"'$cedula_estu','$catolico', '$sacramentos', '$nombre_apellido_emerg', '$parentesco_otro','$telefono','$nombre_apellido_emerg2','$parentesco_otro2', '$telefono2'";
$Consulta=$Usuario->ejecutaQuery("INSERT INTO pstab.otros_datos(cedula_estu, catolico, sacramentos, nombre_apellido_emerg, parentesco_otro, telefono, nombre_apellido_emerg2, parentesco_otro2, telefono2 ) VALUES ('$cedula_estu','$catolico', '$sacramentos', '$nombre_apellido_emerg', '$parentesco_otro','$telefono','$nombre_apellido_emerg2','$parentesco_otro2', '$telefono2')"); //Ejecuta el Query en la Base de Datos
if (!$Consulta) { // Si No se Ejecuta el Query
         echo "<script type='text/javascript'> 
		alert('Error el Estudiante ya existe!');
        location='../vista/registrarinscripcion8.php'
        </script>";
   exit();
}else{
		header('Location: ../vista/inscripciones.php');

}	
$Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos		
?>
</form>
</body>
</html>
