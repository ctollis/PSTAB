<?php
require 'modelo4.php';
$cadena="";
$cedula_estu=$_GET['cedula_estu'];
$a=new padre($cedula_estu,"","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");
$existe=$a->buscarpa();
if ($existe)
	{
	$cadena=$existe['cedula_estu']."*".$existe['cedula_p']."*".$existe['nombre_p']."*".$existe['apellido_p']."*".$existe['lugar_nac_p']."*".$existe['municipio_nac_p']
	."*".$existe['estado_nac_p']."*".$existe['nacionalidad_p']."*".$existe['sexo_p']."*".$existe['pais_p']."*".$existe['pto_referencia_p']
	."*".$existe['telefono_hab_p']."*".$existe['telefono_cel_p']."*".$existe['email_p']."*".$existe['redes_sociales_p']."*".$existe['trabajo_p']
	."*".$existe['profesion_p']."*".$existe['ingreso_mensual_p']."*".$existe['jornada_laboral_p']."*".$existe['empresa_trabajo_p']."*".$existe['telefono_trabajo_p']
	."*".$existe['estado_actu_p']."*".$existe['municipio_actu_p']."*".$existe['urb_actu_p']."*".$existe['calle_actu_p']."*".$existe['casa_edif_p']."*".$existe['piso_p']
	."*".$existe['apto_p']."*".$existe['otro_redes_p']."*".$existe['estado_trabajo_p']."*".$existe['municipio_trabajo_p']
	."*".$existe['urb_trabajo_p']."*".$existe['calle_trabajo_p']."*".$existe['casa_trabajo_p']."*".$existe['piso_trabajo_p']."*".$existe['apto_trabajo_p']
	."*".$existe['referencia_trabajo_p']."*".$existe['ext_trabajo_p']."*".$existe['ext2_trabajo_p']."*".$existe['pin_p']."*".$existe['contacto_trabajo_p']."*".$existe['fecha_nac_p'];}
else
	{$cadena= "el registro no existe";}
echo $cadena;
