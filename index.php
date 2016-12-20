<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script language="javascript" src="modulos/usuario/vista/js/campos_vacios_index.js"></script>
	<link href="estilos/estilo.css" rel="stylesheet" type="text/css"/>
	<title>UEMAB</title>
</head>

<body Onload="document.getElementById('username').focus()">
	

<form name="FormIndex" method="post" action="modulos/usuario/controlador/ValidaUsuario.php" onSubmit="return validarCampos(this);"> 
<table  id="table-index" border="1" cellpanding="0"  >
	<!-- <tr><td align="center"  id="td-index"> U.E.M. ANDR&EacuteS BELLO </td></tr> -->
	<!-- <tr><td align="center" id="td-index"> UEMAB </td></tr> -->
	 <tr><td><img src="modulos/recursos/logo2.png" id="img_index"></td></tr>
	 <tr>
	 <td id="td-index" align="center"><input type="text" class="form-control" placeholder="Usuario" size="10" maxlength="8" name="username" id="username"></td>
     </tr>	 
	 <tr>
	 <td id="td-index" align="center"><input type="password" class="form-control" placeholder="Contraseña" size="10" maxlength="8" name="clave" ></td> 
	 </tr>
	 <tr><td colspan="2" align='center' id="td-index"><button type="submit" class="submit" name="submit">Iniciar Sesi&oacuten</button>
	 </tr>	
	
</table>

</form> 
</body>
</html>


