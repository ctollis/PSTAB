function cargar() {
	document.getElementById('cedula_estu').focus();
	document.getElementById('rescota').style.visibility="hidden";
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
function BuscarInscripcion(codigo)
{
	var http=crearObjetoPeticion();
	if (http.readyState==4 || http.readyState==0) {
		myRand=parseInt(Math.random()*99999999999999);
	
		http.open("GET","../controlador/buscar.php?myRand="+myRand+"&cedula_estu="+codigo, true);
		http.onreadystatechange=function(){
			if (http.readyState==4 && http.status==200) { 
				var retorno=http.responseText;
				arrayRetorno=retorno.split("*");
				if (arrayRetorno[1]!=""){
				document.getElementById('rescota').style.visibility="visible";
				document.getElementById('ano_escolar').value=arrayRetorno[1];
				document.getElementById('grado_actual').value=arrayRetorno[2];
				document.getElementById('seccion_actual').value=arrayRetorno[3];
				document.getElementById('repite').value=arrayRetorno[4];
				document.getElementById('grado_cursar').value=arrayRetorno[5];
				document.getElementById('fecha_inscripcion').value=arrayRetorno[6];

				}
				else {
				 
	
						
				}
			}
					};
		http.setRequestHeader("Content-Type","application/x-www-formurlencoded");
		http.send(null);
	}
}

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



