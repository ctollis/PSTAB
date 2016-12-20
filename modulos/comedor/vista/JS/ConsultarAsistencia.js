function cargar(){
	document.getElementById('fecha').focus();
	document.getElementById('reg_estu_com').style.visibility="hidden";
}

function crearObjetoPeticion()
 {
	try{
		req=new XMLHttpRequest();
	}
	catch (err1){
		try{
			req=new ActiveXObject("Msxml2.XMLHTTP");
		}
	catch(err2){
		try{
			req=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (err3){
			req=false;
		}
	}
	}
	return req;
}

function buscarCota(fecha) {
	var http=crearObjetoPeticion();
	
	if (http.readyState==4 || http.readyState==0){
		myRand=parseInt(Math.random()*99999999);
		/*document.getElementById("titulo").value="";
		document.getElementById("autor").value="";
		document.getElementById("ano").value="";
		document.getElementById("edicion").value="";
		document.getElementById("editorial").value="";
		document.getElementById("cod_area").value="";*/
		document.getElementById("mostrar").style.visibility="hidden";
		http.open("GET","../../controlador/buscarAsistencia.php?myRand="+myRand+"&fecha="+fecha, true);
		http.onreadystatechange= function(){
			if(http.readyState==4 && http.status==200){
				var retorno=http.responseText;
				//alert (retorno);	
				if(retorno!=0)
				{
					arrayRetorno=retorno.split('*');
					document.getElementById('mostrar').style.visibility="visible";
					document.getElementById('titulo').value=arrayRetorno[1];
					document.getElementById('autor').value=arrayRetorno[2];
					document.getElementById('ano').value=arrayRetorno[3];
					document.getElementById('edicion').value=arrayRetorno[4];
					document.getElementById('editorial').value=arrayRetorno[5];
					document.getElementById('cod_area').value=arrayRetorno[6];
				}
				else{
					document.getElementById('mostrar').style.visibility="visible";
					
				}		
		}
	};
	http.setRequestHeader("Content-type","application/x-www-formurlencoded");
	http.send(null);
}
}