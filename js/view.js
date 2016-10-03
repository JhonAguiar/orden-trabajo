/**
 * CLOSURE ESPECIFÍCO
 */
var View = ( function(){
	//Constructor
	function View(){
		
		// Eventos
		this.bindEvents(); 
	}

	View.prototype.bindEvents = function() {
		
	};

	//Retornar Constructor
	return View;
} () );

$(document).ready(function(){
	View = new View;
});