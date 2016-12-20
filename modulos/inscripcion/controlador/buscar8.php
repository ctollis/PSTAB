<?php
require 'modelo8.php';
$cadena="";
$cedula_estu=$_GET['cedula_estu'];
$a=new otros_datos($cedula_estu,"","","","","","","","");
$existe=$a->buscarotro();
if ($existe)
	{
	$cadena=$existe['cedula_estu']."*".$existe['catolico']."*".$existe['sacramentos']."*".$existe['nombre_apellido_emerg']
	."*".$existe['parentesco_otro']."*".$existe['telefono']."*".$existe['nombre_apellido_emerg2']."*".$existe['parentesco_otro2']
	."*".$existe['telefono2'];}
else
	{$cadena= "el registro no existe";}
echo $cadena;

