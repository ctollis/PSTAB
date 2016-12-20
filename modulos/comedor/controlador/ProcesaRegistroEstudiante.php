<?php 
session_start();
require_once("../modelo/modeloComedor.php");
?>

<html> 
<head>
<title>Procesa Formulario</title>
</head>
<body>
  


<?php
$cedula_estu_com=$_POST["cedula"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$grado=$_POST["grado"];

$comedor = new Comedor();

$cnn=$comedor->conectaBd();
if (!$cnn) { // Si la Conexion  Falla
   $Usuario->controlError(1,$cnn);
   exit();
}	      

$comprobacion=$comedor->ejecutaQuery("SELECT * FROM pstab.lista_comedor where cedula_estu_com='$cedula_estu_com'");
	$existe=$comedor->recibeRegistro($comprobacion);
	if($existe!=""){
	echo "<script type='text/javascript'> 
		alert('Estudiante ya existe, verifique los datos!');
        location='../vista/Comedor.php'
        </script>";
	} 

  else{     
  //echo "'$cedula_estu_com','$nombre', '$apellido', '$grado'";
    $Consulta=$comedor->ejecutaQuery("INSERT INTO pstab.lista_comedor (cedula_estu_com, nombre, apellido, grado, estado) VALUES ('$cedula_estu_com','$nombre', '$apellido', '$grado', 'Activo')"); //Ejecuta el Query en la Base de Datos
      if (!$Consulta) { // Si No se Ejecuta el Query
 	    $comedor->mensajesError(2,$cnn);
   	  exit();
    }
    else
	   echo "<script type='text/javascript'> 
		      alert('Estudiante Registrado exitosamente!');
          location='../vista/comedor.php'
          </script>";
  } 	
$Usuario->cierraConexionBd($cnn); //Cierra la conexion con la Base de Datos
?>
  

</table>
</form>
</body>
</html>