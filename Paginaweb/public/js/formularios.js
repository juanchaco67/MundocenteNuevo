$(document).ready(function(){

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
				//alert(resp.usuario);
				//alert('sussss');
				if(metodo=="PUT"){
					if (id="submit-editar-docente" && metodo == "PUT") {
						if (resp.usuario != undefined) {
							if (resp.usuario.estado == "activo") {
								if(resp.usuario.idrol!=3){							
									window.location="http://localhost:8000/logout";
								} else {
									window.location="http://localhost:8000/";
								}
							} else {
								//window.location="http://localhost:8000/";
							}
						} else {
							//window.location="http://localhost:8000/";
							//return resp;
						}
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

});
