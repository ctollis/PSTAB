function  solonumeros(e){
			
			key=e.keyCode || e.which;
			teclado=String.fromCharCode(key);
			numeros="0123456789";
			especiales="8-37-38-46";//array
			teclado_especial=false;
			for(var i in especiales){
				if(key==especiales[i]){
					teclado_especial=true;
					
				}
			}
			
			if(numeros.indexOf(teclado)==-1 && !teclado_especial){
				return false;
				
			}
		}

function validarCampos(formulario){   
     var valido=true; // Switch o bandera que indica si hubo errores o no
     if(formulario.cedula_estu.value==''){  
	    alert("El campo cédula Estudiante, no puede estar vacio!");
		formulario.cedula_estu.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	 
	 if(formulario.ano_escolar.value==''){
	    alert("El campo año escolar, no puede estar vacio!");
		formulario.ano_escolar.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.fecha_inscripcion.value==''){
	    alert("El campo fecha de inscripción, no puede estar vacio!");
		formulario.fecha_inscripcion.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.grado_actual.value==''){
	    alert("El campo Grado o Año Actual, no puede estar vacio!");
		formulario.grado_actual.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.seccion_actual.value==''){
	    alert("El campo Sección Actual, no puede estar vacio!");
		formulario.seccion_actual.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.grado_cursar.value==''){
	    alert("El campo Grado a Cursar, no puede estar vacio!");
		formulario.grado_cursar.focus(); 
		valido=false;
		return valido;
	 }
{
var a = 0, rdbtn=document.getElementsByName("repite")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno repite");
              document.getElementById("repite1").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("repite2").style.border = "";
        }
}
}
function validarCampos2(formulario){   
     var valido=true; // Switch o bandera que indica si hubo errores o no
	 if(formulario.cedula_estu.value==''){  
	    alert("El campo cédula Estudiante, no puede estar vacio!");
		formulario.cedula_estu.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	  if(formulario.nombre.value==''){
	    alert("El campo Nombre, no puede estar vacio!");
		formulario.nombre.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.apellido.value==''){
	    alert("El campo Apellido, no puede estar vacio!");
		formulario.apellido.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.fecha_nacimiento.value==''){  
	    alert("El campo Fecha de Nacimiento, no puede estar vacio!");
		formulario.fecha_nacimiento.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	  if(formulario.edad.value==''){
	    alert("El campo Edad, no puede estar vacio!");
		formulario.edad.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.ano.value==''){
	    alert("El campo Año, no puede estar vacio!");
		formulario.ano.focus(); 
		valido=false;
		return valido;
	 }
	 if(formulario.lugar_nac.value==''){  
	    alert("El campo Lugar de Nacimiento, no puede estar vacio!");
		formulario.lugar_nac.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	  if(formulario.estado.value==''){
	    alert("El campo Estado, no puede estar vacio!");
		formulario.estado.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.municipio.value==''){
	    alert("El campo Municipio, no puede estar vacio!");
		formulario.municipio.focus(); 
		valido=false;
		return valido;
	 }
	   var a = 0, rdbtn=document.getElementsByName("nacionalidad")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione Nacionalidad");
              document.getElementById("nacionalidad1").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("nacionalidad2").style.border = "";
        }

	   
	   
	   
	  if(formulario.pais_nac.value==''){
	    alert("El campo Pais, no puede estar vacio!");
		formulario.pais_nac.focus(); 
		valido=false;
		return valido;
	 }
	    var a = 0, rdbtn=document.getElementsByName("sexo")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione Sexo");
              document.getElementById("sexo1").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("sexo2").style.border = "";
        }

	 if(formulario.estado_actu.value==''){  
	    alert("El campo Estado, no puede estar vacio!");
		formulario.estado_actu.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	  if(formulario.municipio_actu.value==''){
	    alert("El campo Municipio, no puede estar vacio!");
		formulario.municipio_actu.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.urb_sector.value==''){
	    alert("El campo Urb o Sector, no puede estar vacio!");
		formulario.urb_sector.focus(); 
		valido=false;
		return valido;
	 }
	 if(formulario.calle.value==''){
	    alert("El campo calle, no puede estar vacio!");
		formulario.calle.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.casa_edif.value==''){
	    alert("El campo Casa o Edificio, no puede estar vacio!");
		formulario.casa_edif.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.pto_referencia.value==''){
	    alert("El campo Punto de referencia cercano al domicilio, no puede estar vacio!");
		formulario.pto_referencia.focus(); 
		valido=false;
		return valido;
	 }


}
function validarCampos3(formulario){   
     var valido=true; // Switch o bandera que indica si hubo errores o no
	 if(formulario.cedula_estu.value==''){  
	    alert("El campo cédula Estudiante, no puede estar vacio!");
		formulario.cedula_estu.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	  if(formulario.cedula_r.value==''){
	    alert("El campo Cédula del Representante, no puede estar vacio!");
		formulario.cedula_r.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.nombre_r.value==''){
	    alert("El campo Nombre, no puede estar vacio!");
		formulario.nombre_r.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.apellido_r.value==''){
	    alert("El campo Apellido, no puede estar vacio!");
		formulario.apellido_r.focus(); 
		valido=false;
		return valido;
	 }
	 if(formulario.lugar_nac_r.value==''){
	    alert("El campo Lugar de Nacimiento, no puede estar vacio!");
		formulario.lugar_nac_r.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.fecha_nac_r.value==''){  
	    alert("El campo Fecha de Nacimiento, no puede estar vacio!");
		formulario.fecha_nac_r.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	
	 if(formulario.lugar_nac_r.value==''){  
	    alert("El campo Lugar de Nacimiento, no puede estar vacio!");
		formulario.lugar_nac_r.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	  if(formulario.estado_nac_r.value==''){
	    alert("El campo Estado, no puede estar vacio!");
		formulario.estado_nac_r.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.municipio_nac_r.value==''){
	    alert("El campo Municipio, no puede estar vacio!");
		formulario.municipio_nac_r.focus(); 
		valido=false;
		return valido;
	 }
	   var a = 0, rdbtn=document.getElementsByName("nacionalidad_r")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione Nacionalidad");
              document.getElementById("v").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("e").style.border = "";
        }

	  if(formulario.pais_r.value==''){
	    alert("El campo Pais, no puede estar vacio!");
		formulario.pais_r.focus(); 
		valido=false;
		return valido;
	 }
	    var a = 0, rdbtn=document.getElementsByName("sexo_r")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione Sexo");
              document.getElementById("m").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("f").style.border = "";
        }

	 if(formulario.estado_actu_r.value==''){  
	    alert("El campo Estado, no puede estar vacio!");
		formulario.estado_actu_r.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	  if(formulario.municipio_actu_r.value==''){
	    alert("El campo Municipio, no puede estar vacio!");
		formulario.municipio_actu_r.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.urb_actu_r.value==''){
	    alert("El campo Urb o Sector, no puede estar vacio!");
		formulario.urb_actu_r.focus(); 
		valido=false;
		return valido;
	 }
	 if(formulario.calle_actu_r.value==''){
	    alert("El campo calle, no puede estar vacio!");
		formulario.calle_actu_r.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.casa_edif_r.value==''){
	    alert("El campo Casa o Edificio, no puede estar vacio!");
		formulario.casa_edif_r.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.pto_referencia_r.value==''){
	    alert("El campo Punto de referencia cercano al domicilio, no puede estar vacio!");
		formulario.pto_referencia_r.focus(); 
		valido=false;
		return valido;
	 }
	   if(formulario.telefono_cel_r.value==''){
	    alert("El campo Teléfono Celular, no puede estar vacio!");
		formulario.telefono_cel_r.focus(); 
		valido=false;
		return valido;
	 }
	  var a = 0, rdbtn=document.getElementsByName("trabajo_r")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el representante trabaja");
              document.getElementById("sitr").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("notr").style.border = "";
        }
	  if(formulario.profesion_r.value==''){
	    alert("El campo Profesión, no puede estar vacio!");
		formulario.profesion_r.focus(); 
		valido=false;
		return valido;
	 }
}
function validarCampos4(formulario){   
     var valido=true;
	 if(formulario.cedula_estu.value==''){  
	    alert("El campo cédula Estudiante, no puede estar vacio!");
		formulario.cedula_estu.focus();
		valido=false;
		return valido; 
	 }
	
	 var a = 0, rdbtn=document.getElementsByName("beca")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno esta becado");
              document.getElementById("sib").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("nob").style.border = "";
        }
	 
	 var a = 0, rdbtn=document.getElementsByName("se_retira_solo_plantel")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno se retira solo del plantel");
              document.getElementById("sir").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("nor").style.border = "";
        }
	  if(formulario.n_hermanos.value==''){  
	    alert("El campo N° Hermanos, no puede estar vacio!");
		formulario.n_hermanos.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	 
	 var a = 0, rdbtn=document.getElementsByName("hermanos_en_plantel")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno tiene hermanos en el plantel");
              document.getElementById("sih").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("noh").style.border = "";
        }
	

}
function validarCampos5(formulario){   
     var valido=true; // Switch o bandera que indica si hubo errores o no
	 if(formulario.cedula_estu.value==''){  
	    alert("El campo cédula Estudiante, no puede estar vacio!");
		formulario.cedula_estu.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	 var a = 0, rdbtn=document.getElementsByName("padece_enfermedad")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno padece alguna enfermadad");
              document.getElementById("sie").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("noe").style.border = "";
        }
	 
	 var a = 0, rdbtn=document.getElementsByName("diversidad_funcional")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno tiene alguna diversidad funcional");
              document.getElementById("sid").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("nod").style.border = "";
        }
	 
	 var a = 0, rdbtn=document.getElementsByName("operaciones")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno esta operado");
              document.getElementById("siop").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("noop").style.border = "";
        }
		
	 var a = 0, rdbtn=document.getElementsByName("alergias_alimentos")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno es alergico a algun alimento");
              document.getElementById("siali").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("noali").style.border = "";
        }
		
	var a = 0, rdbtn=document.getElementsByName("alergias_medicamentos")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno es alergico a algun medicamento");
              document.getElementById("sime").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("nome").style.border = "";
        }
		
