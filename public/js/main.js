$(document).ready(function(){
	//alert('hola');
	var posicion = $('.panel-izquierdo').offset().top;
	var ancho = $('.panel-izquierdo').width();
	$(window).scroll(function(){
		var posScroll = $(window).scrollTop();
		if (posScroll > posicion) {
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