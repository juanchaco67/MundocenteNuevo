$(document).ready(function(){
var listaLugares =new Array();
	formularioFuncionario=function(metodo,id){
			
		event.preventDefault();
		var route=$("."+id).attr('action');
		var valor=document.getElementById('token').value;
		
		$.ajax({
			url:route,
			headers:{"X-CSRF-TOKEN":valor},
			method:metodo,
			data:$("."+id).serialize(),
			success:function(resp){

				//alert("usuario actual " + resp.usuario.name + " estado " + resp.usuario.estado	);
				//alert("user editar " + resp.user.name + " estado " + resp.user.estado);


				if (resp.usuario != undefined) {
					//alert('es admin');
					//$ir_a = "http://localhost:8000/admin";
					$ir_a = "http://localhost:8000/usuario";
				} else {
					//alert('no es admin');
					$ir_a = "http://localhost:8000/logout";
				}
				//alert('sussss');
				if(metodo=="PUT"){
					if ((id=="formularioUpdateDocente" || id=="formularioUpdateFuncionario") && metodo == "PUT") {
						if (resp.user != undefined) {
							if (resp.user.estado == "inactivo") {
								//alert('inactivar');
								//if(resp.usuario.idrol!=3){							
									window.location=$ir_a;
								//} else {
								//	window.location="http://localhost:8000/admin";
								//}
							} else {
								//alert('activar');
								//window.location="http://localhost:8000/";
								//window.location=$ir_a;
							}
						} else {
							//alert('cerrar el modal');
							//window.location="http://localhost:8000/";
							//return resp;
						}
					}

					if (id=="formularioAdmin") {
						//alert('admin');
						window.location=$ir_a;
					} else {

					}
					//document.getElementById('btn-correo').innerHTML=resp.email;

					//$('.txtNombre').val(resp.name);
					//$('.txtEmail').val(resp.email);
				}
				else if(id=="formularioFuncionario" && metodo=="POST"){
					
					window.location="http://localhost:8000/publicacion";
				}
					else if(id=="formularioDocente" && metodo=="POST"){
					window.location="http://localhost:8000";
				}


			},
			error:function(error){				
					
				//alert("saleerrror" + error.responseText);
					//console.log(error.responseText);
				var html=$('<div   id="error-panel" class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span >&times;</span></button><ul id="error-lista"></ul></div>');	
				if(id=="formularioAdmin")
					$('#error-admin').html(html);	
				else
					$('#error').html(html);	
				result = $.parseJSON(error.responseText);	

				console.log(result);

				var ul=document.getElementById('error-lista');
				ul.innerHTML="";
				for(var k in result){
  			 			ul.innerHTML+='<li>'+result[k]+'</li>';
  			 	}



  			 	$("html, body").animate({
			        scrollTop: 0
			    }, 600); 
	
			}					
		});
		return false;
	};
	$('.submit-editar-docente').click(function(){
		//alert("entro");
		formularioFuncionario("PUT","formularioUpdateDocente");
	});
	$('.submit-editar-funcionario').click(function(){

		formularioFuncionario("PUT","formularioUpdateFuncionario");
	});
	$('.submit-registrar-funcionario').click(function(){
		formularioFuncionario("POST","formularioFuncionario");
	});
	$('.submit-registrar-docente').click(function(){
		//alert("alerta");
		formularioFuncionario("POST","formularioDocente");
	});


	$('.submit-editar-admin').click(function(){		
		formularioFuncionario("PUT","formularioAdmin");
	});


	formularioFuncionarPublicacion=function(){

	}
	
	$( "#lugar" ).change(function() {
   		 var nombreCiudad = "";
	    $( "#lugar option:selected" ).each(function() {
	      nombreCiudad += $( this ).text() + " ";
	    });
      var id = $(this).val();
	    listaLugares.push(id);
	  var municipios=document.getElementById('municipios');
	  municipios.style.display="inline-block";
	  var html=municipios.innerHTML;	   

	  var input="<div style='width:15%;height:1px;display:inline-block;position:relative;' class='alert alert-success'><span style='position:absolute; top:10%;'>"+nombreCiudad+"</span><a style='position:absolute;left:95%;top:0%;' href='#' id='"+id+"' class='eliminar-lugar close' data-dismiss='alert' aria-label='close'>&times;</a></div>"
	  //var input="<div id='contenedor-ciudades"+id+"' class='contenedor-ciudades' style='-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;position:relative; background:#000; width:20%;'><span style='position:absolute; top:10%;'>"+nombreCiudad+"</span><span href='#' id='"+id+"' class='eliminar-lugar style=''>x</span></div>";
	  municipios.innerHTML=html+input;
	  var hidden="<input type='hidden'name='lugar[]'class='eliminar-hidden' id='hidden"+id+"' value='"+id+"'/>";
	 	
	 $('#publicacion-store').append(hidden);
	  for (var i = 0; i < listaLugares.length; i++) {
	  	console.log("que oso "+listaLugares[i]);
	  }
  
	$('.eliminar-lugar').click(function(){
			 var id = $(this).attr('id');
				
			 buscar(id);
	});     	

  });

   	
function buscar(id){
	var cadena="";
	 for (var i = 0; i < listaLugares.length; i++) {
	 	if(listaLugares[i]==id){
	 		listaLugares.splice(i,1);
	 		cadena='#hidden'+i+'';
	 		$('#hidden'+id+'').remove();
	 		break;
	 	}
	 }
	 
	 for (var i = 0; i < listaLugares.length; i++) {
	  	console.log("elimino "+listaLugares[i]);
	  }
	}

});

