function cargar2() {
	document.getElementById('cedula_estu').focus();
	document.getElementById('rescota2').style.visibility="hidden";
}
function crearObjetoPeticion()
{
	try {
		req=new XMLHttpRequest();
	} catch(err1) {
		try {
			req=new ActiveXObject("Msxml2.XMLHTTP");
		} catch(err2) {
			try {
				req=new ActiveXObject("Microsoft.XMLHTTP");
			} catch(err3) {
				req=false;
			}
		}
	}
	return req;
}
function BuscarEstudiante(codigo)
{
	var http=crearObjetoPeticion();
	if (http.readyState==4 || http.readyState==0) {
		myRand=parseInt(Math.random()*99999999999999);
		document.getElementById('nombre').value="";
		document.getElementById('apellido').value="";
		document.getElementById('nacionalidad').value="";
		document.getElementById('edad').value="";
		document.getElementById('sexo').value="";
		document.getElementById('pto_referencia').value="";
		document.getElementById('lugar_nac').value="";
		document.getElementById('pais_nac').value="";
		document.getElementById('municipio').value="";
		document.getElementById('estado').value="";
		document.getElementById('estado_actu').value="";
		document.getElementById('municipio_actu').value="";
		document.getElementById('urb_sector').value="";
		document.getElementById('calle').value="";
		document.getElementById('casa_edif').value="";
		document.getElementById('piso').value="";
		document.getElementById('apto').value="";
		document.getElementById('representante').value="";
		document.getElementById('parentesco').value="";
		document.getElementById('fecha_nacimiento').value="";
		document.getElementById('ano').value="";
		document.getElementById('rescota2').style.visibility="hidden";
		http.open("GET","../controlador/buscar2.php?myRand="+myRand+"&cedula_estu="+codigo, true);
		http.onreadystatechange=function(){
			if (http.readyState==4 && http.status==200) { 
				var retorno=http.responseText;
				arrayRetorno=retorno.split("*");
				if (arrayRetorno[1]!=""){
				document.getElementById('rescota2').style.visibility="visible";
				document.getElementById('btn4').style.visibility="visible";
				document.getElementById('btn5').style.visibility="visible";
				document.getElementById('nombre').value=arrayRetorno[1];
				document.getElementById('apellido').value=arrayRetorno[2];
				document.getElementById('nacionalidad').value=arrayRetorno[3];
				document.getElementById('edad').value=arrayRetorno[4];
				document.getElementById('sexo').value=arrayRetorno[5];
				document.getElementById('pto_referencia').value=arrayRetorno[6];
				document.getElementById('lugar_nac').value=arrayRetorno[7];
				document.getElementById('pais_nac').value=arrayRetorno[8];
				document.getElementById('municipio').value=arrayRetorno[9];
				document.getElementById('estado').value=arrayRetorno[10];
				document.getElementById('estado_actu').value=arrayRetorno[11];
				document.getElementById('municipio_actu').value=arrayRetorno[12];
				document.getElementById('urb_sector').value=arrayRetorno[13];
				document.getElementById('calle').value=arrayRetorno[14];
				document.getElementById('casa_edif').value=arrayRetorno[15];
				document.getElementById('piso').value=arrayRetorno[16];
				document.getElementById('apto').value=arrayRetorno[17];
				document.getElementById('representante').value=arrayRetorno[18];
				document.getElementById('parentesco').value=arrayRetorno[19];
				document.getElementById('fecha_nacimiento').value=arrayRetorno[20];
				document.getElementById('ano').value=arrayRetorno[21];

				}
				else {
				document.getElementById('rescota2').style.visibility="visible";
				document.getElementById('btn4').style.visibility="hidden";
				document.getElementById('btn5').style.visibility="hidden";								
				}
			}
					};
		http.setRequestHeader("Content-Type","application/x-www-formurlencoded");
		http.send(null);
	}
}




