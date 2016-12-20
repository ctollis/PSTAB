function cargar8() {
	document.getElementById('cedula_estu').focus();
	document.getElementById('rescota8').style.visibility="hidden";
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
function BuscarOtros(codigo)
{
	var http=crearObjetoPeticion();
	if (http.readyState==4 || http.readyState==0) {
		myRand=parseInt(Math.random()*99999999999999);
		document.getElementById('catolico').value="";		
		document.getElementById('sacramentos').value="";
		document.getElementById('nombre_apellido_emerg').value="";
		document.getElementById('parentesco_otro').value="";
		document.getElementById('telefono').value="";
		document.getElementById('nombre_apellido_emerg2').value="";
		document.getElementById('parentesco_otro2').value="";
		document.getElementById('telefono2').value="";
		document.getElementById('rescota8').style.visibility="hidden";
		http.open("GET","../controlador/buscar8.php?myRand="+myRand+"&cedula_estu="+codigo, true);
		http.onreadystatechange=function(){
			if (http.readyState==4 && http.status==200) { 
				var retorno=http.responseText;
				arrayRetorno=retorno.split("*");
				if (arrayRetorno[1]!=""){
				document.getElementById('rescota8').style.visibility="visible";
				document.getElementById('btn16').style.visibility="visible";
				document.getElementById('btn17').style.visibility="visible";
				document.getElementById('catolico').value=arrayRetorno[1];
				document.getElementById('sacramentos').value=arrayRetorno[2];
				document.getElementById('nombre_apellido_emerg').value=arrayRetorno[3];
				document.getElementById('parentesco_otro').value=arrayRetorno[4];
				document.getElementById('telefono').value=arrayRetorno[5];	
				document.getElementById('nombre_apellido_emerg2').value=arrayRetorno[6];				
				document.getElementById('parentesco_otro2').value=arrayRetorno[7];
				document.getElementById('telefono2').value=arrayRetorno[8];
				
				}
				else {
				document.getElementById('rescota8').style.visibility="visible";
				document.getElementById('btn16').style.visibility="hidden";
				document.getElementById('btn17').style.visibility="hidden";								
				}
			}
					};
		http.setRequestHeader("Content-Type","application/x-www-formurlencoded");
		http.send(null);
	}
}