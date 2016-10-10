/**
 * Objeto Especifico Tab
 */

var tab = {
	cambiarTab : function(element){
		$("[class^='content-']").fadeOut();
		var a = $(".content-"+element)[0];
		$(a).fadeIn();
	}
}

/**
 * Eventos al cargar el dom
 */
$(document).ready(function(){
	$(".active").fadeIn();
	$("[id^='taber']").on("click" , function(e){
		e.preventDefault();
		var eve = $(this).attr("id").split("-")[1];
		tab.cambiarTab(eve);
	})
})