<?php
require 'modelo.php';
$cadena="";
$cedula_estu=$_GET['cedula_estu'];
$a=new inscripcion($cedula_estu,"","","","","","");
$existe=$a->buscaralumno();
if ($existe)
	{
	$cadena=$existe['cedula_estu']."*".$existe['ano_escolar']."*".$existe['grado_actual']."*".$existe['seccion_actual']."*".$existe['repite']."*".$existe['grado_cursar']."*".$existe['fecha_inscripcion'];}
else
	{$cadena= "el registro no existe";}
echo $cadena;

?>
