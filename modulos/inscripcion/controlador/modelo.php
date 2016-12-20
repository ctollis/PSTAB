<?php
require_once '../modelo/conex.php';
class inscripcion{
private $cedula_estu;
private $ano_escolar;
private $grado_actual;
private $seccion_actual;
private $repite;
private $grado_cursar;
private $fecha_inscripcion;

	public function buscaralumno() {
		$bd=new conex();
		$bd->conectar();
		$sql="SELECT * FROM pstab.inscripcion where cedula_estu='$this->cedula_estu'";
		$result=$bd->consulta($sql);
		$data=$bd->row($result);
		return $data;
	
	}
	public function inscripcion($cedula_estu,$ano_escolar, $grado_actual,$seccion_actual,$repite,$grado_cursar, $fecha_inscripcion)
	{
		$this->cedula_estu=$cedula_estu;
		$this->ano_escolar=$ano_escolar;
		$this->grado_actual=$grado_actual;
		$this->seccion_actual=$seccion_actual;
		$this->repite=$repite;
		$this->grado_cursar=$grado_cursar;
		$this->fecha_inscripcion=$fecha_inscripcion;

	}

	function modalumno() {
		$bd=new conex();
		$bd->conectar();
		$sql="UPDATE pstab.inscripcion SET ano_escolar='$this->ano_escolar', grado_actual='$this->grado_actual', seccion_actual='$this->seccion_actual',  repite='$this->repite',grado_cursar='$this->grado_cursar',fecha_inscripcion='$this->fecha_inscripcion' WHERE cedula_estu='$this->cedula_estu';";
		
		$result=$bd->consulta($sql);
	}
	function elimalumno() {
		$bd=new conex();
		$bd->conectar();
		$sql="DELETE FROM pstab.inscripcion  WHERE cedula_estu='$this->cedula_estu';";
		
		$result=$bd->consulta($sql);
	}
}
?>
