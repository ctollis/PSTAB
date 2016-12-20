<?php
	class conex{
		private $user;
		private $clave;
		private $servidor;
		private $db;
		private $port;
		private $conex;
			function conex(){
				$this->user="postgres";
				$this->clave="123456";
				$this->servidor="localhost";
				$this->db="pstab";
				$this->port="5432";
				$this->conex='';
				}
			function conectar(){
				$this->conex=pg_connect("host=".$this->servidor." port=".$this->port." password=".$this->clave." user=".$this->user." dbname=".$this->db."") or die ("Error de Conexion");
return $this->conex;
}
			function consulta($pconsulta){
				$query=pg_query($this->conex, $pconsulta);
				return $query;
				}
			function row($pconsulta){
				$mostrar=pg_fetch_assoc($pconsulta);
				return $mostrar;
				}
			function cerrar(){
				$this->conex=pg_close($this->conex);
				return $this->conex;
				}
}
?>
