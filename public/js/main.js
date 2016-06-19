$(document).ready(function() {

	//alert('Seleccionado');

	$("#convocatoria").click(function(){
        	//return alert("El texto del botón es --> " + $("#convocatoria").attr("value"));
    });
	
	$('#revista').click(function() {
		//return $(this);
		/*
		var nombre = $('#revista').attr('name');
        if ($(this).is(':checked')) {
            //return confirm("Are you sure?");
            return alert("Seleccionado " + nombre);
        } else {
        	return alert("NO Seleccionado " + nombre);
        }
        */

    });

	var valor=document.getElementById('busquedatoken').value;                                           
    $("#buscador").keyup(function(e){                              
	      //obtenemos el texto introducido en el campo de búsqueda
	      consulta = $("#buscador").val();
	      //tipo = $("input[]").val();

	       //$('#enviar').click(function(){
	       		var data = { 'consulta' : consulta, 'tipos[]' : [], 
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

				console.log("consulta " + data['consulta']);
				console.log("tipos " + data['tipos[]']);
				console.log("areas " + data['areas[]']);
				console.log("lugares " + data['lugares[]']);
				console.log("establecimientos " + data['establecimientos[]']);

		        /*
		        var selected = '';    
		        $('input[name=tipo]').each(function(){
		            if (this.checked) {
		                selected += $(this).val()+', ';
		            }
		        }); 

		        if (selected != '') {
		            alert('Has seleccionado: '+selected);  
		        } else {
		            alert('Debes seleccionar al menos una opción.');
		        }

		        return false;
		        */
		    //});         


	      //return alert(tipo);
	      //consulta = array();
	       //console.log(consulta);                          ;
	      //hace la búsqueda
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
	                  alert("error petición ajax");
	            },
	            success: function(data){        
	            	//console.log(data); 
	            	$('.contenido').empty();
	            	$('.contenido').append(data);	                                                     
	            }
	      });
	});

	$("#revistas").on('click', function(){                                                     ;
      //hace la búsqueda
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
                  alert("error petición ajax");
            },
            success: function(data){        
            	//console.log(data); 
            	$('.contenido').empty();
            	$('.contenido').append(data);	                                                     
            }
      });
    });

    $("#convocatorias").on('click', function(){                                                     ;
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
                  alert("error petición ajax");
            },
            success: function(data){        
            	//console.log(data); 
            	$('.contenido').empty();
            	$('.contenido').append(data);	                                                     
            }
      });
    });

    $("#eventos").on('click', function(){                                                     ;
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
                  alert("error petición ajax");
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
	                  alert("error petición ajax");
	            },
	            success: function(data){        
	            	//console.log(data); 
	            	$('.contenido').empty();
	            	$('.contenido').append(data);	                                                     
	            }
	      });
	    });

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