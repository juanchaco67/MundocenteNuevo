$(document).ready(function(){

	formulario=function(metodo,id){
			
		event.preventDefault();
		var route=$("#"+id).attr('action');
		var valor=document.getElementById('token').value;

		$.ajax({
			url:route,
			headers:{"X-CSRF-TOKEN":valor},
			method:metodo,
			data:$("#"+id).serialize(),
			success:function(resp){

				if(metodo=="PUT"){
					document.getElementById('btn-correo').innerHTML=resp.email;
				} else if(id=="formularioFuncionario" && metodo=="POST"){
					//window.location="http://localhost:8000/publicacion";
				}else if(id=="formularioAdmin" && metodo=="PUT"){
						//console.log('archiooooo');
					//window.location="http://localhost:8000";
				}

			},
			error:function(error){
					
					console.log(error.responseText);
					var html=$('<div   id="error-panel" class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span >&times;</span></button><ul id="error-lista"></ul></div>');	
					$('#error').html(html);	
					result = $.parseJSON(error.responseText);	
					var ul=document.getElementById('error-lista');
					ul.innerHTML="";
					for(var k in result){
	  			 			ul.innerHTML+='<li>'+result[k]+'</li>';
	  			 	}

	  			 	$(".modal").animate({
				        scrollTop: 0
				    }, 600); 

			}					
		});
		return false;
	};
	$('#submit-editar-admin').click(function(){
		console.log('editar al user admin');
		formulario("PUT","formularioAdmin");
	});

});