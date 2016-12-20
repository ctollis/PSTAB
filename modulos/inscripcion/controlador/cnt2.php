<?php
require 'modelo2.php';
$cadena="";
$cedula_estu=$_POST['cedula_estu'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$nacionalidad=$_POST['nacionalidad'];
$edad=$_POST['edad'];
$sexo=$_POST['sexo'];
$pto_referencia=$_POST['pto_referencia'];
$lugar_nac=$_POST['lugar_nac'];
$pais_nac=$_POST['pais_nac'];
$municipio=$_POST['municipio'];
$estado=$_POST['estado'];
$estado_actu=$_POST['estado_actu'];
$municipio_actu=$_POST['municipio_actu'];
$urb_sector=$_POST['urb_sector'];
$calle=$_POST['calle'];
$casa_edif=$_POST['casa_edif'];
$piso=$_POST['piso'];
$apto=$_POST['apto'];
$representante=$_POST['representante'];
$parentesco=$_POST['parentesco'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$ano=$_POST['ano'];

$accion2=$_POST['accion2'];
$a=new estudiante($cedula_estu,$nombre,$apellido,$nacionalidad,$edad,$sexo,$pto_referencia, $lugar_nac, $pais_nac, $municipio, $estado, $estado_actu, $municipio_actu, $urb_sector,$calle, $casa_edif, $piso,$apto, $representante, $parentesco, $fecha_nacimiento, $ano);

if($accion2=="Modificar"){
$existe=$a->modestu();
echo "<script type='text/javascript'> 
		alert('Datos Actualizados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";}

if($accion2=="Eliminar"){
$existe=$a->elimestu();
echo "<script type='text/javascript'> 
		alert('Datos Eliminados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";
}
