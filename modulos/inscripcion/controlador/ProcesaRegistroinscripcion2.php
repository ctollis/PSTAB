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
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$edad=$_POST["edad"];
$ano=$_POST["ano"];
$lugar_nac=$_POST["lugar_nac"];
$estado=$_POST["estado"];
$municipio=$_POST["municipio"];
$nacionalidad=$_POST["nacionalidad"];
$pais_nac=$_POST["pais_nac"];
$sexo=$_POST["sexo"];
$estado_actu=$_POST["estado_actu"];
$municipio_actu=$_POST["municipio_actu"];
$urb_sector=$_POST["urb_sector"];
$calle=$_POST["calle"];
$casa_edif=$_POST["casa_edif"];
$piso=$_POST["piso"];
$apto=$_POST["apto"];
$pto_referencia=$_POST["pto_referencia"];
$representante=$_POST["representante"];
$parentesco=$_POST["parentesco"];
$fecha_nacimiento=$_POST["fecha_nacimiento"];
$Usuario = new AdministradorBd();

$cnn=$Usuario->conectaBd();
if (!$cnn) { // Si la Conexion  Falla
   $Usuario->controlError(1,$cnn);
   exit();
}	             

echo"'$cedula_estu','$nombre', '$apellido', '$edad', '$ano', '$lugar_nac','$estado', '$municipio','$nacionalidad', '$pais_nac', '$sexo', '$estado_actu', '$municipio_actu','$urb_sector', '$calle', '$casa_edif', '$piso', '$apto', '$pto_referencia', '$representante', '$parentesco','$fecha_nacimiento'";
$Consulta=$Usuario->ejecutaQuery("INSERT INTO pstab.estudiante (cedula_estu, nombre, apellido, edad, ano, lugar_nac, estado, municipio, nacionalidad, pais_nac, sexo, estado_actu, municipio_actu, urb_sector, calle, casa_edif, piso, apto, pto_referencia, representante, parentesco, fecha_nacimiento) VALUES ('$cedula_estu','$nombre', '$apellido','$edad','$ano', '$lugar_nac', '$estado', '$municipio', '$nacionalidad', '$pais_nac', '$sexo', '$estado_actu', '$municipio_actu', '$urb_sector', '$calle', '$casa_edif', '$piso', '$apto', '$pto_referencia', '$representante', '$parentesco', '$fecha_nacimiento')"); //Ejecuta el Query en la Base de Datos
if (!$Consulta) { // Si No se Ejecuta el Query
   echo "<script type='text/javascript'> 
		alert('Error el Estudiante ya existe!');
        location='../vista/registrarinscripcion2.php'
        </script>";
   exit();
}else{
	header('Location: ../vista/registrarinscripcion3.php');
}	
$Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos		
?>
</form>
</body>
</html>
