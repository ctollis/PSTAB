 function convertirMayusculas (e, solicitar){
 	var	txt;
 if (txt.length==0 || txt.substr(txt.length-1,1)==' ') {
		 solicitar.value = txt+te.toUpperCase();
                 return false;

                 }
		 return true;
	 
}

function soloNumeros(e) {
	key= e.keyCode || e.which;
	teclado= String.fromCharCode(key);
	numero="0123456789";
	especiales="8-37-38-46"; //array especial
	teclado_especial=false;
	for (var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;
		}

	}
	if(numero.indexOf(teclado)==-1 && !teclado_especial){
		alert('Ingrese solo n\u00fameros!')
		return false;		
	}
}


