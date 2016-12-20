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
$cedula_r=$_POST["cedula_r"];
$nombre_r=$_POST["nombre_r"];
$apellido_r=$_POST["apellido_r"];
$lugar_nac_r=$_POST["lugar_nac_r"];
$estado_nac_r=$_POST["estado_nac_r"];
$municipio_nac_r=$_POST["municipio_nac_r"];
$nacionalidad_r=$_POST["nacionalidad_r"];
$pais_r=$_POST["pais_r"];
$sexo_r=$_POST["sexo_r"];
$estado_actu_r=$_POST["estado_actu_r"];
$municipio_actu_r=$_POST["municipio_actu_r"];
$urb_actu_r=$_POST["urb_actu_r"];
$calle_actu_r=$_POST["calle_actu_r"];
$casa_edif_r=$_POST["casa_edif_r"];
$piso_r=$_POST["piso_r"];
$apto_r=$_POST["apto_r"];
$pto_referencia_r=$_POST["pto_referencia_r"];
$telefono_hab_r=$_POST["telefono_hab_r"];
$telefono_cel_r=$_POST["telefono_cel_r"];
$email_r=$_POST["email_r"];
$pin_r=$_POST["pin_r"];
$redes_sociales_r=$_POST["redes_sociales_r"];
$otro_redes_r=$_POST["otro_redes_r"];
$trabajo_r=$_POST["trabajo_r"];
$profesion_r=$_POST["profesion_r"];
$ingreso_mensual_r=$_POST["ingreso_mensual_r"];
$empresa_trabajo_r=$_POST["empresa_trabajo_r"];
$jornada_laboral_r=$_POST["jornada_laboral_r"];
$estado_trabajo_r=$_POST["estado_trabajo_r"];
$municipio_trabajo_r=$_POST["municipio_trabajo_r"];
$urb_trabajo_r=$_POST["urb_trabajo_r"];
$calle_trabajo_r=$_POST["calle_trabajo_r"];
$casa_trabajo_r=$_POST["casa_trabajo_r"];
$piso_trabajo_r=$_POST["piso_trabajo_r"];
$apto_trabajo_r=$_POST["apto_trabajo_r"];
$referencia_trabajo_r=$_POST["referencia_trabajo_r"];
$telefono_trabajo_r=$_POST["telefono_trabajo_r"];
$ext_trabajo_r=$_POST["ext_trabajo_r"];
$contacto_trabajo_r=$_POST["contacto_trabajo_r"];
$ext2_trabajo_r=$_POST["ext2_trabajo_r"];
$fecha_nac_r=$_POST["fecha_nac_r"];
$cedula_estu=$_POST["cedula_estu"];
$Usuario = new AdministradorBd();

$cnn=$Usuario->conectaBd();
if (!$cnn) { // Si la Conexion  Falla
   $Usuario->controlError(1,$cnn);
   exit();
}	         
echo"'$cedula_r','$nombre_r', '$apellido_r', '$lugar_nac_r', '$estado_nac_r', '$municipio_nac_r','$nacionalidad_r', '$pais_r', '$sexo_r', '$estado_actu_r', '$municipio_actu_r', '$urb_actu_r', '$calle_actu_r','$casa_edif_r','$piso_r', '$apto_r', '$pto_referencia_r', '$telefono_hab_r', '$telefono_cel_r', '$email_r', '$pin_r', '$redes_sociales_r', '$otro_redes_r', '$trabajo_r', '$profesion_r', '$ingreso_mensual_r', '$empresa_trabajo_r', '$jornada_laboral_r', '$estado_trabajo_r', '$municipio_trabajo_r', '$urb_trabajo_r', '$calle_trabajo_r', '$casa_trabajo_r', '$piso_trabajo_r', '$apto_trabajo_r', '$referencia_trabajo_r', '$telefono_trabajo_r', '$ext_trabajo_r', '$contacto_trabajo_r', '$ext2_trabajo_r', '$fecha_nac_r', '$cedula_estu'";
$Consulta=$Usuario->ejecutaQuery("INSERT INTO pstab.representante(cedula_r, nombre_r, apellido_r, lugar_nac_r, estado_nac_r, municipio_nac_r, nacionalidad_r, pais_r, sexo_r, estado_actu_r, municipio_actu_r, urb_actu_r, calle_actu_r, casa_edif_r, piso_r, apto_r, pto_referencia_r, telefono_hab_r, telefono_cel_r, email_r, pin_r, redes_sociales_r,  otro_redes_r, trabajo_r, profesion_r, ingreso_mensual_r, empresa_trabajo_r, jornada_laboral_r, estado_trabajo_r, municipio_trabajo_r, urb_trabajo_r, calle_trabajo_r, casa_trabajo_r,piso_trabajo_r, apto_trabajo_r, referencia_trabajo_r, telefono_trabajo_r, ext_trabajo_r, contacto_trabajo_r, ext2_trabajo_r, fecha_nac_r, cedula_estu) VALUES ('$cedula_r','$nombre_r', '$apellido_r', '$lugar_nac_r', '$estado_nac_r', '$municipio_nac_r','$nacionalidad_r', '$pais_r', '$sexo_r', '$estado_actu_r', '$municipio_actu_r', '$urb_actu_r', '$calle_actu_r','$casa_edif_r','$piso_r', '$apto_r', '$pto_referencia_r', '$telefono_hab_r', '$telefono_cel_r', '$email_r', '$pin_r', '$redes_sociales_r', '$otro_redes_r', '$trabajo_r', '$profesion_r', '$ingreso_mensual_r', '$empresa_trabajo_r', '$jornada_laboral_r', '$estado_trabajo_r', '$municipio_trabajo_r', '$urb_trabajo_r', '$calle_trabajo_r', '$casa_trabajo_r', '$piso_trabajo_r', '$apto_trabajo_r', '$referencia_trabajo_r', '$telefono_trabajo_r', '$ext_trabajo_r', '$contacto_trabajo_r', '$ext2_trabajo_r', '$fecha_nac_r', '$cedula_estu')"); //Ejecuta el Query en la Base de Datos


if (!$Consulta) { // Si No se Ejecuta el Query
    echo "<script type='text/javascript'> 
		alert('Error el Estudiante ya existe!');
        location='../vista/registrarinscripcion5.php'
        </script>";
   exit();
}else{
		header('Location: ../vista/registrarinscripcion6.php');

}	

  
$Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos		
?>
</form>
</body>
</html>
