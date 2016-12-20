 function convertirMayusculas (v){
 	
 if (v.length==0 || v.substr(v.length-1,1)==' ') {
		 solicitar.value = v+te.toUpperCase();
                 return false;

                 }
		 return true;
	 
}

function soloNumeros(e) {
	key= e.keyCode || e.which;
	teclado= String.fromCharCode(key);
	numero="0123456789";
	especiales="8-9-13-37-38-46-116"; 
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

