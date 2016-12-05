
var facturacion = (function(){

	function facturacion(){
		this.bindEvents();
	}

	facturacion.prototype.bindEvents = function() {
		scope = this;

		$( document ).on("change" , "#nombre_cliente" , function(e){
			e.preventDefault()
			scope.listarOT($(this).val());
			scope.completeInfo($(this).val());
		})
		/**
		scope.listarOT();*/
	};

	facturacion.prototype.listarOT = function( element ){
		//LISTAR LAS ORDENES DE TRABAJO
		$.ajax({
			url: "../controller/facturaController.php",
			data: "a=listarOT&id="+element,
			method: "POST",
			success: function( data ){

			},error: function(){

			}
		})
	}}

	facturacion.prototype.completeInfo = function( element ){
		$.ajax({
			url: "../controller/facturaController.php",
			data: "a=completeCliente&id="+element,
			method: "POST",
			success: function( data ){

			},error: function(){

			}
		})
	}

	return facturacion;

}())


$(document).ready(function(){
	facturacion = new facturacion;
})