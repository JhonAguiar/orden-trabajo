/**
 * OBJETO ESPECIFÍCO MENU
 */
var menu = {
	abrirmenu : function(element){ 
		$("[class^='menu-']").fadeOut();
		var a = $(".menu-"+element);
		var b = $(a).attr("style");
		if (b == "display: block; opacity: 1;"){
			a.fadeOut();
		}else{
			a.fadeIn();
		}	
	}
};

/**
 * EVENTOS AL CARGAR EL DOM
 */
$(document).ready(function(){
	//EVENTO MENU
	$("[id^='item']").on("click" , function(e){
		e.preventDefault();
		var item = $(this).attr("id");
		var separar = item.split("-"); 
		var elemento = separar[1];
		menu.abrirmenu(elemento);
	});

	$( ".close-menu" ).on("click" , function(){
		$( ".menu" ).fadeOut();
	})

	$( "#nav-link" ).on("click" , function(){
		$( ".menu" ).fadeIn();
	})

	$( document ).keyup(function(e){
		if( e.keyCode == 27){
			$( ".menu" ).fadeOut();		
		}
	})
})

$(document).foundation('tab', 'reflow');