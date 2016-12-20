<?php
require_once '../modelo/conex.php';
class madre{
private $cedula_estu;
private $cedula_m;
private $nombre_m;
private $apellido_m;
private $lugar_nac_m;
private $municipio_nac_m;
private $estado_nac_m;
private $nacionalidad_m;
private $sexo_m;
private $pais_m;
private $pto_referencia_m;
private $telefono_hab_m;
private $telefono_cel_m;
private $email_m;
private $redes_sociales_m;
private $trabajo_m;
private $profesion_m;
private $ingreso_mensual_m;
private $jornada_laboral_m;
private $empresa_trabajo_m;
private $telefono_trabajo_m;
private $estado_actu_m;
private $municipio_actu_m;
private $urb_actu_m;
private $calle_actu_m;
private $casa_edif_m;
private $piso_m;
private $apto_m;
private $pin_m;
private $otro_redes_m;
private $estado_trabajo_m;
private $municipio_trabajo_m;
private $urb_trabajo_m;
private $calle_trabajo_m;
private $casa_trabajo_m;
private $piso_trabajo_m;
private $apto_trabajo_m;
private $referencia_trabajo_m;
private $ext_trabajo_m;
private $ext2_trabajo_m;
private $contacto_trabajo_m;
private $fecha_nac_m;

	public function buscarma() {
		$bd=new conex();
		$bd->conectar();
		$sql="SELECT * FROM pstab.madre where cedula_estu='$this->cedula_estu'";
		$result=$bd->consulta($sql);
		$data=$bd->row($result);
		return $data;
	}
	public function madre($cedula_estu, $cedula_m, $nombre_m, $apellido_m, $lugar_nac_m, $municipio_nac_m, $estado_nac_m, $nacionalidad_m, $sexo_m, $pais_m, $pto_referencia_m, 
$telefono_hab_m, $telefono_cel_m, $email_m, $redes_sociales_m, $trabajo_m, $profesion_m, $ingreso_mensual_m, $jornada_laboral_m, $empresa_trabajo_m, $telefono_trabajo_m,
$estado_actu_m, $municipio_actu_m, $urb_actu_m, $calle_actu_m, $casa_edif_m, $piso_m, $apto_m, $pin_m, $otro_redes_m, $estado_trabajo_m, $municipio_trabajo_m, $urb_trabajo_m,
$calle_trabajo_m, $casa_trabajo_m, $piso_trabajo_m, $apto_trabajo_m, $referencia_trabajo_m, $ext_trabajo_m, $ext2_trabajo_m, $contacto_trabajo_m, $fecha_nac_m)
	{
		$this->cedula_estu=$cedula_estu;
		$this->cedula_m=$cedula_m;
		$this->nombre_m=$nombre_m;
		$this->apellido_m=$apellido_m;
		$this->lugar_nac_m=$lugar_nac_m;
		$this->municipio_nac_m=$municipio_nac_m;
		$this->estado_nac_m=$estado_nac_m;
		$this->nacionalidad_m=$nacionalidad_m;
		$this->sexo_m=$sexo_m;
		$this->pais_m=$pais_m;
		$this->pto_referencia_m=$pto_referencia_m;
		$this->telefono_hab_m=$telefono_hab_m;
		$this->telefono_cel_m=$telefono_cel_m;
		$this->email_m=$email_m;
		$this->redes_sociales_m=$redes_sociales_m;
		$this->trabajo_m=$trabajo_m;
		$this->profesion_m=$profesion_m;
		$this->ingreso_mensual_m=$ingreso_mensual_m;
		$this->jornada_laboral_m=$jornada_laboral_m;
		$this->empresa_trabajo_m=$empresa_trabajo_m;
		$this->telefono_trabajo_m=$telefono_trabajo_m;
		$this->estado_actu_m=$estado_actu_m;
		$this->municipio_actu_m=$municipio_actu_m;
		$this->urb_actu_m=$urb_actu_m;
		$this->calle_actu_m=$calle_actu_m;
	    $this->casa_edif_m=$casa_edif_m;
		$this->piso_m=$piso_m;
		$this->apto_m=$apto_m;
		$this->pin_m=$pin_m;
		$this->otro_redes_m=$otro_redes_m;
		$this->estado_trabajo_m=$estado_trabajo_m;
		$this->municipio_trabajo_m=$municipio_trabajo_m;
		$this->urb_trabajo_m=$urb_trabajo_m;
		$this->calle_trabajo_m=$calle_trabajo_m;
		$this->casa_trabajo_m=$casa_trabajo_m;
		$this->piso_trabajo_m=$piso_trabajo_m;
		$this->apto_trabajo_m=$apto_trabajo_m;
		$this->referencia_trabajo_m=$referencia_trabajo_m;
		$this->ext_trabajo_m=$ext_trabajo_m;
		$this->ext2_trabajo_m=$ext2_trabajo_m;
		$this->contacto_trabajo_m=$contacto_trabajo_m;
		$this->fecha_nac_m=$fecha_nac_m;

	}

	function modmadre() {
		$bd=new conex();
		$bd->conectar();
		$sql="UPDATE pstab.madre SET cedula_m='$this->cedula_m', nombre_m='$this->nombre_m', apellido_m='$this->apellido_m',
		lugar_nac_m='$this->lugar_nac_m',municipio_nac_m='$this->municipio_nac_m',estado_nac_m='$this->estado_nac_m' , nacionalidad_m='$this->nacionalidad_m', 
		sexo_m='$this->sexo_m',pais_m='$this->pais_m',pto_referencia_m='$this->pto_referencia_m',telefono_hab_m='$this->telefono_hab_m' , 
		telefono_cel_m='$this->telefono_cel_m', email_m='$this->email_m',redes_sociales_m='$this->redes_sociales_m',trabajo_m='$this->trabajo_m',
		profesion_m='$this->profesion_m' , ingreso_mensual_m='$this->ingreso_mensual_m', jornada_laboral_m='$this->jornada_laboral_m',
		empresa_trabajo_m='$this->empresa_trabajo_m', telefono_trabajo_m='$this->telefono_trabajo_m',estado_actu_m='$this->estado_actu_m',
		municipio_actu_m='$this->municipio_actu_m',urb_actu_m='$this->urb_actu_m',calle_actu_m='$this->calle_actu_m',casa_edif_m='$this->casa_edif_m',
		piso_m='$this->piso_m',apto_m='$this->apto_m' , pin_m='$this->pin_m', otro_redes_m='$this->otro_redes_m',estado_trabajo_m='$this->estado_trabajo_m',
		municipio_trabajo_m='$this->municipio_trabajo_m',urb_trabajo_m='$this->urb_trabajo_m' , calle_trabajo_m='$this->calle_trabajo_m', 
		casa_trabajo_m='$this->casa_trabajo_m',piso_trabajo_m='$this->piso_trabajo_m',apto_trabajo_m='$this->apto_trabajo_m',
		referencia_trabajo_m='$this->referencia_trabajo_m' ,ext_trabajo_m='$this->ext_trabajo_m', ext2_trabajo_m='$this->ext2_trabajo_m',
		contacto_trabajo_m='$this->contacto_trabajo_m',fecha_nac_m='$this->fecha_nac_m' WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
	function elimadre() {
		$bd=new conex();
		$bd->conectar();
		$sql="DELETE FROM pstab.madre  WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
}
?>
