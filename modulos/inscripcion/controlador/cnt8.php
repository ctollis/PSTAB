<?php
require 'modelo8.php';
$cadena="";
$cedula_estu=$_POST['cedula_estu'];
$catolico=$_POST['catolico'];
$sacramentos=$_POST['sacramentos'];
$nombre_apellido_emerg=$_POST['nombre_apellido_emerg'];
$parentesco_otro=$_POST['parentesco_otro'];
$telefono=$_POST['telefono'];
$nombre_apellido_emerg2=$_POST['nombre_apellido_emerg2'];
$parentesco_otro2=$_POST['parentesco_otro2'];
$telefono2=$_POST['telefono2'];

$accion8=$_POST['accion8'];
$a=new otros_datos($cedula_estu, $catolico, $sacramentos, $nombre_apellido_emerg, $parentesco_otro, $telefono, $nombre_apellido_emerg2,
 $parentesco_otro2, $telefono2);

if($accion8=="Modificar"){
$existe=$a->modotro();
echo "<script type='text/javascript'> 
		alert('Datos Actualizados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";}

if($accion8=="Eliminar"){
$existe=$a->elimotro();
echo "<script type='text/javascript'> 
		alert('Datos Eliminados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";
}
