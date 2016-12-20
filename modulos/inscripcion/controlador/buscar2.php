<?php
require 'modelo2.php';
$cadena="";
$cedula_estu=$_GET['cedula_estu'];
$a=new estudiante($cedula_estu,"","","","","","","","","","","","","","","","","","","","","");
$existe=$a->buscarestu();
if ($existe)
	{
	$cadena=$existe['cedula_estu']."*".$existe['nombre']."*".$existe['apellido']."*".$existe['nacionalidad']."*".$existe['edad']."*".$existe['sexo']."*".$existe['pto_referencia']."*".$existe['lugar_nac']."*".$existe['pais_nac']."*".$existe['municipio']."*".$existe['estado']."*".$existe['estado_actu']."*".$existe['municipio_actu']."*".$existe['urb_sector']."*".$existe['calle']."*".$existe['casa_edif']."*".$existe['piso']."*".$existe['apto']."*".$existe['representante']."*".$existe['parentesco']."*".$existe['fecha_nacimiento']."*".$existe['ano'];}
else
	{$cadena= "el registro no existe";}
echo $cadena;

?>


