<?php
require_once '../modelo/conex.php';
class datos_salud{
private $cedula_estu;
private $grupo_sang;
private $talla;
private $peso;
private $padece_enfermedad;
private $diversidad_funcional;
private $operaciones;
private $alergias_alimentos;
private $alim_trata_espe;
private $vacunas;
private $enfermedades_padecidas;
private $factor_rh;
private $especifique_enfermedad;
private $especifique_diversidad;
private $especifique_operacion;
private $especifique_alergia_alimento;
private $alergias_medicamentos;
private $especifique_alergia_medicamento;
private $alergias_otros;
private $especifique_alergia_otros;
private $especifique_alimentacion;
private $otros_vacuna;
private $especifique_enfermedades_padecidas;
private $otros_enfermedades;

	public function buscarsalud() {
		$bd=new conex();
		$bd->conectar();
		$sql="SELECT * FROM pstab.datos_salud where cedula_estu='$this->cedula_estu'";
		$result=$bd->consulta($sql);
		$data=$bd->row($result);
		return $data;
	}
	public function datos_salud($cedula_estu, $grupo_sang, $talla, $peso, $padece_enfermedad, $diversidad_funcional, $operaciones, $alergias_alimentos, 
$alim_trata_espe, $vacunas, $enfermedades_padecidas, $factor_rh, $especifique_enfermedad, $especifique_diversidad, $especifique_operacion,
 $especifique_alergia_alimento, $alergias_medicamentos, $especifique_alergia_medicamento, $alergias_otros, $especifique_alergia_otros, 
$especifique_alimentacion, $otros_vacuna, $especifique_enfermedades_padecidas, $otros_enfermedades)
	{
		$this->cedula_estu=$cedula_estu;
		$this->grupo_sang=$grupo_sang;
		$this->talla=$talla;
		$this->peso=$peso;
		$this->padece_enfermedad=$padece_enfermedad;
		$this->diversidad_funcional=$diversidad_funcional;
		$this->operaciones=$operaciones;
		$this->alergias_alimentos=$alergias_alimentos;
		$this->alim_trata_espe=$alim_trata_espe;
		$this->vacunas=$vacunas;
		$this->enfermedades_padecidas=$enfermedades_padecidas;
		$this->factor_rh=$factor_rh;
		$this->especifique_enfermedad=$especifique_enfermedad;
		$this->especifique_diversidad=$especifique_diversidad;
		$this->especifique_operacion=$especifique_operacion;
		$this->especifique_alergia_alimento=$especifique_alergia_alimento;
		$this->alergias_medicamentos=$alergias_medicamentos;
		$this->especifique_alergia_medicamento=$especifique_alergia_medicamento;
		$this->alergias_otros=$alergias_otros;
		$this->especifique_alergia_otros=$especifique_alergia_otros;
		$this->especifique_alimentacion=$especifique_alimentacion;
		$this->otros_vacuna=$otros_vacuna;
		$this->especifique_enfermedades_padecidas=$especifique_enfermedades_padecidas;
		$this->otros_enfermedades=$otros_enfermedades;
	

	}

	function modsalud() {
		$bd=new conex();
		$bd->conectar();
		$sql="UPDATE pstab.datos_salud SET grupo_sang='$this->grupo_sang', talla='$this->talla', peso='$this->peso',
		padece_enfermedad='$this->padece_enfermedad',diversidad_funcional='$this->diversidad_funcional',operaciones='$this->operaciones' ,
		alergias_alimentos='$this->alergias_alimentos', alim_trata_espe='$this->alim_trata_espe',vacunas='$this->vacunas',
		enfermedades_padecidas='$this->enfermedades_padecidas',factor_rh='$this->factor_rh',
		especifique_enfermedad='$this->especifique_enfermedad', especifique_diversidad='$this->especifique_diversidad', especifique_operacion='$this->especifique_operacion',
		especifique_alergia_alimento='$this->especifique_alergia_alimento',alergias_medicamentos='$this->alergias_medicamentos',especifique_alergia_medicamento='$this->especifique_alergia_medicamento' ,
		alergias_otros='$this->alergias_otros', especifique_alergia_otros='$this->especifique_alergia_otros',especifique_alimentacion='$this->especifique_alimentacion',
		otros_vacuna='$this->otros_vacuna',especifique_enfermedades_padecidas='$this->especifique_enfermedades_padecidas',
		otros_enfermedades='$this->otros_enfermedades' WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
	function elimsalud() {
		$bd=new conex();
		$bd->conectar();
		$sql="DELETE FROM pstab.datos_salud  WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
}
?>
