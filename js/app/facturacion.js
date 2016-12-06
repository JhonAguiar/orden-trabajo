// CLOSURE ESPECIFÍCO
var facturacion = (function(){

	function facturacion(){
		this.bindEvents();
	}

	facturacion.prototype.bindEvents = function() {
		scope = this;

		/**
		 * CAMBIAR EL CLIENTEs
		 */
		$( document ).on("change" , "#nombre_cliente" , function(e){
			e.preventDefault()
			scope.listarOT($(this).val());
		})
	}

	/**
	 * LISTAR LAS ORDENES DE TRABAJO
	 */
	facturacion.prototype.listarOT = function( element ){
		//LISTAR LAS ORDENES DE TRABAJO
		$.ajax({
			url: "../controller/facturaController.php",
			data: "a=listarOT&id="+element,
			method: "POST",
			success: function( data ){
				data = $.parseJSON(data);

				var valor_total = parseInt(data["valor_analisis"])+parseInt(data["valor_impresion"])+parseInt(data["valor_internet"])+parseInt(data["valor_radio"])+parseInt(data["valor_television"]);
				
					$( "<tr>" ).append(
						$( "<td>" , { "text" : data["id_orden_trabajo"] } ),
						$( "<td>" , { "text" : data["nit"]  }),
						$( "<td>" , { "text" : data["nombrecliente"] } ),
						$( "<td>" , { "text" : valor_total }),
						$( "<td>" ).append(
							$("<input>" , { "type" : "checkbox" , "value" : data["estado"] , "id" : "facturar" })
						)
					).appendTo("#mostrarOt")
				
				scope.completeInfo( element );
			},error: function(){

			}
		})
	}

	/**
	 * Completar la información de los clientes
	 */
	facturacion.prototype.completeInfo = function( element ){
		$.ajax({
			url: "../controller/facturaController.php",
			data: "a=completeCliente&id="+element,
			method: "POST",
			success: function( data ){
				data = $.parseJSON(data);
				$("#nombre_corto").val(data["nombre_corto"]);
				$("#nit").val(data["nit"]);
			},error: function(){

			}
		})
	}

	return facturacion;

}())

//CARGAR CLOSURE
$(document).ready(function(){
	facturacion = new facturacion;
})