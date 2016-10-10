
var verticale = {
	open: function(elemento){
		$("[class^='contenete-ver']").hide();
		var a = $(".contenete-ver-"+elemento);
		$(a).show();
	},
	close: function(){

	}
}


// EVENTOS AL CARGAR EL DOM
$(document).ready(function(){

	$("[id^='vertical-tab']").on("click" , function(e){
		e.preventDefault();
		var elemento = $(this).attr("id").split("-")[2];
		verticale.open(elemento);
	})
})