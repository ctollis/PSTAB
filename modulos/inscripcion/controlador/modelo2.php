<?php
require_once '../modelo/conex.php';
class estudiante{
private $cedula_estu;
private $nombre;
private $apellido;
private $nacionalidad;
private $edad;
private $sexo;
private $pto_referencia;
private $lugar_nac;
private $pais_nac;
private $municipio;
private $estado;
private $estado_actu;
private $municipio_actu;
private $urb_sector;
private $calle;
private $casa_edif;
private $piso;
private $apto;
private $representante;
private $parentesco;
private $fecha_nacimiento;
private $ano;
	public function buscarestu() {
		$bd=new conex();
		$bd->conectar();
		$sql="SELECT * FROM pstab.estudiante where cedula_estu='$this->cedula_estu'";
		$result=$bd->consulta($sql);
		$data=$bd->row($result);
		return $data;
	}
	public function estudiante($cedula_estu,$nombre,$apellido,$nacionalidad,$edad,$sexo,$pto_referencia,$lugar_nac,$pais_nac,$municipio,$estado, $estado_actu,$municipio_actu,$urb_sector, $calle,$casa_edif,$piso,$apto,$representante,$parentesco,$fecha_nacimiento,$ano)
	{
		$this->cedula_estu=$cedula_estu;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->nacionalidad=$nacionalidad;
		$this->edad=$edad;
		$this->sexo=$sexo;
		$this->pto_referencia=$pto_referencia;
		$this->lugar_nac=$lugar_nac;
		$this->pais_nac=$pais_nac;
		$this->municipio=$municipio;
		$this->estado=$estado;
		$this->estado_actu=$estado_actu;
		$this->municipio_actu=$municipio_actu;
		$this->urb_sector=$urb_sector;
		$this->calle=$calle;
		$this->casa_edif=$casa_edif;
		$this->piso=$piso;
		$this->apto=$apto;
		$this->representante=$representante;
		$this->parentesco=$parentesco;
		$this->fecha_nacimiento=$fecha_nacimiento;
		$this->ano=$ano;
	}
	
	function modestu() {
		$bd=new conex();
		$bd->conectar();
		$sql="UPDATE pstab.estudiante SET nombre='$this->nombre', apellido='$this->apellido', nacionalidad='$this->nacionalidad', edad='$this->edad', sexo='$this->sexo', pto_referencia='$this->pto_referencia', lugar_nac='$this->lugar_nac', pais_nac='$this->pais_nac', municipio='$this->municipio',estado='$this->estado', estado_actu='$this->estado_actu', municipio_actu='$this->municipio_actu', urb_sector='$this->urb_sector', calle='$this->calle', casa_edif='$this->casa_edif', piso='$this->piso', apto='$this->apto',representante='$this->representante', parentesco='$this->parentesco', fecha_nacimiento='$this->fecha_nacimiento', ano='$this->ano' WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
	function elimestu() {
		$bd=new conex();
		$bd->conectar();
		$sql="DELETE FROM pstab.estudiante  WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
}
?>