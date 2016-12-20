function cargar6() {
	document.getElementById('cedula_estu').focus();
	document.getElementById('rescota6').style.visibility="hidden";
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
function BuscarSocioeco(codigo)
{
	var http=crearObjetoPeticion();
	if (http.readyState==4 || http.readyState==0) {
		myRand=parseInt(Math.random()*99999999999999);
		document.getElementById('vive_con').value="";		
		document.getElementById('beca').value="";
		document.getElementById('medio_traslado_plantel').value="";
		document.getElementById('se_retira_solo_plantel').value="";
		document.getElementById('n_hermanos').value="";
		document.getElementById('datos_vivienda').value="";
		document.getElementById('otros_vive').value="";
		document.getElementById('especifique_beca').value="";
		document.getElementById('otros_ruta').value="";
		document.getElementById('hermanos_en_plantel').value="";
		document.getElementById('especifique_grado_hermano').value="";
		document.getElementById('otros_datos_vivienda').value="";
		document.getElementById('rescota6').style.visibility="hidden";
		http.open("GET","../controlador/buscar6.php?myRand="+myRand+"&cedula_estu="+codigo, true);
		http.onreadystatechange=function(){
			if (http.readyState==4 && http.status==200) { 
				var retorno=http.responseText;
				arrayRetorno=retorno.split("*");
				if (arrayRetorno[1]!=""){
				document.getElementById('rescota6').style.visibility="visible";
				document.getElementById('btn12').style.visibility="visible";
				document.getElementById('btn13').style.visibility="visible";
				document.getElementById('vive_con').value=arrayRetorno[1];
				document.getElementById('beca').value=arrayRetorno[2];
				document.getElementById('medio_traslado_plantel').value=arrayRetorno[3];
				document.getElementById('se_retira_solo_plantel').value=arrayRetorno[4];
				document.getElementById('n_hermanos').value=arrayRetorno[5];	
				document.getElementById('datos_vivienda').value=arrayRetorno[6];				
				document.getElementById('otros_vive').value=arrayRetorno[7];
				document.getElementById('especifique_beca').value=arrayRetorno[8];
				document.getElementById('otros_ruta').value=arrayRetorno[9];
				document.getElementById('hermanos_en_plantel').value=arrayRetorno[10];
				document.getElementById('especifique_grado_hermano').value=arrayRetorno[11];
                document.getElementById('otros_datos_vivienda').value=arrayRetorno[12];
				
				}
				else {
				document.getElementById('rescota6').style.visibility="visible";
				document.getElementById('btn12').style.visibility="hidden";
				document.getElementById('btn13').style.visibility="hidden";								
				}
			}
					};
		http.setRequestHeader("Content-Type","application/x-www-formurlencoded");
		http.send(null);
	}
}