var a = 0, rdbtn=document.getElementsByName("alergias_otros")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno tiene otras alergias");
              document.getElementById("siot").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("noot").style.border = "";
        }
		
	 
var a = 0, rdbtn=document.getElementsByName("alim_trata_espe")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno sigue algún régimen especial de Alimentación o Tratamiento");
              document.getElementById("sireg").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("noreg").style.border = "";
        }
		
}
function validarCampos6(formulario){   
     var valido=true; // Switch o bandera que indica si hubo errores o no
	 if(formulario.cedula_estu.value==''){  
	    alert("El campo cédula Estudiante, no puede estar vacio!");
		formulario.cedula_estu.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	 var a = 0, rdbtn=document.getElementsByName("catolico")
     for(i=0;i<rdbtn.length;i++) {
              if(rdbtn.item(i).checked == false) {
               a++;
                  }
}
              if(a == rdbtn.length) {
               alert("Por favor, seleccione si el alumno es catolico");
              document.getElementById("si").style.border = "2px solid red";
              return false;
           } else {
              document.getElementById("no").style.border = "";
        }
  if(formulario.nombre_apellido_emerg.value==''){
	    alert("El campo Nombre y Apellido, no puede estar vacio!");
		formulario.nombre_apellido_emerg.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.telefono.value==''){
	    alert("El campo telefono, no puede estar vacio!");
		formulario.telefono.focus(); 
		valido=false;
		return valido;
	 }
	 if(formulario.parentesco_otro.value==''){
	    alert("El campo parentesco, no puede estar vacio!");
		formulario.parentesco_otro.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.nombre_apellido_emerg2.value==''){
	    alert("El campo Nombre y Apellido, no puede estar vacio!");
		formulario.nombre_apellido_emerg2.focus(); 
		valido=false;
		return valido;
	 }
	  if(formulario.telefono2.value==''){
	    alert("El campo telefono, no puede estar vacio!");
		formulario.telefono2.focus(); 
		valido=false;
		return valido;
	 }
	 if(formulario.parentesco_otro2.value==''){
	    alert("El campo parentesco, no puede estar vacio!");
		formulario.parentesco_otro2.focus(); 
		valido=false;
		return valido;
	 }		
}	
function validarCampos7(formulario){   
     var valido=true; // Switch o bandera que indica si hubo errores o no
     if(formulario.cedula_estu.value==''){  
	    alert("El campo cédula Estudiante, no puede estar vacio!");
		formulario.cedula_estu.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	 	 if(formulario.cedula_m.value==''){
	    alert("El campo Cédula de la Madre, no puede estar vacio!");
		formulario.cedula_m.focus(); 
		valido=false;
		return valido;
	 }
}
function validarCampos8(formulario){   
     var valido=true; // Switch o bandera que indica si hubo errores o no
     if(formulario.cedula_estu.value==''){  
	    alert("El campo cédula Estudiante, no puede estar vacio!");
		formulario.cedula_estu.focus(); // Posiciona el cursor del mouse nuevamente en el campo para que se introduzcan los datos
		valido=false; // Cambia switch a false para indicar que hubo error
		return valido; // Retorna switch
	 }
	 	 if(formulario.cedula_p.value==''){
	    alert("El campo Cédula del Padre, no puede estar vacio!");
		formulario.cedula_p.focus(); 
		valido=false;
		return valido;
	 }
}
