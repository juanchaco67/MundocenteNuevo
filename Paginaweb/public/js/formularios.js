$(document).ready(function(){

	formularioFuncionario=function(metodo,id){
			
		event.preventDefault();
		var route=$("."+id).attr('action');
		var valor=document.getElementById('token').value;
		$url_pagina = "http://localhost:8000/";

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
					//$ir_a = $url_pagina + "/admin";
					$ir_a = $url_pagina + "/usuario";
				} else {
					//alert('no es admin');
					$ir_a = $url_pagina + "/logout";
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
								//	window.location=$url_pagina + "/admin";
								//}
							} else {
								
								window.location="/usuario";
								//alert('activar');
								//window.location=$url_pagina + "/";
								//window.location=$ir_a;
							}
						} else {
							//alert('cerrar el modal');
							//window.location=$url_pagina + "/";
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
					
					window.location=$url_pagina + "/publicacion";
				}
					else if(id=="formularioDocente" && metodo=="POST"){
					// window.location="http://localhost:8000";
					//alert("ksuti");
					window.location=$url_pagina + "/usuario";
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
			    //alert("alerta");
	
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
		$( ".areas-eliminar-hidden" ).remove();
	});


	$('.submit-editar-admin').click(function(){		
		formularioFuncionario("PUT","formularioAdmin");
	});


// 	areasDocente=function(clase){
// 	$( "."+clase+" #area-publicacion-docente" ).change(function() {
		
//    		 var nombreCiudad = "";
// 	    $( "."+clase+" #area-publicacion-docente option:selected" ).each(function() {
// 	      nombreCiudad += $( this ).text() + " ";
// 	    });
//       var id = $(this).val();
	 
// 	  var areas=document.getElementById('areas-aparecer-docente');
// 	$('.areas-aparecer-docente-scroll').css('display','inline-block');
// 	  areas.style.display="inline-block";
// 	  var html=areas.innerHTML;	 
	
// 	  if ( $('#hidden-docente-'+id).length == 0 ) {
	 
	  

// 			 var input="<div style='height:1px;display:inline-block;position:relative;' class='alert alert-success'><span style='position:relative;bottom:10px;'>"+nombreCiudad+"</span><a style='position:absolute;left:90%;top:0%;' href='#' id='area-aparecer-docente"+id+"' class='eliminar-docente close' data-dismiss='alert' aria-label='close'>&times;</a></div>"
// 			  //var input="<div id='contenedor-ciudades"+id+"' class='contenedor-ciudades' style='-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;position:relative; background:#000; width:20%;'><span style='position:absolute; top:10%;'>"+nombreCiudad+"</span><span href='#' id='"+id+"' class='eliminar-lugar style=''>x</span></div>";
// 			  areas.innerHTML=html+input;
// 			  var hidden="<input type='hidden' name='areas[]' class='areas-eliminar-hidden' id='hidden-docente-"+id+"' value='"+id+"'/>";
			 	
// 			 $('.'+clase).append(hidden);
			 
			 
		  	
// 			$('.eliminar-docente').click(function(){	
// 					 var id = $(this).attr('id');
// 					 var auxId=id.substr(21, id.length);
// 					$('#hidden-docente-'+auxId+'').remove();
// 			}); 

// 		}

//   });
// }
// areasDocente('formularioDocente');
// //areasDocente('formularioUpdateDocente');
//    	$('.eliminar-docente').click(function(){	
// 			 var id = $(this).attr('id');
// 			 var auxId=id.substr(21, id.length);
// 			$('#hidden-docente-'+auxId+'').remove();
// 	});  
 	
$('#area-publicacion-docente').change(function() {
		
    var nombreCiudad = "";
 	    $("#area-publicacion-docente option:selected" ).each(function() {
 	      nombreCiudad += $( this ).text() + " ";
 	    });
       var id = $(this).val();
       var areas=document.getElementById('areas-aparecer-docente');
	$('.areas-aparecer-docente-scroll').css('display','inline-block');
	  areas.style.display="inline-block";
	   
	
	  if ( $('#hidden-docente-'+id).length == 0 ) {
	 
	  

		
			 var input='<div class="general-bordes" id="general-bordes-'+id+'"style="position:relative; display:inline-block; width:50%; margin:2px;">'+
				nombreCiudad+
				'<a  class="eliminar-area" id="eliminar-area-'+id+'">x</a>'+
			'<input type="hidden" name="areas[]" class="eliminar-hidden" id="eliminar-hidden-'+id+'" value="'+id+'"/>'+
			'</div>';
			
			 $('#areas-aparecer-docente').append(input);
			 
		  	
			$('.eliminar-area').click(function(){
		 		 var id = $(this).attr('id');
		 		 var auxId=id.substr(14, id.length);
				$('#general-bordes-'+auxId+'').remove();
		 	}); 

		}


});
 	$('.eliminar-area').click(function(){
 		 var id = $(this).attr('id');
 		 var auxId=id.substr(14, id.length);
		$('#general-bordes-'+auxId+'').remove();

 	});
 	$('.cancelar').click(function(){	
 		alert('cancelar');
 			$('.areas-aparecer-docente').remove();
 	}); 
