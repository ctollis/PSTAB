<?php
session_start();
require_once("../modelo/modeloEstadisticas.php");
if (isset($_SESSION['cedula'])){ 
    $UsuarioActivo = $_SESSION['cedula'];  
    $NombreUsuarioActivo = $_SESSION['username'];
}

//para datos estadisticos
$docente=$_GET['docente'];
$grado=$_GET['grado'];
$seccion=$_GET['seccion'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];

//echo "$docente, $grado, $seccion, $mes, $ano";


$estadistica= new Estadisticas();

$cnn=$estadistica->conectaBD();
if (!$cnn) { // Si la Conexion  Falla
   $estadistica->mensajesError(1,$cnn);
   exit();
}

//Ciclo para recibir y almacenar datos del formulario
$i=1;
foreach($_POST as $nombre => $valor )
{
	//$a = substr($nombre, 0,5);
	//echo $a;
	if (substr($nombre, 0,6)=="nombre")
		$var1 = $valor;
	if (substr($nombre, 0,2)=="fn")
		$var2 = $valor;
	if (substr($nombre, 0,5)=="lugar")
		$var3 = $valor;
	if (substr($nombre, 0,4)=="edad")
		$var4 = $valor;
	if (substr($nombre, 0,4)=="sexo")
		$var5 = $valor;
	if (substr($nombre, 0,5)=="fecha")
		$var6 = $valor;
	if (substr($nombre, 0,6)=="motivo")
		$var7 = $valor;
	
	$i = $i + 1;
	if ($i==8)
	{	
		//echo "INSERT INTO pstab.ingresos VALUES ($var1,$var2,$var3,$var4,$var5,$var6,$var7)<br>";
		if ($var1!="" && $var2!="" && $var3!="" && $var4!="" && $var5!="" && $var6!="" &&$var7!="" ) {
		$Consulta=$estadistica->ejecutaQuery("INSERT INTO pstab.ingresos(nombre_apellido_i, f_n, lugar_nacimiento_i, edad, sexo, fecha, motivo, docente, grado, seccion, mes, ano) VALUES ('$var1' , '$var2' , '$var3' , '$var4' , '$var5' ,' $var6' , '$var7', '$docente', '$grado', '$seccion', '$mes', '$ano')");
			$i=1;
			if (!$Consulta) {
			   $estadistica->mensajesError(2,$cnn);
			   exit();
			}else{
	 		echo "<script type='text/javascript'> 
				alert('Datos estadisticos registrados satisfactoriamente!');
        		location='../vista/registroEgresos.php?docente=$docente&grado=$grado&seccion=$seccion&mes=$mes&ano=$ano'
        		</script>";	
	 		//$comedor->cierraConexionBd($cnn);
	 		}
		}
		else{
			
	 		echo "<script type='text/javascript'> 
				alert('Datos estadisticos registrados satisfactoriamente!');
        		location='../vista/registroEgresos.php?docente=$docente&grado=$grado&seccion=$seccion&mes=$mes&ano=$ano'
        		</script>";	
	 		//$comedor->cierraConexionBd($cnn);
	 		}
	}
}

//echo $nombre.": ". $valor

?>