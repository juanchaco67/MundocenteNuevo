$(document).ready(function() {

	/*
	$("#submit-registrar-docente").click(function(){
		event.preventDefault();
		var nombre = $("input[name=name]").val();
		var email = $("input[name=email]").val();
		var password = $("input[name=password]").val();
		console.log(nombre);
		console.log(email);
		console.log(password);
		var route = "http://localhost:8000/usuario";
		var token = $("#token").val();

		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			data: {'name': nombre, 'email': email, 'password': password},

			success:function(){
				//$(".alert").fadeIn();
				$("#msj-success").fadeIn();
			}

		});
		
	});


	*/

	//alert('Seleccionado');
	$('.publicacion').click(function(){
		alert('publica');
		//console.log('noooooo');
	});

	$("#convocatoria").click(function(){
        	//return alert("El texto del botón es --> " + $("#convocatoria").attr("value"));
    });
	
	$('.filtros input[type=checkbox]').click(function() {
		var nombre = $(this).attr('value');
        if ($(this).is(':checked')) {
            //return confirm("Are you sure?");
            //return alert("Seleccionado " + nombre);
            realizar_busqueda();
        } else {
        	//return alert("NO Seleccionado " + nombre);
        	realizar_busqueda();
        }
    });

    var valor=document.getElementById('busquedatoken');
	if (valor != null) {
		var valor=document.getElementById('busquedatoken').value;                                           
	    $("#buscador").keyup(function(e){       
	    	event.preventDefault();                       
		      //obtenemos el texto introducido en el campo de búsqueda
	  		realizar_busqueda();
		});
	}

    function realizar_busqueda(){



    	$('.tipos').css('display', 'block');
    	campo = $("#buscador").val();
    	//console.log(campo);
    	if (campo != '') {
    		//console.log("campo lleno");
    		var data = { 'campo' : campo, 'tipos[]' : [], 
   			'areas[]' : [], 'lugares[]' : [], 'establecimientos[]' : []};
			$("input[name=tipo]:checked").each(function() {
			  data['tipos[]'].push($(this).val());
			});

			$("input[name=areas]:checked").each(function() {
			  data['areas[]'].push($(this).val());
			});

			$("input[name=lugares]:checked").each(function() {
			  data['lugares[]'].push($(this).val());
			});

			$("input[name=establecimientos]:checked").each(function() {
			  data['establecimientos[]'].push($(this).val());
			});

	      $.ajax({
	            type: "POST",
	            headers:{"X-CSRF-TOKEN":valor},
	            url: "http://localhost:8000/busqueda",
	            //data: "campo="+data,
	            data: data,
	            dataType: "html",
	            beforeSend: function(){
	                  //imagen de carga
	                  //$(".resultados").html("<p align='center'><img src='ajax-loader.gif' /></p>");
	            },
	            error: function(){
	                  //alert("error petición ajax");
	            },
	            success: function(data){        
	            	//console.log(data); 
	            	$('.contenido').empty();
	            	$('.contenido').append(data);	 

	            	//alert('asdgagdagsa');

	            	$('.publicacion').click(function(){
						//alert(this);
						//var id ={'id':this.id};
						//console.log('noooooo');
					      $.ajax({
					            type: "GET",
					            headers:{"X-CSRF-TOKEN":valor},
					            url: "http://localhost:8000/publicacion/" + this.id,
					            //data: "campo="+data,
					            //data: {'id': this.id},
					            //dataType: "json",
					        error: function(){

					        }, 
					        success: function(resp) {
					        	//alert(resp.id);
					        	$('#titulo-principal').html(resp.nombre);
					        	//$('#modalpublicacion').html(resp.responseText);
					        }
						});  
					});                                                 
	            }

	      });
    	} else {
			//console.log("campo vacio");
    	}
    }



	$(".revistas").on('click', function(){  
		$('.tipos').css('display', 'block');
      //hace la búsqueda
      //event.preventDefault();
      //console.log("r3efvistasfa");
      //return "hgola;";
      //$('.filtros input[name=revistas]')..prop('checked', true);;
      event.preventDefault();
      $.ajax({
            type: "GET",
            url: "http://localhost:8000/busqueda/revista",
            dataType: "html",
            beforeSend: function(){
                  //imagen de carga
                  //$(".resultados").html("<p align='center'><img src='ajax-loader.gif' /></p>");
            },
            error: function(){
                  //alert("error petición ajax");
            },
            success: function(data){        
            	//console.log(data); 
            	$('.contenido').empty();
            	$('.contenido').append(data);	                                                     
            	//console.log('revistas');
            }
      });
    });

    function mostrar_resultados($contenedor, $url, $elemento){

    }

    $(".convocatorias").on('click', function(){ 
    	$('.tipos').css('display', 'block');                                                    ;
      //hace la búsqueda
      event.preventDefault();
      $.ajax({
            type: "GET",
            url: "http://localhost:8000/busqueda/convocatoria",
            dataType: "html",
            beforeSend: function(){
                  //imagen de carga
                  //$(".resultados").html("<p align='center'><img src='ajax-loader.gif' /></p>");
            },
            error: function(){
                  //alert("error petición ajax");
            },
            success: function(data){        
            	//console.log(data); 
            	$('.contenido').empty();
            	$('.contenido').append(data);	                                                     
            }
      });
    });

    $(".eventos").on('click', function(){                                                     ;
    	//console.log('eveentoo');
    	$('.tipos').css('display', 'block');
      //hace la búsqueda
      event.preventDefault();
      $.ajax({
            type: "GET",
            url: "http://localhost:8000/busqueda/evento",
            dataType: "html",
            beforeSend: function(){
                  //imagen de carga
                  //$(".resultados").html("<p align='center'><img src='ajax-loader.gif' /></p>");
            },
            error: function(){
                  //alert("error petición ajax");
            },
            success: function(data){        
            	//console.log(data); 
            	$('.contenido').empty();
            	$('.contenido').append(data);	                                                     
            }
      });
    });


    $(".area").on('click', function(){                                                     ;
	      //hace la búsqueda
	      event.preventDefault();
	      $.ajax({
	            type: "GET",
	            url: "http://localhost:8000/busqueda",
	            dataType: "html",
	            beforeSend: function(){
	                  //imagen de carga
	                  //$(".resultados").html("<p align='center'><img src='ajax-loader.gif' /></p>");
	            },
	            error: function(){
	                  //alert("error petición ajax");
	            },
	            success: function(data){        
	            	//console.log(data); 
	            	$('.contenido').empty();
	            	$('.contenido').append(data);	                                                     
	            }
	      });
	    });

    /*
    $(".publicaciones").on('click', function(){                                                     ;
	      //hace la búsqueda
	      event.preventDefault();
	      $.ajax({
	            type: "GET",
	            url: "http://localhost:8000/publicacion",
	            dataType: "html",
	            beforeSend: function(){
	                  //imagen de carga
	                  //$(".resultados").html("<p align='center'><img src='ajax-loader.gif' /></p>");
	            },
	            error: function(){
	                  alert("error petición ajax");
	            },
	            success: function(data){        
	            	//console.log(data); 
	            	$('.cuerpo').empty();
	            	$('.cuerpo').append(data);	                                                     
	            }
	      });
	});
	*/

    $("#buscar").on('click', function(){                              
	      //obtenemos el texto introducido en el campo de búsqueda
	      consulta = $("#buscar").val();
	      event.preventDefault();
	       //console.log(consulta);                          ;
	      //hace la búsqueda
	      /*
	      $.ajax({
	            type: "POST",
	            headers:{"X-CSRF-TOKEN":valor},
	            url: "http://localhost:8000/busqueda",
	            data: "campo="+consulta,
	            dataType: "html",
	            beforeSend: function(){
	                  //imagen de carga
	                  //$(".resultados").html("<p align='center'><img src='ajax-loader.gif' /></p>");
	            },
	            error: function(){
	                  alert("error petición ajax");
	            },
	            success: function(data){        
	            	//console.log(data); 
	            	$('.contenido').empty();
	            	//$('.contenido').append(data);	                                                     
	            }
	      });
	      */
	});

});