// 	$('#registro-user').click(function(){	
// 			$( ".areas-aparecer-docente" ).remove();
// 	});
	



	
	$( "#lugar" ).change(function() {
   		 var nombreCiudad = "";
	    $( "#lugar option:selected" ).each(function() {
	      nombreCiudad += $( this ).text() + " ";
	    });
      var id = $(this).val();
	   
	  var municipios=document.getElementById('municipios');
	  $('.municipios-scroll').css('display','inline-block');

	  municipios.style.display="inline-block";
	  var html=municipios.innerHTML;	   
		if($('#hidden'+id).length ==0){
			 var input="<div style='height:1px;display:inline-block;position:relative;' class='alert alert-success'><span style='position:relative;bottom:10px;'>"+nombreCiudad+"</span><a style='position:absolute;left:90%;top:0%;' href='#' id='"+id+"' class='eliminar-lugar close' data-dismiss='alert' aria-label='close'>&times;</a></div>"
			  //var input="<div id='contenedor-ciudades"+id+"' class='contenedor-ciudades' style='-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;position:relative; background:#000; width:20%;'><span style='position:absolute; top:10%;'>"+nombreCiudad+"</span><span href='#' id='"+id+"' class='eliminar-lugar style=''>x</span></div>";
			  municipios.innerHTML=html+input;
			  var hidden="<input type='hidden'name='lugar[]' class='eliminar-hidden' id='hidden"+id+"' value='"+id+"'/>";
			 	
			 $('#publicacion-store').append(hidden);
			 
		  
			$('.eliminar-lugar').click(function(){
					 var id = $(this).attr('id');
					$('#hidden'+id+'').remove();
			});     	
		}
  });
	$('.eliminar-lugar').click(function(){
			 var id = $(this).attr('id');
			$('#hidden'+id+'').remove();		
	}); 


	$( "#area-publicacion" ).change(function() {
   		 var nombreCiudad = "";
	    $( "#area-publicacion option:selected" ).each(function() {
	      nombreCiudad += $( this ).text() + " ";
	    });
      var id = $(this).val();
	 
	  var areas=document.getElementById('areas-aparecer');
	  $('.areas-aparecer-scroll').css('display','inline-block');
	  areas.style.display="inline-block";
	  var html=areas.innerHTML;	 
	
	  if ( $('#hidden-areas-'+id).length == 0 ) {
	 

			 var input="<div style='height:1px;display:inline-block;position:relative;' class='alert alert-success'><span style='position:relative;bottom:10px;'>"+nombreCiudad+"</span><a style='position:absolute;left:90%;top:0%;' href='#' id='area-aparecer"+id+"' class='eliminar-area close' data-dismiss='alert' aria-label='close'>&times;</a></div>"
			  //var input="<div id='contenedor-ciudades"+id+"' class='contenedor-ciudades' style='-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;position:relative; background:#000; width:20%;'><span style='position:absolute; top:10%;'>"+nombreCiudad+"</span><span href='#' id='"+id+"' class='eliminar-lugar style=''>x</span></div>";
			  areas.innerHTML=html+input;
			  var hidden="<input type='hidden' name='areas[]' class='areas-eliminar-hidden' id='hidden-areas-"+id+"' value='"+id+"'/>";
			 	
			 $('#publicacion-store').append(hidden);
			 
		  	
			$('.eliminar-area').click(function(){	
					 var id = $(this).attr('id');
					 var auxId=id.substr(13, id.length);
					$('#hidden-areas-'+auxId+'').remove();
			}); 

		}

  });
   	$('.eliminar-area').click(function(){	
			 var id = $(this).attr('id');
			 var auxId=id.substr(13, id.length);
			$('#hidden-areas-'+auxId+'').remove();
	});  





});

