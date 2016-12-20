<?php
require 'modelo7.php';
$cadena="";
$cedula_estu=$_POST['cedula_estu'];
$grupo_sang=$_POST['grupo_sang'];
$talla=$_POST['talla'];
$peso=$_POST['peso'];
$padece_enfermedad=$_POST['padece_enfermedad'];
$diversidad_funcional=$_POST['diversidad_funcional'];
$operaciones=$_POST['operaciones'];
$alergias_alimentos=$_POST['alergias_alimentos'];
$alim_trata_espe=$_POST['alim_trata_espe'];
$vacunas=$_POST['vacunas'];
$enfermedades_padecidas=$_POST['enfermedades_padecidas'];
$factor_rh=$_POST['factor_rh'];
$especifique_enfermedad=$_POST['especifique_enfermedad'];
$especifique_diversidad=$_POST['especifique_diversidad'];
$especifique_operacion=$_POST['especifique_operacion'];
$especifique_alergia_alimento=$_POST['especifique_alergia_alimento'];
$alergias_medicamentos=$_POST['alergias_medicamentos'];
$especifique_alergia_medicamento=$_POST['especifique_alergia_medicamento'];
$alergias_otros=$_POST['alergias_otros'];
$especifique_alergia_otros=$_POST['especifique_alergia_otros'];
$especifique_alimentacion=$_POST['especifique_alimentacion'];
$otros_vacuna=$_POST['otros_vacuna'];
$especifique_enfermedades_padecidas=$_POST['especifique_enfermedades_padecidas'];
$otros_enfermedades=$_POST['otros_enfermedades'];

$accion7=$_POST['accion7'];
$a=new datos_salud($cedula_estu, $grupo_sang, $talla, $peso, $padece_enfermedad, $diversidad_funcional, $operaciones, $alergias_alimentos, 
$alim_trata_espe, $vacunas, $enfermedades_padecidas, $factor_rh, $especifique_enfermedad, $especifique_diversidad, $especifique_operacion,
 $especifique_alergia_alimento, $alergias_medicamentos, $especifique_alergia_medicamento, $alergias_otros, $especifique_alergia_otros, 
$especifique_alimentacion, $otros_vacuna, $especifique_enfermedades_padecidas, $otros_enfermedades);

if($accion7=="Modificar"){
$existe=$a->modsalud();
echo "<script type='text/javascript'> 
		alert('Datos Actualizados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";}

if($accion7=="Eliminar"){
$existe=$a->elimsalud();
echo "<script type='text/javascript'> 
		alert('Datos Eliminados correctamente!');
        location='../vista/Consultarinscripcion.php'
</script>";
}
