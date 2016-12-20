<?php
require 'modelo4.php';
$cadena="";
$cedula_estu=$_POST['cedula_estu'];
$cedula_p=$_POST['cedula_p'];
$nombre_p=$_POST['nombre_p'];
$apellido_p=$_POST['apellido_p'];
$lugar_nac_p=$_POST['lugar_nac_p'];
$municipio_nac_p=$_POST['municipio_nac_p'];
$estado_nac_p=$_POST['estado_nac_p'];
$nacionalidad_p=$_POST['nacionalidad_p'];
$sexo_p=$_POST['sexo_p'];
$pais_p=$_POST['pais_p'];
$pto_referencia_p=$_POST['pto_referencia_p'];
$telefono_hab_p=$_POST['telefono_hab_p'];
$telefono_cel_p=$_POST['telefono_cel_p'];
$email_p=$_POST['email_p'];
$redes_sociales_p=$_POST['redes_sociales_p'];
$trabajo_p=$_POST['trabajo_p'];
$profesion_p=$_POST['profesion_p'];
$ingreso_mensual_p=$_POST['ingreso_mensual_p'];
$jornada_laboral_p=$_POST['jornada_laboral_p'];
$empresa_trabajo_p=$_POST['empresa_trabajo_p'];
$telefono_trabajo_p=$_POST['telefono_trabajo_p'];
$estado_actu_p=$_POST['estado_actu_p'];
$municipio_actu_p=$_POST['municipio_actu_p'];
$urb_actu_p=$_POST['urb_actu_p'];
$calle_actu_p=$_POST['calle_actu_p'];
$casa_edif_p=$_POST['casa_edif_p'];
$piso_p=$_POST['piso_p'];
$apto_p=$_POST['apto_p'];
$otro_redes_p=$_POST['otro_redes_p'];
$estado_trabajo_p=$_POST['estado_trabajo_p'];
$municipio_trabajo_p=$_POST['municipio_trabajo_p'];
$urb_trabajo_p=$_POST['urb_trabajo_p'];
$calle_trabajo_p=$_POST['calle_trabajo_p'];
$casa_trabajo_p=$_POST['casa_trabajo_p'];
$piso_trabajo_p=$_POST['piso_trabajo_p'];
$apto_trabajo_p=$_POST['apto_trabajo_p'];
$referencia_trabajo_p=$_POST['referencia_trabajo_p'];
$ext_trabajo_p=$_POST['ext_trabajo_p'];
$ext2_trabajo_p=$_POST['ext2_trabajo_p'];
$pin_p=$_POST['pin_p'];
$contacto_trabajo_p=$_POST['contacto_trabajo_p'];
$fecha_nac_p=$_POST['fecha_nac_p'];

$accion4=$_POST['accion4'];
$a=new padre($cedula_estu, $cedula_p, $nombre_p, $apellido_p, $lugar_nac_p, $municipio_nac_p, $estado_nac_p, $nacionalidad_p, $sexo_p, $pais_p, $pto_referencia_p, 
$telefono_hab_p, $telefono_cel_p, $email_p, $redes_sociales_p, $trabajo_p, $profesion_p, $ingreso_mensual_p, $jornada_laboral_p, $empresa_trabajo_p, $telefono_trabajo_p,
$estado_actu_p, $municipio_actu_p, $urb_actu_p, $calle_actu_p, $casa_edif_p, $piso_p, $apto_p, $otro_redes_p, $estado_trabajo_p, $municipio_trabajo_p, $urb_trabajo_p,
$calle_trabajo_p, $casa_trabajo_p, $piso_trabajo_p, $apto_trabajo_p, $referencia_trabajo_p, $ext_trabajo_p, $ext2_trabajo_p, $pin_p, $contacto_trabajo_p, $fecha_nac_p);

if($accion4=="Modificar"){
$existe=$a->modpadre();
echo "<script type='text/javascript'> 
		alert('Datos Actualizados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";
}
if($accion4=="Eliminar"){
$existe=$a->elimpadre();
echo "<script type='text/javascript'> 
		alert('Datos Eliminados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";
}
