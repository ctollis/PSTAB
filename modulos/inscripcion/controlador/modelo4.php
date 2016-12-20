<?php
require_once '../modelo/conex.php';
class padre{
private $cedula_estu;
private $cedula_p;
private $nombre_p;
private $apellido_p;
private $lugar_nac_p;
private $municipio_nac_p;
private $estado_nac_p;
private $nacionalidad_p;
private $sexo_p;
private $pais_p;
private $pto_referencia_p;
private $telefono_hab_p;
private $telefono_cel_p;
private $email_p;
private $redes_sociales_p;
private $trabajo_p;
private $profesion_p;
private $ingreso_mensual_p;
private $jornada_laboral_p;
private $empresa_trabajo_p;
private $telefono_trabajo_p;
private $estado_actu_p;
private $municipio_actu_p;
private $urb_actu_p;
private $calle_actu_p;
private $casa_edif_p;
private $piso_p;
private $apto_p;
private $otro_redes_p;
private $estado_trabajo_p;
private $municipio_trabajo_p;
private $urb_trabajo_p;
private $calle_trabajo_p;
private $casa_trabajo_p;
private $piso_trabajo_p;
private $apto_trabajo_p;
private $referencia_trabajo_p;
private $ext_trabajo_p;
private $ext2_trabajo_p;
private $pin_p;
private $contacto_trabajo_p;
private $fecha_nac_p;

	public function buscarpa() {
		$bd=new conex();
		$bd->conectar();
		$sql="SELECT * FROM pstab.padre where cedula_estu='$this->cedula_estu'";
		$result=$bd->consulta($sql);
		$data=$bd->row($result);
		return $data;
	}
	public function padre($cedula_estu, $cedula_p, $nombre_p, $apellido_p, $lugar_nac_p, $municipio_nac_p, $estado_nac_p, $nacionalidad_p, $sexo_p, $pais_p, $pto_referencia_p, 
$telefono_hab_p, $telefono_cel_p, $email_p, $redes_sociales_p, $trabajo_p, $profesion_p, $ingreso_mensual_p, $jornada_laboral_p, $empresa_trabajo_p, $telefono_trabajo_p,
$estado_actu_p, $municipio_actu_p, $urb_actu_p, $calle_actu_p, $casa_edif_p, $piso_p, $apto_p, $otro_redes_p, $estado_trabajo_p, $municipio_trabajo_p, $urb_trabajo_p,
$calle_trabajo_p, $casa_trabajo_p, $piso_trabajo_p, $apto_trabajo_p, $referencia_trabajo_p, $ext_trabajo_p, $ext2_trabajo_p, $pin_p, $contacto_trabajo_p, $fecha_nac_p)
	{
		$this->cedula_estu=$cedula_estu;
		$this->cedula_p=$cedula_p;
		$this->nombre_p=$nombre_p;
		$this->apellido_p=$apellido_p;
		$this->lugar_nac_p=$lugar_nac_p;
		$this->municipio_nac_p=$municipio_nac_p;
		$this->estado_nac_p=$estado_nac_p;
		$this->nacionalidad_p=$nacionalidad_p;
		$this->sexo_p=$sexo_p;
		$this->pais_p=$pais_p;
		$this->pto_referencia_p=$pto_referencia_p;
		$this->telefono_hab_p=$telefono_hab_p;
		$this->telefono_cel_p=$telefono_cel_p;
		$this->email_p=$email_p;
		$this->redes_sociales_p=$redes_sociales_p;
		$this->trabajo_p=$trabajo_p;
		$this->profesion_p=$profesion_p;
		$this->ingreso_mensual_p=$ingreso_mensual_p;
		$this->jornada_laboral_p=$jornada_laboral_p;
		$this->empresa_trabajo_p=$empresa_trabajo_p;
		$this->telefono_trabajo_p=$telefono_trabajo_p;
		$this->estado_actu_p=$estado_actu_p;
		$this->municipio_actu_p=$municipio_actu_p;
		$this->urb_actu_p=$urb_actu_p;
		$this->calle_actu_p=$calle_actu_p;
		$this->casa_edif_p=$casa_edif_p;
		$this->piso_p=$piso_p;
		$this->apto_p=$apto_p;
		$this->otro_redes_p=$otro_redes_p;
		$this->estado_trabajo_p=$estado_trabajo_p;
		$this->municipio_trabajo_p=$municipio_trabajo_p;
		$this->urb_trabajo_p=$urb_trabajo_p;
		$this->calle_trabajo_p=$calle_trabajo_p;
		$this->casa_trabajo_p=$casa_trabajo_p;
		$this->piso_trabajo_p=$piso_trabajo_p;
		$this->apto_trabajo_p=$apto_trabajo_p;
		$this->referencia_trabajo_p=$referencia_trabajo_p;
		$this->ext_trabajo_p=$ext_trabajo_p;
		$this->ext2_trabajo_p=$ext2_trabajo_p;
		$this->pin_p=$pin_p;
		$this->contacto_trabajo_p=$contacto_trabajo_p;
		$this->fecha_nac_p=$fecha_nac_p;

	}

	function modpadre() {
		$bd=new conex();
		$bd->conectar();
		$sql="UPDATE pstab.padre SET cedula_p='$this->cedula_p', nombre_p='$this->nombre_p', apellido_p='$this->apellido_p',
		lugar_nac_p='$this->lugar_nac_p',municipio_nac_p='$this->municipio_nac_p',estado_nac_p='$this->estado_nac_p' , nacionalidad_p='$this->nacionalidad_p', sexo_p='$this->sexo_p',
		pais_p='$this->pais_p',pto_referencia_p='$this->pto_referencia_p',telefono_hab_p='$this->telefono_hab_p' , telefono_cel_p='$this->telefono_cel_p', email_p='$this->email_p',
		redes_sociales_p='$this->redes_sociales_p',trabajo_p='$this->trabajo_p',profesion_p='$this->profesion_p' , ingreso_mensual_p='$this->ingreso_mensual_p', jornada_laboral_p='$this->jornada_laboral_p',
		empresa_trabajo_p='$this->empresa_trabajo_p', telefono_trabajo_p='$this->telefono_trabajo_p',estado_actu_p='$this->estado_actu_p',
		municipio_actu_p='$this->municipio_actu_p',urb_actu_p='$this->urb_actu_p',calle_actu_p='$this->calle_actu_p',casa_edif_p='$this->casa_edif_p',
		piso_p='$this->piso_p', apto_p='$this->apto_p' , otro_redes_p='$this->otro_redes_p',estado_trabajo_p='$this->estado_trabajo_p', 
		municipio_trabajo_p='$this->municipio_trabajo_p',urb_trabajo_p='$this->urb_trabajo_p' ,calle_trabajo_p='$this->calle_trabajo_p', casa_trabajo_p='$this->casa_trabajo_p',
		piso_trabajo_p='$this->piso_trabajo_p',apto_trabajo_p='$this->apto_trabajo_p',referencia_trabajo_p='$this->referencia_trabajo_p' , 
		ext_trabajo_p='$this->ext_trabajo_p', ext2_trabajo_p='$this->ext2_trabajo_p',pin_p='$this->pin_p', 
		contacto_trabajo_p='$this->contacto_trabajo_p',fecha_nac_p='$this->fecha_nac_p' WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
	function elimpadre() {
		$bd=new conex();
		$bd->conectar();
		$sql="DELETE FROM pstab.padre  WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
}
?>
