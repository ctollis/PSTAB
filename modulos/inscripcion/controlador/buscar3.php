<?php
require 'modelo3.php';
$cadena="";
$cedula_estu=$_GET['cedula_estu'];
$a=new madre($cedula_estu,"","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");
$existe=$a->buscarma();
if ($existe)
	{
	$cadena=$existe['cedula_estu']."*".$existe['cedula_m']."*".$existe['nombre_m']."*".$existe['apellido_m']."*".$existe['lugar_nac_m']."*".$existe['municipio_nac_m']
	."*".$existe['estado_nac_m']."*".$existe['nacionalidad_m']."*".$existe['sexo_m']."*".$existe['pais_m']."*".$existe['pto_referencia_m']
	."*".$existe['telefono_hab_m']."*".$existe['telefono_cel_m']."*".$existe['email_m']."*".$existe['redes_sociales_m']."*".$existe['trabajo_m']
	."*".$existe['profesion_m']."*".$existe['ingreso_mensual_m']."*".$existe['jornada_laboral_m']."*".$existe['empresa_trabajo_m']."*".$existe['telefono_trabajo_m']
	."*".$existe['estado_actu_m']."*".$existe['municipio_actu_m']."*".$existe['urb_actu_m']."*".$existe['calle_actu_m']."*".$existe['casa_edif_m']."*".$existe['piso_m']
	."*".$existe['apto_m']."*".$existe['pin_m']."*".$existe['otro_redes_m']."*".$existe['estado_trabajo_m']."*".$existe['municipio_trabajo_m']
	."*".$existe['urb_trabajo_m']."*".$existe['calle_trabajo_m']."*".$existe['casa_trabajo_m']."*".$existe['piso_trabajo_m']."*".$existe['apto_trabajo_m']
	."*".$existe['referencia_trabajo_m']."*".$existe['ext_trabajo_m']."*".$existe['ext2_trabajo_m']."*".$existe['contacto_trabajo_m']."*".$existe['fecha_nac_m'];}
else
	{$cadena= "el registro no existe";}
echo $cadena;
