<?php
require 'modelo7.php';
$cadena="";
$cedula_estu=$_GET['cedula_estu'];
$a=new datos_salud($cedula_estu,"","","","","","","","","","","","","","","","","","","","","","","");
$existe=$a->buscarsalud();
if ($existe)
	{
	$cadena=$existe['cedula_estu']."*".$existe['grupo_sang']."*".$existe['talla']."*".$existe['peso']."*".$existe['padece_enfermedad']
	."*".$existe['diversidad_funcional']."*".$existe['operaciones']."*".$existe['alergias_alimentos']."*".$existe['alim_trata_espe']."*".$existe['vacunas']
	."*".$existe['enfermedades_padecidas']."*".$existe['factor_rh']."*".$existe['especifique_enfermedad']
	."*".$existe['especifique_diversidad']."*".$existe['especifique_operacion']."*".$existe['especifique_alergia_alimento']."*".$existe['alergias_medicamentos']
	."*".$existe['especifique_alergia_medicamento']."*".$existe['alergias_otros']."*".$existe['especifique_alergia_otros']."*".$existe['especifique_alimentacion']."*".$existe['otros_vacuna']
	."*".$existe['especifique_enfermedades_padecidas']."*".$existe['otros_enfermedades'];}
else
	{$cadena= "el registro no existe";}
echo $cadena;