$('.modal').on('shown.bs.modal', function() {
  	$(this).find('[autofocus]').focus();
});
$('.modal').on('hidden.bs.modal', function() {
	//console.log('borrar');
  	//$(this).find('[autofocus]').focus();
  	$(this).find('form')[0].reset(); 
  	$(".alert").remove();
  	//$(this).remove();
});

$(document).ready(function(){
	//alert('hola');
	//alert($('.panel-izquierdo').offset());
	if ($('.panel-izquierdo').offset() != undefined) {
		var posicion = $('.panel-izquierdo').offset().top;
		var ancho = $('.panel-izquierdo').width();
		$(window).scroll(function(){
		var posScroll = $(window).scrollTop();
		if (posScroll + 50 > posicion) {
			//alert('menor');
			$('.panel-izquierdo').addClass('fijar-panel');
			//$('.panel-izquierdo').attr('width', posicion);					
			$('.principal').addClass('col-md-offset-3');
			$('.panel-izquierdo').css('width', ancho);
		} else {
			//alert('mayor');
			$('.panel-izquierdo').removeClass('fijar-panel');
			$('.principal').removeClass('col-md-offset-3');
		}

	});
	//alert(posicion);
	}
});
var activo = true;
$('.listarIntereses').click(function(){
//	$('.listarIntereses').css('checked', false);
	if (activo) {
		//console.log("activo");
		$('.intereses').css('display', 'block');
		activo = false;
	} else {
		//console.log("hola mundo");
		$('.intereses').css('display', 'none');
		activo = true;
	}
});