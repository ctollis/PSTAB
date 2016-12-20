function cargar5() {
	document.getElementById('cedula_estu').focus();
	document.getElementById('rescota5').style.visibility="hidden";
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
function BuscarRepresentante(codigo)
{
	var http=crearObjetoPeticion();
	if (http.readyState==4 || http.readyState==0) {
		myRand=parseInt(Math.random()*99999999999999);
		document.getElementById('cedula_r').value="";		
		document.getElementById('nombre_r').value="";
		document.getElementById('apellido_r').value="";
		document.getElementById('lugar_nac_r').value="";
		document.getElementById('municipio_nac_r').value="";
		document.getElementById('estado_nac_r').value="";
		document.getElementById('nacionalidad_r').value="";
		document.getElementById('sexo_r').value="";
		document.getElementById('pais_r').value="";
		document.getElementById('pto_referencia_r').value="";
		document.getElementById('telefono_hab_r').value="";
		document.getElementById('telefono_cel_r').value="";
		document.getElementById('email_r').value="";
		document.getElementById('redes_sociales_r').value="";
		document.getElementById('trabajo_r').value="";
		document.getElementById('profesion_r').value="";
		document.getElementById('ingreso_mensual_r').value="";
		document.getElementById('jornada_laboral_r').value="";
		document.getElementById('empresa_trabajo_r').value="";
		document.getElementById('telefono_trabajo_r').value="";
        document.getElementById('estado_actu_r').value="";
		document.getElementById('municipio_actu_r').value="";
		document.getElementById('urb_actu_r').value="";
		document.getElementById('calle_actu_r').value="";
		document.getElementById('casa_edif_r').value="";
		document.getElementById('piso_r').value="";
		document.getElementById('apto_r').value="";
		document.getElementById('otro_redes_r').value="";
		document.getElementById('estado_trabajo_r').value="";
		document.getElementById('municipio_trabajo_r').value="";
		document.getElementById('urb_trabajo_r').value="";
		document.getElementById('calle_trabajo_r').value="";
		document.getElementById('casa_trabajo_r').value="";
		document.getElementById('piso_trabajo_r').value="";
		document.getElementById('apto_trabajo_r').value="";
		document.getElementById('referencia_trabajo_r').value="";
		document.getElementById('ext_trabajo_r').value="";
		document.getElementById('ext2_trabajo_r').value="";
		document.getElementById('pin_r').value="";
		document.getElementById('contacto_trabajo_r').value="";
		document.getElementById('fecha_nac_r').value="";
		document.getElementById('rescota5').style.visibility="hidden";
		http.open("GET","../controlador/buscar5.php?myRand="+myRand+"&cedula_estu="+codigo, true);
		http.onreadystatechange=function(){
			if (http.readyState==4 && http.status==200) { 
				var retorno=http.responseText;
				arrayRetorno=retorno.split("*");
				if (arrayRetorno[1]!=""){
				document.getElementById('rescota5').style.visibility="visible";
				document.getElementById('btn10').style.visibility="visible";
				document.getElementById('btn11').style.visibility="visible";
				document.getElementById('cedula_r').value=arrayRetorno[1];
				document.getElementById('nombre_r').value=arrayRetorno[2];
				document.getElementById('apellido_r').value=arrayRetorno[3];
				document.getElementById('lugar_nac_r').value=arrayRetorno[4];	
				document.getElementById('municipio_nac_r').value=arrayRetorno[5];				
				document.getElementById('estado_nac_r').value=arrayRetorno[6];
				document.getElementById('nacionalidad_r').value=arrayRetorno[7];
				document.getElementById('sexo_r').value=arrayRetorno[8];
				document.getElementById('pais_r').value=arrayRetorno[9];
				document.getElementById('pto_referencia_r').value=arrayRetorno[10];
                document.getElementById('telefono_hab_r').value=arrayRetorno[11];
				document.getElementById('telefono_cel_r').value=arrayRetorno[12];
				document.getElementById('email_r').value=arrayRetorno[13];
				document.getElementById('redes_sociales_r').value=arrayRetorno[14];
                document.getElementById('trabajo_r').value=arrayRetorno[15];
				document.getElementById('profesion_r').value=arrayRetorno[16];
				document.getElementById('ingreso_mensual_r').value=arrayRetorno[17];
				document.getElementById('jornada_laboral_r').value=arrayRetorno[18];
				document.getElementById('empresa_trabajo_r').value=arrayRetorno[19];
				document.getElementById('telefono_trabajo_r').value=arrayRetorno[20];
				document.getElementById('estado_actu_r').value=arrayRetorno[21];
				document.getElementById('municipio_actu_r').value=arrayRetorno[22];
				document.getElementById('urb_actu_r').value=arrayRetorno[23];
				document.getElementById('calle_actu_r').value=arrayRetorno[24];
				document.getElementById('casa_edif_r').value=arrayRetorno[25];
				document.getElementById('piso_r').value=arrayRetorno[26];
				document.getElementById('apto_r').value=arrayRetorno[27];
				document.getElementById('pin_r').value=arrayRetorno[28];								
				document.getElementById('otro_redes_r').value=arrayRetorno[29];
				document.getElementById('estado_trabajo_r').value=arrayRetorno[30];
				document.getElementById('municipio_trabajo_r').value=arrayRetorno[31];
				document.getElementById('urb_trabajo_r').value=arrayRetorno[32];
				document.getElementById('calle_trabajo_r').value=arrayRetorno[33];
				document.getElementById('casa_trabajo_r').value=arrayRetorno[34];
				document.getElementById('piso_trabajo_r').value=arrayRetorno[35];
				document.getElementById('apto_trabajo_r').value=arrayRetorno[36];
				document.getElementById('referencia_trabajo_r').value=arrayRetorno[37];
				document.getElementById('ext_trabajo_r').value=arrayRetorno[38];
				document.getElementById('contacto_trabajo_r').value=arrayRetorno[39];
				document.getElementById('ext2_trabajo_r').value=arrayRetorno[40];
				document.getElementById('fecha_nac_r').value=arrayRetorno[41];
				
				}
				else {
				document.getElementById('rescota5').style.visibility="visible";
				document.getElementById('btn10').style.visibility="hidden";
				document.getElementById('btn11').style.visibility="hidden";								
				}
			}
					};
		http.setRequestHeader("Content-Type","application/x-www-formurlencoded");
		http.send(null);
	}
}
