<?php
require_once '../modelo/conex.php';
class representante{
private $cedula_estu;
private $cedula_r;
private $nombre_r;
private $apellido_r;
private $lugar_nac_r;
private $municipio_nac_r;
private $estado_nac_r;
private $nacionalidad_r;
private $sexo_r;
private $pais_r;
private $pto_referencia_r;
private $telefono_hab_r;
private $telefono_cel_r;
private $email_r;
private $redes_sociales_r;
private $trabajo_r;
private $profesion_r;
private $ingreso_mensual_r;
private $jornada_laboral_r;
private $empresa_trabajo_r;
private $telefono_trabajo_r;
private $estado_actu_r;
private $municipio_actu_r;
private $urb_actu_r;
private $calle_actu_r;
private $casa_edif_r;
private $piso_r;
private $apto_r;
private $pin_r;
private $otro_redes_r;
private $estado_trabajo_r;
private $municipio_trabajo_r;
private $urb_trabajo_r;
private $calle_trabajo_r;
private $casa_trabajo_r;
private $piso_trabajo_r;
private $apto_trabajo_r;
private $referencia_trabajo_r;
private $ext_trabajo_r;
private $contacto_trabajo_r;
private $ext2_trabajo_r;
private $fecha_nac_p;

	public function buscarepre() {
		$bd=new conex();
		$bd->conectar();
		$sql="SELECT * FROM pstab.representante where cedula_estu='$this->cedula_estu'";
		$result=$bd->consulta($sql);
		$data=$bd->row($result);
		return $data;
	}
	public function representante($cedula_estu, $cedula_r, $nombre_r, $apellido_r, $lugar_nac_r, $municipio_nac_r, $estado_nac_r, $nacionalidad_r, $sexo_r, $pais_r, $pto_referencia_r, 
$telefono_hab_r, $telefono_cel_r, $email_r, $redes_sociales_r, $trabajo_r, $profesion_r, $ingreso_mensual_r, $jornada_laboral_r, $empresa_trabajo_r, $telefono_trabajo_r,
$estado_actu_r, $municipio_actu_r, $urb_actu_r, $calle_actu_r, $casa_edif_r, $piso_r, $apto_r, $pin_r, $otro_redes_r, $estado_trabajo_r, $municipio_trabajo_r, $urb_trabajo_r,
$calle_trabajo_r, $casa_trabajo_r, $piso_trabajo_r, $apto_trabajo_r, $referencia_trabajo_r, $ext_trabajo_r, $contacto_trabajo_r, $ext2_trabajo_r, $fecha_nac_r)
	{
		$this->cedula_estu=$cedula_estu;
		$this->cedula_r=$cedula_r;
		$this->nombre_r=$nombre_r;
		$this->apellido_r=$apellido_r;
		$this->lugar_nac_r=$lugar_nac_r;
		$this->municipio_nac_r=$municipio_nac_r;
		$this->estado_nac_r=$estado_nac_r;
		$this->nacionalidad_r=$nacionalidad_r;
		$this->sexo_r=$sexo_r;
		$this->pais_r=$pais_r;
		$this->pto_referencia_r=$pto_referencia_r;
		$this->telefono_hab_r=$telefono_hab_r;
		$this->telefono_cel_r=$telefono_cel_r;
		$this->email_r=$email_r;
		$this->redes_sociales_r=$redes_sociales_r;
		$this->trabajo_r=$trabajo_r;
		$this->profesion_r=$profesion_r;
		$this->ingreso_mensual_r=$ingreso_mensual_r;
		$this->jornada_laboral_r=$jornada_laboral_r;
		$this->empresa_trabajo_r=$empresa_trabajo_r;
		$this->telefono_trabajo_r=$telefono_trabajo_r;
		$this->estado_actu_r=$estado_actu_r;
		$this->municipio_actu_r=$municipio_actu_r;
		$this->urb_actu_r=$urb_actu_r;
		$this->calle_actu_r=$calle_actu_r;
		$this->casa_edif_r=$casa_edif_r;
		$this->piso_r=$piso_r;
		$this->apto_r=$apto_r;
		$this->pin_r=$pin_r;
		$this->otro_redes_r=$otro_redes_r;
		$this->estado_trabajo_r=$estado_trabajo_r;
		$this->municipio_trabajo_r=$municipio_trabajo_r;
		$this->urb_trabajo_r=$urb_trabajo_r;
		$this->calle_trabajo_r=$calle_trabajo_r;
		$this->casa_trabajo_r=$casa_trabajo_r;
		$this->piso_trabajo_r=$piso_trabajo_r;
		$this->apto_trabajo_r=$apto_trabajo_r;
		$this->referencia_trabajo_r=$referencia_trabajo_r;
		$this->ext_trabajo_r=$ext_trabajo_r;
		$this->contacto_trabajo_r=$contacto_trabajo_r;
		$this->ext2_trabajo_r=$ext2_trabajo_r;
		$this->fecha_nac_r=$fecha_nac_r;

	}

	function modrepre() {
		$bd=new conex();
		$bd->conectar();
		$sql="UPDATE pstab.representante SET cedula_r='$this->cedula_r', nombre_r='$this->nombre_r', apellido_r='$this->apellido_r',
		lugar_nac_r='$this->lugar_nac_r',municipio_nac_r='$this->municipio_nac_r',estado_nac_r='$this->estado_nac_r' , nacionalidad_r='$this->nacionalidad_r', sexo_r='$this->sexo_r',
		pais_r='$this->pais_r',pto_referencia_r='$this->pto_referencia_r',telefono_hab_r='$this->telefono_hab_r' , telefono_cel_r='$this->telefono_cel_r', email_r='$this->email_r',
		redes_sociales_r='$this->redes_sociales_r',trabajo_r='$this->trabajo_r',profesion_r='$this->profesion_r' , ingreso_mensual_r='$this->ingreso_mensual_r', jornada_laboral_r='$this->jornada_laboral_r',
		empresa_trabajo_r='$this->empresa_trabajo_r', telefono_trabajo_r='$this->telefono_trabajo_r',estado_actu_r='$this->estado_actu_r',
		municipio_actu_r='$this->municipio_actu_r',urb_actu_r='$this->urb_actu_r',calle_actu_r='$this->calle_actu_r',casa_edif_r='$this->casa_edif_r',
		piso_r='$this->piso_r', apto_r='$this->apto_r' ,pin_r='$this->pin_r', otro_redes_r='$this->otro_redes_r',estado_trabajo_r='$this->estado_trabajo_r', 
		municipio_trabajo_r='$this->municipio_trabajo_r',urb_trabajo_r='$this->urb_trabajo_r' , calle_trabajo_r='$this->calle_trabajo_r', casa_trabajo_r='$this->casa_trabajo_r',
		piso_trabajo_r='$this->piso_trabajo_r',apto_trabajo_r='$this->apto_trabajo_r',referencia_trabajo_r='$this->referencia_trabajo_r' , 
		ext_trabajo_r='$this->ext_trabajo_r', contacto_trabajo_r='$this->contacto_trabajo_r',ext2_trabajo_r='$this->ext2_trabajo_r', 
		fecha_nac_r='$this->fecha_nac_r' WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
	function elimrepre() {
		$bd=new conex();
		$bd->conectar();
		$sql="DELETE FROM pstab.representante  WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
}
?>
