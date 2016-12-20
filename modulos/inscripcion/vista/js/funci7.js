function cargar7() {
	document.getElementById('cedula_estu').focus();
	document.getElementById('rescota7').style.visibility="hidden";
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
function BuscarSalud(codigo)
{
	var http=crearObjetoPeticion();
	if (http.readyState==4 || http.readyState==0) {
		myRand=parseInt(Math.random()*99999999999999);
		document.getElementById('grupo_sang').value="";		
		document.getElementById('talla').value="";
		document.getElementById('peso').value="";
		document.getElementById('padece_enfermedad').value="";
		document.getElementById('diversidad_funcional').value="";
		document.getElementById('operaciones').value="";
		document.getElementById('alergias_alimentos').value="";
		document.getElementById('alim_trata_espe').value="";
		document.getElementById('vacunas').value="";
		document.getElementById('enfermedades_padecidas').value="";
		document.getElementById('factor_rh').value="";
		document.getElementById('especifique_enfermedad').value="";
		document.getElementById('especifique_diversidad').value="";		
		document.getElementById('especifique_operacion').value="";
		document.getElementById('especifique_alergia_alimento').value="";
		document.getElementById('alergias_medicamentos').value="";
		document.getElementById('especifique_alergia_medicamento').value="";
		document.getElementById('alergias_otros').value="";
		document.getElementById('especifique_alergia_otros').value="";
		document.getElementById('especifique_alimentacion').value="";
		document.getElementById('otros_vacuna').value="";
		document.getElementById('especifique_enfermedades_padecidas').value="";
		document.getElementById('otros_enfermedades').value="";
		document.getElementById('rescota7').style.visibility="hidden";
		http.open("GET","../controlador/buscar7.php?myRand="+myRand+"&cedula_estu="+codigo, true);
		http.onreadystatechange=function(){
			if (http.readyState==4 && http.status==200) { 
				var retorno=http.responseText;
				arrayRetorno=retorno.split("*");
				if (arrayRetorno[1]!=""){
				document.getElementById('rescota7').style.visibility="visible";
				document.getElementById('btn14').style.visibility="visible";
				document.getElementById('btn15').style.visibility="visible";
				document.getElementById('grupo_sang').value=arrayRetorno[1];
				document.getElementById('talla').value=arrayRetorno[2];
				document.getElementById('peso').value=arrayRetorno[3];
				document.getElementById('padece_enfermedad').value=arrayRetorno[4];
				document.getElementById('diversidad_funcional').value=arrayRetorno[5];	
				document.getElementById('operaciones').value=arrayRetorno[6];				
				document.getElementById('alergias_alimentos').value=arrayRetorno[7];
				document.getElementById('alim_trata_espe').value=arrayRetorno[8];
				document.getElementById('vacunas').value=arrayRetorno[9];
				document.getElementById('enfermedades_padecidas').value=arrayRetorno[10];
				document.getElementById('factor_rh').value=arrayRetorno[11];
                document.getElementById('especifique_enfermedad').value=arrayRetorno[12];
				document.getElementById('especifique_diversidad').value=arrayRetorno[13];
				document.getElementById('especifique_operacion').value=arrayRetorno[14];
				document.getElementById('especifique_alergia_alimento').value=arrayRetorno[15];
				document.getElementById('alergias_medicamentos').value=arrayRetorno[16];
				document.getElementById('especifique_alergia_medicamento').value=arrayRetorno[17];	
				document.getElementById('alergias_otros').value=arrayRetorno[18];				
				document.getElementById('especifique_alergia_otros').value=arrayRetorno[19];
				document.getElementById('especifique_alimentacion').value=arrayRetorno[20];
				document.getElementById('otros_vacuna').value=arrayRetorno[21];
				document.getElementById('especifique_enfermedades_padecidas').value=arrayRetorno[22];
				document.getElementById('otros_enfermedades').value=arrayRetorno[23];
				
				}
				else {
				document.getElementById('rescota7').style.visibility="visible";
				document.getElementById('btn14').style.visibility="hidden";
				document.getElementById('btn15').style.visibility="hidden";								
				}
			}
					};
		http.setRequestHeader("Content-Type","application/x-www-formurlencoded");
		http.send(null);
	}
}
