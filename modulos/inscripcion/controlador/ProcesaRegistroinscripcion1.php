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
$ano_escolar=$_POST["ano_escolar"];
$fecha_inscripcion=$_POST["fecha_inscripcion"];
$grado_actual=$_POST["grado_actual"];
$seccion_actual=$_POST["seccion_actual"];
$grado_cursar=$_POST["grado_cursar"];
$repite=$_POST["repite"];

$Usuario = new AdministradorBd();

$cnn=$Usuario->conectaBd();
if (!$cnn) { // Si la Conexion  Falla
   $Usuario->controlError(1,$cnn);
   exit();
}	             
echo"'$cedula_estu', '$ano_escolar', '$fecha_inscripcion', '$grado_actual', '$seccion_actual', '$grado_cursar','$repite'";
$Consulta=$Usuario->ejecutaQuery("INSERT INTO pstab.inscripcion (cedula_estu, ano_escolar, fecha_inscripcion, grado_actual, seccion_actual, grado_cursar, repite) VALUES ('$cedula_estu', '$ano_escolar', '$fecha_inscripcion', '$grado_actual', '$seccion_actual', '$grado_cursar','$repite')"); //Ejecuta el Query en la Base de Datos
if (!$Consulta) { // Si No se Ejecuta el Query
    echo "<script type='text/javascript'> 
		alert('Error el Estudiante ya existe!');
        location='../vista/registrarinscripcion1.php'
        </script>";
   exit();
}else{
	header('Location: ../vista/registrarinscripcion2.php');

}	
$Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos		
?>
</form>
</body>
</html>

