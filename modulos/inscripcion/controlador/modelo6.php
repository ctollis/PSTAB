<?php
require_once '../modelo/conex.php';
class datos_socio_eco{
private $cedula_estu;
private $vive_con;
private $beca;
private $medio_traslado_plantel;
private $se_retira_solo_plantel;
private $n_hermanos;
private $datos_vivienda;
private $otros_vive;
private $especifique_beca;
private $otros_ruta;
private $hermanos_en_plantel;
private $especifique_grado_hermano;
private $otros_datos_vivienda;


	public function buscarsocioeco() {
		$bd=new conex();
		$bd->conectar();
		$sql="SELECT * FROM pstab.datos_socio_eco where cedula_estu='$this->cedula_estu'";
		$result=$bd->consulta($sql);
		$data=$bd->row($result);
		return $data;
	}
	public function datos_socio_eco($cedula_estu, $vive_con, $beca, $medio_traslado_plantel, $se_retira_solo_plantel, $n_hermanos, $datos_vivienda,
	$otros_vive, $especifique_beca, $otros_ruta, $hermanos_en_plantel, $especifique_grado_hermano, $otros_datos_vivienda)
	{
		$this->cedula_estu=$cedula_estu;
		$this->vive_con=$vive_con;
		$this->beca=$beca;
		$this->medio_traslado_plantel=$medio_traslado_plantel;
		$this->se_retira_solo_plantel=$se_retira_solo_plantel;
		$this->n_hermanos=$n_hermanos;
		$this->datos_vivienda=$datos_vivienda;
		$this->otros_vive=$otros_vive;
		$this->especifique_beca=$especifique_beca;
		$this->otros_ruta=$otros_ruta;
		$this->hermanos_en_plantel=$hermanos_en_plantel;
		$this->especifique_grado_hermano=$especifique_grado_hermano;
		$this->otros_datos_vivienda=$otros_datos_vivienda;
		

	}

	function modsocioeco() {
		$bd=new conex();
		$bd->conectar();
		$sql="UPDATE pstab.datos_socio_eco SET vive_con='$this->vive_con', beca='$this->beca', medio_traslado_plantel='$this->medio_traslado_plantel',
		se_retira_solo_plantel='$this->se_retira_solo_plantel',n_hermanos='$this->n_hermanos',datos_vivienda='$this->datos_vivienda' ,
		otros_vive='$this->otros_vive', especifique_beca='$this->especifique_beca',otros_ruta='$this->otros_ruta',
		hermanos_en_plantel='$this->hermanos_en_plantel',especifique_grado_hermano='$this->especifique_grado_hermano',
		otros_datos_vivienda='$this->otros_datos_vivienda' WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
	function elimsocioeco() {
		$bd=new conex();
		$bd->conectar();
		$sql="DELETE FROM pstab.datos_socio_eco  WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
}
?>
