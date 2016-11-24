var orden = (function(){

	function orden(){
		this.bindEvents();
	}

	orden.prototype.bindEvents = function() {

		var scope = this;

		//COMPLETAR INFORMACIÓN NOMBRE DEL CLIENTE
		$("#nombre_cliente").on("change",  function(e){
			e.preventDefault();
			scope.completarAnunciantes($(this).val());	
		})

		//INICIALIZAR VALOR
		$("[id^='val-']").val(0);

		//CALCULAR VALOR
		$("[id^='val-']").on("blur" , function(e){
			e.preventDefault();
			scope.calcularMedios();
		});

		//VALIDAR ENTEROS
		$("[id^='val-']").on("keypress" , function(event){
			if(event.keyCode < 47 || event.keyCode > 57){
				return event.returnValue = false;
			}
		})

		$("#desde").on("focus", function(e){
			e.preventDefault();
			$("#desde").val("");
			$("#hasta").val("");
			$("#dias").val("");
		})
		//CONTADOR DIAS
		$("#hasta").on("change" , function(event){
			event.preventDefault();
			scope.calcularDias(this);
		})
	};

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

	orden.prototype.calcularDias = function(event){
		var desde = $("#desde").val();
		var hasta = $(event).val()
		var fechaDesde = desde.split("-");
		var fechaHasta = hasta.split("-");

		 var fFecha1 = Date.UTC(fechaDesde[0],fechaDesde[1]-1,fechaDesde[2]); 
		 var fFecha2 = Date.UTC(fechaHasta[0],fechaHasta[1]-1,fechaHasta[2]); 
		 var dif = fFecha2 - fFecha1;
		 var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
		
		$("#dias").val(dias);

	}

	return orden;

}())

$(document).ready(function(){
	orden = new orden;
})
