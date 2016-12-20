<?php
require 'modelo6.php';
$cadena="";
$cedula_estu=$_GET['cedula_estu'];
$a=new datos_socio_eco($cedula_estu,"","","","","","","","","","","","");
$existe=$a->buscarsocioeco();
if ($existe)
	{
	$cadena=$existe['cedula_estu']."*".$existe['vive_con']."*".$existe['beca']."*".$existe['medio_traslado_plantel']."*".$existe['se_retira_solo_plantel']
	."*".$existe['n_hermanos']."*".$existe['datos_vivienda']."*".$existe['otros_vive']."*".$existe['especifique_beca']."*".$existe['otros_ruta']
	."*".$existe['hermanos_en_plantel']."*".$existe['especifique_grado_hermano']."*".$existe['otros_datos_vivienda'];}
else
	{$cadena= "el registro no existe";}
echo $cadena;

