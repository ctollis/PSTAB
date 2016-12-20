<?php
require_once '../modelo/conex.php';
class otros_datos{
private $cedula_estu;
private $catolico;
private $sacramentos;
private $nombre_apellido_emerg;
private $parentesco_otro;
private $telefono;
private $nombre_apellido_emerg2;
private $parentesco_otro2;
private $telefono2;


	public function buscarotro() {
		$bd=new conex();
		$bd->conectar();
		$sql="SELECT * FROM pstab.otros_datos where cedula_estu='$this->cedula_estu'";
		$result=$bd->consulta($sql);
		$data=$bd->row($result);
		return $data;
	}
	public function otros_datos($cedula_estu, $catolico, $sacramentos, $nombre_apellido_emerg, $parentesco_otro, $telefono, $nombre_apellido_emerg2,
 $parentesco_otro2, $telefono2)
	{
		$this->cedula_estu=$cedula_estu;
		$this->catolico=$catolico;
		$this->sacramentos=$sacramentos;
		$this->nombre_apellido_emerg=$nombre_apellido_emerg;
		$this->parentesco_otro=$parentesco_otro;
		$this->telefono=$telefono;
		$this->nombre_apellido_emerg2=$nombre_apellido_emerg2;
		$this->parentesco_otro2=$parentesco_otro2;
		$this->telefono2=$telefono2;
	

	}

	function modotro() {
		$bd=new conex();
		$bd->conectar();
		$sql="UPDATE pstab.otros_datos SET catolico='$this->catolico', sacramentos='$this->sacramentos', nombre_apellido_emerg='$this->nombre_apellido_emerg',
		parentesco_otro='$this->parentesco_otro',telefono='$this->telefono',nombre_apellido_emerg2='$this->nombre_apellido_emerg2' ,
		parentesco_otro2='$this->parentesco_otro2', telefono2='$this->telefono2';";
		$result=$bd->consulta($sql);
	}
	function elimotro() {
		$bd=new conex();
		$bd->conectar();
		$sql="DELETE FROM pstab.otros_datos  WHERE cedula_estu='$this->cedula_estu';";
		$result=$bd->consulta($sql);
	}
}
?>
