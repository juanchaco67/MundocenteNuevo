<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/estilos.css')!!}
<script src="../js/jquery-1.12.3.min.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo.css') }}"> -->
	<title>Mundocente | @yield('titulo-pagina')</title>
<script type="text/javascript">


window.onload=function(){
	$("#formularioFuncionario").submit(function(){ 						
				var dato=new FormData();
				dato.append('name',document.formularioFuncionario.name.value);
				dato.append('email',document.formularioFuncionario.email.value);
				dato.append('password',document.formularioFuncionario.password.value);
				dato.append('notificar',document.formularioFuncionario.notificar.value);
				dato.append('rol',document.formularioFuncionario.rol.value);
				dato.append('establecimiento',document.formularioFuncionario.establecimiento.value)			
				var route=$('#formularioFuncionario').attr('action');
  				var valor=document.getElementById('token').value;
				$.ajax({
					url:route,
					headers:{"X-CSRF-TOKEN":valor},
					type:'POST',	
					dataType: "html",			
					data:dato,
					cache: false,
   					contentType: false,
    				processData: false,
    				success:function(){
    				 window.location="http://localhost:8000/usuario";
    				},
					error:function(error){
						$("#msj").html($.parseJSON(error.responseText).email+" "+$.parseJSON(error.responseText).password);
						$("#msj-error").fadeIn();
					}
				});
			  return false;
 		 });

$("#formularioDocente").submit(function(){ 	
						
				var dato=new FormData();
				dato.append('name',document.formularioDocente.name.value);
				dato.append('email',document.formularioDocente.email.value);
				dato.append('password',document.formularioDocente.password.value);
				dato.append('notificar',document.formularioDocente.notificar.value);
				dato.append('rol',document.formularioDocente.rol.value);			
				$('.areas:checked').each(
				    function() {
				  dato.append('areas[]',$(this).val() );
				    }
				);		
				var route=$('#formularioDocente').attr('action');
  				var valor=document.getElementById('token').value;
				$.ajax({
					url:route,
					headers:{"X-CSRF-TOKEN":valor},
					type:'POST',	
					dataType: "html",			
					data:dato,
					cache: false,
   					contentType: false,
    				processData: false,
    				success:function(){
    				 window.location="http://localhost:8000/usuario";
    				},
					error:function(error){
						$("#msj").html($.parseJSON(error.responseText).email+" "+$.parseJSON(error.responseText).password);
						$("#msj-error").fadeIn();
					}
				});
			  return false;
 		 });

	$("#formulario").submit(function(){ 								
				var dato={'name':document.fo.name.value,'email':document.fo.email.value,'password':document.fo.password.value,'notificar':document.fo.notificar.value,'rol':document.fo.rol.value};					
				var route=$('#formulario').attr('action');
				var persona={'nombre':'camilo'}			
  				var valor=document.getElementById('tokenn').value;
				$.ajax({
					url:route,
					headers:{"X-CSRF-TOKEN":valor},
					type:'PUT',	
					dataType: "html",			
					data:dato,		
				
    				success:function(resp){
    					document.getElementById('btn-correo').innerHTML=$.parseJSON(resp).email;
    				 	campos[0].value=$.parseJSON(resp).name;
    				 	campos[0].value=$.parseJSON(resp).email;
    				 	campos[0].value=$.parseJSON(resp).password;
    				}					
				});
		  return false;
 		 });
	}

</script>
</head>
<body>

	@yield('superior')
	@yield('contenido')
	@yield('pie')


<!--
	{!!Html::style('js/jquery-1.12.3.min.js')!!}
	{!!Html::style('js/bootstrap.min.js')!!}
	{!!Html::style('js/main.js')!!}

	-->

	<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
</body>
</html>