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
$vive_con=$_POST["vive_con"];
$beca=$_POST["beca"];
$medio_traslado_plantel=$_POST["medio_traslado_plantel"];
$se_retira_solo_plantel=$_POST["se_retira_solo_plantel"];
$n_hermanos=$_POST["n_hermanos"];
$datos_vivienda=$_POST["datos_vivienda"];
$otros_vive=$_POST["otros_vive"];
$especifique_beca=$_POST["especifique_beca"];
$otros_ruta=$_POST["otros_ruta"];
$hermanos_en_plantel=$_POST["hermanos_en_plantel"];
$especifique_grado_hermano=$_POST["especifique_grado_hermano"];
$otros_datos_vivienda=$_POST["otros_datos_vivienda"];
$Usuario = new AdministradorBd();

$cnn=$Usuario->conectaBd();
if (!$cnn) { // Si la Conexion  Falla
   $Usuario->controlError(1,$cnn);
   exit();
}	             
echo"'$cedula_estu','$vive_con', '$beca', '$medio_traslado_plantel', '$se_retira_solo_plantel','$n_hermanos','$datos_vivienda','$otros_vive', '$especifique_beca', '$otros_ruta', '$hermanos_en_plantel','$especifique_grado_hermano' ,'$otros_datos_vivienda'";
$Consulta=$Usuario->ejecutaQuery("INSERT INTO pstab.datos_socio_eco (cedula_estu, vive_con, beca, medio_traslado_plantel, se_retira_solo_plantel, n_hermanos, datos_vivienda, otros_vive, especifique_beca, otros_ruta, hermanos_en_plantel, especifique_grado_hermano, otros_datos_vivienda) VALUES ('$cedula_estu','$vive_con', '$beca', '$medio_traslado_plantel', '$se_retira_solo_plantel','$n_hermanos','$datos_vivienda','$otros_vive', '$especifique_beca', '$otros_ruta', '$hermanos_en_plantel','$especifique_grado_hermano' ,'$otros_datos_vivienda')"); //Ejecuta el Query en la Base de Datos
if (!$Consulta) { // Si No se Ejecuta el Query
       echo "<script type='text/javascript'> 
		alert('Error el Estudiante ya existe!');
        location='../vista/registrarinscripcion6.php'
        </script>";
   exit();
}else{
			header('Location: ../vista/registrarinscripcion7.php');

}	
$Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos		
?>
</form>
</body>
</html>
