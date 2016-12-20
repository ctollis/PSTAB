<?php
require 'modelo5.php';
$cadena="";
$cedula_estu=$_GET['cedula_estu'];
$a=new representante($cedula_estu,"","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");
$existe=$a->buscarepre();
if ($existe)
	{
	$cadena=$existe['cedula_estu']."*".$existe['cedula_r']."*".$existe['nombre_r']."*".$existe['apellido_r']."*".$existe['lugar_nac_r']."*".$existe['municipio_nac_r']
	."*".$existe['estado_nac_r']."*".$existe['nacionalidad_r']."*".$existe['sexo_r']."*".$existe['pais_r']."*".$existe['pto_referencia_r']
	."*".$existe['telefono_hab_r']."*".$existe['telefono_cel_r']."*".$existe['email_r']."*".$existe['redes_sociales_r']."*".$existe['trabajo_r']
	."*".$existe['profesion_r']."*".$existe['ingreso_mensual_r']."*".$existe['jornada_laboral_r']."*".$existe['empresa_trabajo_r']."*".$existe['telefono_trabajo_r']
	."*".$existe['estado_actu_r']."*".$existe['municipio_actu_r']."*".$existe['urb_actu_r']."*".$existe['calle_actu_r']."*".$existe['casa_edif_r']."*".$existe['piso_r']
	."*".$existe['apto_r']."*".$existe['pin_r']."*".$existe['otro_redes_r']."*".$existe['estado_trabajo_r']."*".$existe['municipio_trabajo_r']
	."*".$existe['urb_trabajo_r']."*".$existe['calle_trabajo_r']."*".$existe['casa_trabajo_r']."*".$existe['piso_trabajo_r']."*".$existe['apto_trabajo_r']
	."*".$existe['referencia_trabajo_r']."*".$existe['ext_trabajo_r']."*".$existe['contacto_trabajo_r']."*".$existe['ext2_trabajo_r']."*".$existe['fecha_nac_r'];}
else
	{$cadena= "el registro no existe";}
echo $cadena;
