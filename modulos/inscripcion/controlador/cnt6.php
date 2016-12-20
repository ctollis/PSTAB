<?php
require 'modelo6.php';
$cadena="";
$cedula_estu=$_POST['cedula_estu'];
$vive_con=$_POST['vive_con'];
$beca=$_POST['beca'];
$medio_traslado_plantel=$_POST['medio_traslado_plantel'];
$se_retira_solo_plantel=$_POST['se_retira_solo_plantel'];
$n_hermanos=$_POST['n_hermanos'];
$datos_vivienda=$_POST['datos_vivienda'];
$otros_vive=$_POST['otros_vive'];
$especifique_beca=$_POST['especifique_beca'];
$otros_ruta=$_POST['otros_ruta'];
$hermanos_en_plantel=$_POST['hermanos_en_plantel'];
$especifique_grado_hermano=$_POST['especifique_grado_hermano'];
$otros_datos_vivienda=$_POST['otros_datos_vivienda'];


$accion6=$_POST['accion6'];
$a=new datos_socio_eco($cedula_estu, $vive_con, $beca, $medio_traslado_plantel, $se_retira_solo_plantel, $n_hermanos, $datos_vivienda, $otros_vive, 
$especifique_beca, $otros_ruta, $hermanos_en_plantel, $especifique_grado_hermano, $otros_datos_vivienda);

if($accion6=="Modificar"){
$existe=$a->modsocioeco();
echo "<script type='text/javascript'> 
		alert('Datos Actualizados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";}

if($accion6=="Eliminar"){
$existe=$a->elimsocioeco();
echo "<script type='text/javascript'> 
		alert('Datos Eliminados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";
}
