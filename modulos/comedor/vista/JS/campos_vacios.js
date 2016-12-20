function campos(formulario){   
     var valido=true; // Switch o bandera que indica si hubo errores o no
  //    if(formulario.fecha.value==''){  
	 //    alert("El campo Fecha, no puede estar vacio!");
		// formulario.fecha.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		// valido=false; // Cambia switch a false para indicar que hubo error
		// return valido; // Retorna switch
	 // }
	 if(formulario.cedula.value==''){  
	    alert("El campo C\u00e9dula, no puede estar vacio!");
		formulario.cedula.focus(); 
		valido=false; 
		return valido; 
	 }
	 if(formulario.nombre.value==''){  
	    alert("El campo Nombre, no puede estar vacio!");
		formulario.nombre.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	 if(formulario.apellido.value==''){  
	    alert("El campo Apellido, no puede estar vacio!");
		formulario.apellido.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	  if(formulario.grado.value==''){  
	    alert("El campo Grado, no puede estar vacio!");
		formulario.grado.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }

	 if(valido){  // Evalua valido para determinar si no hubo errores
	   return valido; // Retorna switch
	 }
}    

function campos_2(form){   
     var valido=true; // Switch o bandera que indica si hubo errores o no
     if(form.fecha.value==''){  
	    alert("El campo Fecha, no puede estar vacio!");
		form.fecha.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	  if(valido){  // Evalua valido para determinar si no hubo errores
	   return valido; // Retorna switch
	 }
}  
                                                                                                                          