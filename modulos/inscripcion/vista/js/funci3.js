function cargar3() {
	document.getElementById('cedula_estu').focus();
	document.getElementById('rescota3').style.visibility="hidden";
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
function BuscarMadre(codigo)
{
	var http=crearObjetoPeticion();
	if (http.readyState==4 || http.readyState==0) {
		myRand=parseInt(Math.random()*99999999999999);
		document.getElementById('cedula_m').value="";		
		document.getElementById('nombre_m').value="";
		document.getElementById('apellido_m').value="";
		document.getElementById('lugar_nac_m').value="";
		document.getElementById('municipio_nac_m').value="";
		document.getElementById('estado_nac_m').value="";
		document.getElementById('nacionalidad_m').value="";
		document.getElementById('sexo_m').value="";
		document.getElementById('pais_m').value="";
		document.getElementById('pto_referencia_m').value="";
		document.getElementById('telefono_hab_m').value="";
		document.getElementById('telefono_cel_m').value="";
		document.getElementById('email_m').value="";
		document.getElementById('redes_sociales_m').value="";
		document.getElementById('trabajo_m').value="";
		document.getElementById('profesion_m').value="";
		document.getElementById('ingreso_mensual_m').value="";
		document.getElementById('jornada_laboral_m').value="";
		document.getElementById('empresa_trabajo_m').value="";
		document.getElementById('telefono_trabajo_m').value="";
        document.getElementById('estado_actu_m').value="";
		document.getElementById('municipio_actu_m').value="";
		document.getElementById('urb_actu_m').value="";
		document.getElementById('calle_actu_m').value="";
		document.getElementById('casa_edif_m').value="";
		document.getElementById('piso_m').value="";
		document.getElementById('apto_m').value="";
		document.getElementById('pin_m').value="";
		document.getElementById('otro_redes_m').value="";
		document.getElementById('estado_trabajo_m').value="";
		document.getElementById('municipio_trabajo_m').value="";
		document.getElementById('urb_trabajo_m').value="";
		document.getElementById('calle_trabajo_m').value="";
		document.getElementById('casa_trabajo_m').value="";
		document.getElementById('piso_trabajo_m').value="";
		document.getElementById('apto_trabajo_m').value="";
		document.getElementById('referencia_trabajo_m').value="";
		document.getElementById('ext_trabajo_m').value="";
		document.getElementById('ext2_trabajo_m').value="";
		document.getElementById('contacto_trabajo_m').value="";
		document.getElementById('fecha_nac_m').value="";
		document.getElementById('rescota3').style.visibility="hidden";
		http.open("GET","../controlador/buscar3.php?myRand="+myRand+"&cedula_estu="+codigo, true);
		http.onreadystatechange=function(){
			if (http.readyState==4 && http.status==200) { 
				var retorno=http.responseText;
				arrayRetorno=retorno.split("*");
				if (arrayRetorno[1]!=""){
				document.getElementById('rescota3').style.visibility="visible";
				document.getElementById('btn6').style.visibility="visible";
				document.getElementById('btn7').style.visibility="visible";
				document.getElementById('cedula_m').value=arrayRetorno[1];
				document.getElementById('nombre_m').value=arrayRetorno[2];
				document.getElementById('apellido_m').value=arrayRetorno[3];
				document.getElementById('lugar_nac_m').value=arrayRetorno[4];	
				document.getElementById('municipio_nac_m').value=arrayRetorno[5];				
				document.getElementById('estado_nac_m').value=arrayRetorno[6];
				document.getElementById('nacionalidad_m').value=arrayRetorno[7];
				document.getElementById('sexo_m').value=arrayRetorno[8];
				document.getElementById('pais_m').value=arrayRetorno[9];
				document.getElementById('pto_referencia_m').value=arrayRetorno[10];
                document.getElementById('telefono_hab_m').value=arrayRetorno[11];
				document.getElementById('telefono_cel_m').value=arrayRetorno[12];
				document.getElementById('email_m').value=arrayRetorno[13];
				document.getElementById('redes_sociales_m').value=arrayRetorno[14];
                document.getElementById('trabajo_m').value=arrayRetorno[15];
				document.getElementById('profesion_m').value=arrayRetorno[16];
				document.getElementById('ingreso_mensual_m').value=arrayRetorno[17];
				document.getElementById('jornada_laboral_m').value=arrayRetorno[18];
				document.getElementById('empresa_trabajo_m').value=arrayRetorno[19];
				document.getElementById('telefono_trabajo_m').value=arrayRetorno[20];
				document.getElementById('estado_actu_m').value=arrayRetorno[21];
				document.getElementById('municipio_actu_m').value=arrayRetorno[22];
				document.getElementById('urb_actu_m').value=arrayRetorno[23];
				document.getElementById('calle_actu_m').value=arrayRetorno[24];
				document.getElementById('casa_edif_m').value=arrayRetorno[25];
				document.getElementById('piso_m').value=arrayRetorno[26];
				document.getElementById('apto_m').value=arrayRetorno[27];			
				document.getElementById('pin_m').value=arrayRetorno[28];
				document.getElementById('otro_redes_m').value=arrayRetorno[29];
				document.getElementById('estado_trabajo_m').value=arrayRetorno[30];
				document.getElementById('municipio_trabajo_m').value=arrayRetorno[31];
				document.getElementById('urb_trabajo_m').value=arrayRetorno[32];
				document.getElementById('calle_trabajo_m').value=arrayRetorno[33];
				document.getElementById('casa_trabajo_m').value=arrayRetorno[34];
				document.getElementById('piso_trabajo_m').value=arrayRetorno[35];
				document.getElementById('apto_trabajo_m').value=arrayRetorno[36];
				document.getElementById('referencia_trabajo_m').value=arrayRetorno[37];
				document.getElementById('ext_trabajo_m').value=arrayRetorno[38];
				document.getElementById('ext2_trabajo_m').value=arrayRetorno[39];
				document.getElementById('contacto_trabajo_m').value=arrayRetorno[40];
				document.getElementById('fecha_nac_m').value=arrayRetorno[41];
				
				}
				else {
				document.getElementById('rescota3').style.visibility="visible";
				document.getElementById('btn6').style.visibility="hidden";
				document.getElementById('btn7').style.visibility="hidden";								
				}
			}
					};
		http.setRequestHeader("Content-Type","application/x-www-formurlencoded");
		http.send(null);
	}
}
