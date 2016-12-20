<?php
require 'modelo.php';
$cadena="";
$cedula_estu=$_POST['cedula_estu'];
$ano_escolar=$_POST['ano_escolar'];
$grado_actual=$_POST['grado_actual'];
$seccion_actual=$_POST['seccion_actual'];
$repite=$_POST['repite'];
$grado_cursar=$_POST['grado_cursar'];
$fecha_inscripcion=$_POST['fecha_inscripcion'];

$accion=$_POST['accion'];
$a=new inscripcion($cedula_estu,$ano_escolar,$grado_actual,$seccion_actual,$repite,$grado_cursar,$fecha_inscripcion);

if($accion=="Modificar"){
$existe=$a->modalumno();
echo "<script type='text/javascript'> 
		alert('Datos Actualizados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";}
if($accion=="Eliminar"){
$existe=$a->elimalumno();
echo "<script type='text/javascript'> 
		alert('Datos Eliminados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";}