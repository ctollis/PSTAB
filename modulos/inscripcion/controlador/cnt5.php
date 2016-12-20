<?php
require 'modelo5.php';
$cadena="";
$cedula_estu=$_POST['cedula_estu'];
$cedula_r=$_POST['cedula_r'];
$nombre_r=$_POST['nombre_r'];
$apellido_r=$_POST['apellido_r'];
$lugar_nac_r=$_POST['lugar_nac_r'];
$municipio_nac_r=$_POST['municipio_nac_r'];
$estado_nac_r=$_POST['estado_nac_r'];
$nacionalidad_r=$_POST['nacionalidad_r'];
$sexo_r=$_POST['sexo_r'];
$pais_r=$_POST['pais_r'];
$pto_referencia_r=$_POST['pto_referencia_r'];
$telefono_hab_r=$_POST['telefono_hab_r'];
$telefono_cel_r=$_POST['telefono_cel_r'];
$email_r=$_POST['email_r'];
$redes_sociales_r=$_POST['redes_sociales_r'];
$trabajo_r=$_POST['trabajo_r'];
$profesion_r=$_POST['profesion_r'];
$ingreso_mensual_r=$_POST['ingreso_mensual_r'];
$jornada_laboral_r=$_POST['jornada_laboral_r'];
$empresa_trabajo_r=$_POST['empresa_trabajo_r'];
$telefono_trabajo_r=$_POST['telefono_trabajo_r'];
$estado_actu_r=$_POST['estado_actu_r'];
$municipio_actu_r=$_POST['municipio_actu_r'];
$urb_actu_r=$_POST['urb_actu_r'];
$calle_actu_r=$_POST['calle_actu_r'];
$casa_edif_r=$_POST['casa_edif_r'];
$piso_r=$_POST['piso_r'];
$apto_r=$_POST['apto_r'];
$pin_r=$_POST['pin_r'];
$otro_redes_r=$_POST['otro_redes_r'];
$estado_trabajo_r=$_POST['estado_trabajo_r'];
$municipio_trabajo_r=$_POST['municipio_trabajo_r'];
$urb_trabajo_r=$_POST['urb_trabajo_r'];
$calle_trabajo_r=$_POST['calle_trabajo_r'];
$casa_trabajo_r=$_POST['casa_trabajo_r'];
$piso_trabajo_r=$_POST['piso_trabajo_r'];
$apto_trabajo_r=$_POST['apto_trabajo_r'];
$referencia_trabajo_r=$_POST['referencia_trabajo_r'];
$ext_trabajo_r=$_POST['ext_trabajo_r'];
$contacto_trabajo_r=$_POST['contacto_trabajo_r'];
$ext2_trabajo_r=$_POST['ext2_trabajo_r'];
$fecha_nac_r=$_POST['fecha_nac_r'];

$accion5=$_POST['accion5'];
$a=new representante($cedula_estu, $cedula_r, $nombre_r, $apellido_r, $lugar_nac_r, $municipio_nac_r, $estado_nac_r, $nacionalidad_r, $sexo_r, $pais_r, $pto_referencia_r, 
$telefono_hab_r, $telefono_cel_r, $email_r, $redes_sociales_r, $trabajo_r, $profesion_r, $ingreso_mensual_r, $jornada_laboral_r, $empresa_trabajo_r, $telefono_trabajo_r,
$estado_actu_r, $municipio_actu_r, $urb_actu_r, $calle_actu_r, $casa_edif_r, $piso_r, $apto_r, $pin_r, $otro_redes_r, $estado_trabajo_r, $municipio_trabajo_r, $urb_trabajo_r,
$calle_trabajo_r, $casa_trabajo_r, $piso_trabajo_r, $apto_trabajo_r, $referencia_trabajo_r, $ext_trabajo_r, $contacto_trabajo_r, $ext2_trabajo_r, $fecha_nac_r);

if($accion5=="Modificar"){
$existe=$a->modrepre();
echo "<script type='text/javascript'> 
		alert('Datos Actualizados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";}

if($accion5=="Eliminar"){
$existe=$a->elimrepre();
echo "<script type='text/javascript'> 
		alert('Datos Eliminados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";
}
