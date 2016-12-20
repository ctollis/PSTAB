function cargar4() {
	document.getElementById('cedula_estu').focus();
	document.getElementById('rescota4').style.visibility="hidden";
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
function BuscarPadre(codigo)
{
	var http=crearObjetoPeticion();
	if (http.readyState==4 || http.readyState==0) {
		myRand=parseInt(Math.random()*99999999999999);
		document.getElementById('cedula_p').value="";		
		document.getElementById('nombre_p').value="";
		document.getElementById('apellido_p').value="";
		document.getElementById('lugar_nac_p').value="";
		document.getElementById('municipio_nac_p').value="";
		document.getElementById('estado_nac_p').value="";
		document.getElementById('nacionalidad_p').value="";
		document.getElementById('sexo_p').value="";
		document.getElementById('pais_p').value="";
		document.getElementById('pto_referencia_p').value="";
		document.getElementById('telefono_hab_p').value="";
		document.getElementById('telefono_cel_p').value="";
		document.getElementById('email_p').value="";
		document.getElementById('redes_sociales_p').value="";
		document.getElementById('trabajo_p').value="";
		document.getElementById('profesion_p').value="";
		document.getElementById('ingreso_mensual_p').value="";
		document.getElementById('jornada_laboral_p').value="";
		document.getElementById('empresa_trabajo_p').value="";
		document.getElementById('telefono_trabajo_p').value="";
        document.getElementById('estado_actu_p').value="";
		document.getElementById('municipio_actu_p').value="";
		document.getElementById('urb_actu_p').value="";
		document.getElementById('calle_actu_p').value="";
		document.getElementById('casa_edif_p').value="";
		document.getElementById('piso_p').value="";
		document.getElementById('apto_p').value="";
		document.getElementById('otro_redes_p').value="";
		document.getElementById('estado_trabajo_p').value="";
		document.getElementById('municipio_trabajo_p').value="";
		document.getElementById('urb_trabajo_p').value="";
		document.getElementById('calle_trabajo_p').value="";
		document.getElementById('casa_trabajo_p').value="";
		document.getElementById('piso_trabajo_p').value="";
		document.getElementById('apto_trabajo_p').value="";
		document.getElementById('referencia_trabajo_p').value="";
		document.getElementById('ext_trabajo_p').value="";
		document.getElementById('ext2_trabajo_p').value="";
		document.getElementById('pin_p').value="";
		document.getElementById('contacto_trabajo_p').value="";
		document.getElementById('fecha_nac_p').value="";
		document.getElementById('rescota4').style.visibility="hidden";
		http.open("GET","../controlador/buscar4.php?myRand="+myRand+"&cedula_estu="+codigo, true);
		http.onreadystatechange=function(){
			if (http.readyState==4 && http.status==200) { 
				var retorno=http.responseText;
				arrayRetorno=retorno.split("*");
				if (arrayRetorno[1]!=""){
				document.getElementById('rescota4').style.visibility="visible";
				document.getElementById('btn8').style.visibility="visible";
				document.getElementById('btn9').style.visibility="visible";
				document.getElementById('cedula_p').value=arrayRetorno[1];
				document.getElementById('nombre_p').value=arrayRetorno[2];
				document.getElementById('apellido_p').value=arrayRetorno[3];
				document.getElementById('lugar_nac_p').value=arrayRetorno[4];	
				document.getElementById('municipio_nac_p').value=arrayRetorno[5];				
				document.getElementById('estado_nac_p').value=arrayRetorno[6];
				document.getElementById('nacionalidad_p').value=arrayRetorno[7];
				document.getElementById('sexo_p').value=arrayRetorno[8];
				document.getElementById('pais_p').value=arrayRetorno[9];
				document.getElementById('pto_referencia_p').value=arrayRetorno[10];
                document.getElementById('telefono_hab_p').value=arrayRetorno[11];
				document.getElementById('telefono_cel_p').value=arrayRetorno[12];
				document.getElementById('email_p').value=arrayRetorno[13];
				document.getElementById('redes_sociales_p').value=arrayRetorno[14];
                document.getElementById('trabajo_p').value=arrayRetorno[15];
				document.getElementById('profesion_p').value=arrayRetorno[16];
				document.getElementById('ingreso_mensual_p').value=arrayRetorno[17];
				document.getElementById('jornada_laboral_p').value=arrayRetorno[18];
				document.getElementById('empresa_trabajo_p').value=arrayRetorno[19];
				document.getElementById('telefono_trabajo_p').value=arrayRetorno[20];
				document.getElementById('estado_actu_p').value=arrayRetorno[21];
				document.getElementById('municipio_actu_p').value=arrayRetorno[22];
				document.getElementById('urb_actu_p').value=arrayRetorno[23];
				document.getElementById('calle_actu_p').value=arrayRetorno[24];
				document.getElementById('casa_edif_p').value=arrayRetorno[25];
				document.getElementById('piso_p').value=arrayRetorno[26];
				document.getElementById('apto_p').value=arrayRetorno[27];			
				document.getElementById('otro_redes_p').value=arrayRetorno[28];
				document.getElementById('estado_trabajo_p').value=arrayRetorno[29];
				document.getElementById('municipio_trabajo_p').value=arrayRetorno[30];
				document.getElementById('urb_trabajo_p').value=arrayRetorno[31];
				document.getElementById('calle_trabajo_p').value=arrayRetorno[32];
				document.getElementById('casa_trabajo_p').value=arrayRetorno[33];
				document.getElementById('piso_trabajo_p').value=arrayRetorno[34];
				document.getElementById('apto_trabajo_p').value=arrayRetorno[35];
				document.getElementById('referencia_trabajo_p').value=arrayRetorno[36];
				document.getElementById('ext_trabajo_p').value=arrayRetorno[37];
				document.getElementById('ext2_trabajo_p').value=arrayRetorno[38];
				document.getElementById('pin_p').value=arrayRetorno[39];				
				document.getElementById('contacto_trabajo_p').value=arrayRetorno[40];
				document.getElementById('fecha_nac_p').value=arrayRetorno[41];
				
				}
				else {
				document.getElementById('rescota4').style.visibility="visible";
				document.getElementById('btn8').style.visibility="hidden";
				document.getElementById('btn9').style.visibility="hidden";								
				}
			}
					};
		http.setRequestHeader("Content-Type","application/x-www-formurlencoded");
		http.send(null);
	}
}
