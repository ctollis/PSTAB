<?php
require 'modelo3.php';
$cadena="";
$cedula_estu=$_POST['cedula_estu'];
$cedula_m=$_POST['cedula_m'];
$nombre_m=$_POST['nombre_m'];
$apellido_m=$_POST['apellido_m'];
$lugar_nac_m=$_POST['lugar_nac_m'];
$municipio_nac_m=$_POST['municipio_nac_m'];
$estado_nac_m=$_POST['estado_nac_m'];
$nacionalidad_m=$_POST['nacionalidad_m'];
$sexo_m=$_POST['sexo_m'];
$pais_m=$_POST['pais_m'];
$pto_referencia_m=$_POST['pto_referencia_m'];
$telefono_hab_m=$_POST['telefono_hab_m'];
$telefono_cel_m=$_POST['telefono_cel_m'];
$email_m=$_POST['email_m'];
$redes_sociales_m=$_POST['redes_sociales_m'];
$trabajo_m=$_POST['trabajo_m'];
$profesion_m=$_POST['profesion_m'];
$ingreso_mensual_m=$_POST['ingreso_mensual_m'];
$jornada_laboral_m=$_POST['jornada_laboral_m'];
$empresa_trabajo_m=$_POST['empresa_trabajo_m'];
$telefono_trabajo_m=$_POST['telefono_trabajo_m'];
$estado_actu_m=$_POST['estado_actu_m'];
$municipio_actu_m=$_POST['municipio_actu_m'];
$urb_actu_m=$_POST['urb_actu_m'];
$calle_actu_m=$_POST['calle_actu_m'];
$casa_edif_m=$_POST['casa_edif_m'];
$piso_m=$_POST['piso_m'];
$apto_m=$_POST['apto_m'];
$pin_m=$_POST['pin_m'];
$otro_redes_m=$_POST['otro_redes_m'];
$estado_trabajo_m=$_POST['estado_trabajo_m'];
$municipio_trabajo_m=$_POST['municipio_trabajo_m'];
$urb_trabajo_m=$_POST['urb_trabajo_m'];
$calle_trabajo_m=$_POST['calle_trabajo_m'];
$casa_trabajo_m=$_POST['casa_trabajo_m'];
$piso_trabajo_m=$_POST['piso_trabajo_m'];
$apto_trabajo_m=$_POST['apto_trabajo_m'];
$referencia_trabajo_m=$_POST['referencia_trabajo_m'];
$ext_trabajo_m=$_POST['ext_trabajo_m'];
$ext2_trabajo_m=$_POST['ext2_trabajo_m'];
$contacto_trabajo_m=$_POST['contacto_trabajo_m'];
$fecha_nac_m=$_POST['fecha_nac_m'];

$accion3=$_POST['accion3'];
$a=new madre($cedula_estu, $cedula_m, $nombre_m, $apellido_m, $lugar_nac_m, $municipio_nac_m, $estado_nac_m, $nacionalidad_m, $sexo_m, $pais_m, $pto_referencia_m, 
$telefono_hab_m, $telefono_cel_m, $email_m, $redes_sociales_m, $trabajo_m, $profesion_m, $ingreso_mensual_m, $jornada_laboral_m, $empresa_trabajo_m, $telefono_trabajo_m,
$estado_actu_m, $municipio_actu_m, $urb_actu_m, $calle_actu_m, $casa_edif_m, $piso_m, $apto_m, $pin_m, $otro_redes_m, $estado_trabajo_m, $municipio_trabajo_m, $urb_trabajo_m,
$calle_trabajo_m, $casa_trabajo_m, $piso_trabajo_m, $apto_trabajo_m, $referencia_trabajo_m, $ext_trabajo_m, $ext2_trabajo_m, $contacto_trabajo_m, $fecha_nac_m);

if($accion3=="Modificar"){
$existe=$a->modmadre();
echo "<script type='text/javascript'> 
		alert('Datos Actualizados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";}

if($accion3=="Eliminar"){
$existe=$a->elimadre();
echo "<script type='text/javascript'> 
		alert('Datos Eliminados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";
}
