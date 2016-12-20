function validarCampos(formulario){   
     var valido=true; // Switch o bandera que indica si hubo errores o no
     if(formulario.cedula.value==''){  
	    alert("El campo c\u00e9dula, no puede estar vacio!");
		formulario.cedula.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	 if(formulario.nombre.value==''){  
	    alert("El campo nombre, no puede estar vacio!");
		formulario.nombre.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	  if(formulario.apellido.value==''){
	    alert("El campo apellido, no puede estar vacio!");
		formulario.apellido.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.username.value==''){
	    alert("El campo Nombre de usuario, no puede estar vacio!");
		formulario.username.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.clave.value==''){
	    alert("El campo Contraseña, no puede estar vacio!");
		formulario.clave.focus(); 
		valido=false;
		return valido;
	 }
	   if(formulario.tipo_usuario.value==''){
	    alert("El campo Tipo de usuario, no puede estar vacio!");
		formulario.tipo_usuario.focus(); 
		valido=false;
		return valido;
	 }


	 if(valido){  // Evalua valido para determinar si no hubo errores
	   return valido; // Retorna switch
	 }
}    

                                                                                                                          