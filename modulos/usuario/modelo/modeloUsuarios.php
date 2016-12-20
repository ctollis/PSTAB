<?php
class Usuario{

    private $servidor='localhost'; 
    private $usuario='postgres'; 
    private $password='123456'; 
    private $basedatos='pstab';
	private $port = '5432';
     var $cnn;
	 var $consulta;
	 var $sql;
	 var $registro;
	 var $cantRegistros;
	 var $tipoError;
	 var $mensajeError;
	 
    function conectaBD(){
		$this->cnn = pg_connect("host=$this->servidor dbname=$this->basedatos user=$this->usuario password=$this->password port=$this->port");
		return($this->cnn);
	}  
	function ejecutaQuery($strsql){	                   
	    $this->sql=$strsql;
		$this->consulta= pg_query($this->sql); 	
		return($this->consulta);
	}
	function recibeRegistro($xconsulta){
	    $this->consulta=$xconsulta;
		$this->registro = pg_fetch_array($this->consulta);
		return($this->registro);
	}  
	
	function cuentaRegistro($xconsulta){
	    $this->consulta=$xconsulta;
		$this->cantRegistros = pg_num_rows($this->consulta);
		return($this->cantRegistros);
	}

	function redireccionar($url){ 
	ob_start();   // Se utiliza para solucionar el error de  headers already sent 
	$host=$_SERVER['HTTP_HOST'];  //Devuelve la direccion web
	//echo "Host: ".$host."<br>";
	$uri=rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); //Devuelve el Directorio desde donde se esta ejecutando la pagina que invoca la funcion.
	//echo "Uri: ".$uri."<br>";
	header("Location: http://$host$uri/$url"); //Redirecciona a la Pagina Solicitada
	ob_flush();  // Se utiliza para solucionar el error de  headers already sent 
	}
	
	function mensajesError($tipomensaje, $conexion){
	    $this->tipoError=$tipomensaje;
		$this->consulta=$consulta;
	    switch ($this->tipoError){
			case 1:
				$this->mensajeError="¡No es Posible Establecer Conexion con el Servidor.!";
				break;
			case 2:
				$this->mensajeError="¡Error al Ejecutar el Query Sql!.";
				break;	
			case 3:
			$this->mensajeError="¡Usuario ya existe!.";
				break; 	
		} 
		$this->cnn=$conexion;
		pg_close($this->cnn);
		echo $this->mensajeError;		
	} 
    function cierraConexionBD($conexion){
	    $this->cnn=$conexion;
		pg_close($this->cnn);	
	}  	
}
?>
