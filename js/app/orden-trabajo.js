var orden = (function(){

	function orden(){
		this.bindEvents();
	}

	orden.prototype.bindEvents = function() {

		var scope = this;

		$("#nombre_cliente").on("change",  function(e){
			e.preventDefault();
			scope.completarAnunciantes($(this).val());	
		})

		$("[id^='val-']").val(0);

		$("[id^='val-']").on("blur" , function(e){
			e.preventDefault();
			scope.calcularMedios();
		});

		$("[id^='val-']").on("keypress" , function(event){
			if(event.keyCode < 47 || event.keyCode > 57){
				return event.returnValue = false;
			}
		})
	};

	/**
	 * COMPLETAR ANUNCIANTE
	 */
	orden.prototype.completarAnunciantes = function( element ){
		if(element != ""){
			$("#anunciante").removeAttr("disabled");
			$("#anunciante").empty();
			$("#anunciante").val("");
			$("#nit_anunciante").val("");

			$.ajax({
				url: "../controller/ordenController.php",
				data: "a=nit&id="+element,
				method: "POST",
				success: function(data){
					if(data.length > 0){
						data = $.parseJSON(data);
						$("#nit_anunciante").val(data.nit);
					}
				},error: function(){

				}
			});

			$.ajax({
				url: "../controller/ordenController.php",
				data: "a=completarAnunciante&id="+element,
				method: "POST",
				success: function( data ){
					if(data.length > 0){
						data = $.parseJSON(data);
						$.each(data , function(i, v){
							$("<option>" , { "value" : v.id_anunciante , "text" : v.nombre } ).appendTo("#anunciante");
						})
					}
				},error: function(){
					alert("Ha ocurrido un error");
				}
			})
		}
	}

	orden.prototype.calcularMedios = function(){
		var impresos = parseInt($("#val-impresos").val());
		var radio = parseInt($("#val-radio").val());
		var television = parseInt($("#val-television").val());
		var internet = parseInt($("#val-internet").val());
		var analisis = parseInt($("#val-analisis").val());

		var total = impresos+radio+television+internet+analisis;
		$("#total").val(total);
	}

	return orden;

}())

$(document).ready(function(){
	orden = new orden;
})
