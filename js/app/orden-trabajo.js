//Variable validar el envio del form
var validar = 1;

/**
 * CLOSURE ORDEN DE TRABAJO
 */
var orden = (function(){

	function orden(){
		this.bindEvents();
	}

	/**
	 * Eventos al cargar el DOM
	 */
	orden.prototype.bindEvents = function() {

		var scope = this;

		scope.listarOrdenTrabajo();

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

		$("#form-ot").on("submit" , function(e){
			e.preventDefault();
			scope.guardarOrdenes( this );
		})

		$( document ).on( "click", ".editar-registro" , function(e){
			e.preventDefault();
			scope.completarInfo( this );
		} )
	};

	/**
	 * Completar datos de anunciantes en la OT
	 */
	orden.prototype.completarAnunciantes = function( element ){
		if(element != ""){
			$("#anunciante").removeAttr("disabled");
			$("#anunciante").empty();
			$("<option>" , { "text" : "-- Seleccione una opción --" , "selected" : true , "value" : "1" , "disabled" : false }).appendTo("#anunciante");
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
					}else{
						alert("asdasd")
					}
				},error: function(){
					alert("Ha ocurrido un error");
				}
			})
		}
	}

	/**
	 * CALCULAR EL VALOR DE LOS MEDIOS
	 */
	orden.prototype.calcularMedios = function(){
		var impresos = parseInt($("#val-impresos").val());
		var radio = parseInt($("#val-radio").val());
		var television = parseInt($("#val-television").val());
		var internet = parseInt($("#val-internet").val());
		var analisis = parseInt($("#val-analisis").val());

		var total = impresos+radio+television+internet+analisis;
		$("#total").val(total);
	}

	/**
	 * CALCULAR LOS DIAS DISPONIBLES ENTRE DOS FECHAS
	 */
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

	/**
	 * LISTAR LAS ORDENES DE TRABAJO
	 */
	orden.prototype.listarOrdenTrabajo = function(){
		$.ajax({
			url: "../controller/ordenController.php",
			data: "a=listarOrdenTrabajo",
			method: "POST",
			success: function( data ){
				data = $.parseJSON(data);
				if(data != "ERROR"){	
					$.each(data , function(i ,v){
						$( "<tr>" , { "id" : v.id_cliente }  ).append(
							$( "<td>" , { "text" : v.id_orden_trabajo } ),
							$( "<td>" , { "text" : v.cliente}),
							$( "<td>" , { "text" : v.nombre } ),
							$( "<td>" , { "text" : v.tipo_ot }),
							$( "<td>" ).append(
								$("<a>" , { "href" : "" , "class" : "eliminar-registro" ,"style": "color:red;"}).append(
									$("<i>" , { "class" : "fa fa-remove" })
								),
								$("<a>" , { "href" : "" ,"class" :"editar-registro" , "style": "margin-left:20px; color:blue;"  }).append(
									$("<i>" , { "class" : "fa fa-edit" })
								)
							)
						).appendTo("#mostrarOt")
					})
				}else{
					$("<tr>").append(
						$("<td>" , { "colspan" : "5" ,  "text" : "No hay registros disponibles" , "style" : "text-align:center"})
					).appendTo("#mostrarOt");
				}
			},error: function(){
				alert("Ha ocurrido un error");
			}
		})
	}

	/**
	 * GUARDAR LA ORDEN DE TRABAJO
	 */
	orden.prototype.guardarOrdenes = function( element ){
		$.ajax({
			url: "../controller/ordenController.php",
			data: "a=guardarOrden&valid="+validar+"&"+$(element).serialize(),
			method: "POST",
			success: function( data ){

			},error: function(){

			}
		})
	}

	/**
	 * COMPLETAR LOS DATOS A EDITAR EN LA OT
	 */
	orden.prototype.completarInfo = function(element){
		scope = this;
		var ele = $(element).parent().parent().attr("id");
		$("#taber-two").click();
		$.ajax({
			url: "../controller/ordenController.php",
			method: "POST",
			data: "a=mostrarOrdenes&id="+ele,
			success: function( response ){
				data = $.parseJSON(response);
				$("#id_orden_trabajo").val(data["id_orden_trabajo"]);
				$("#nombre_cliente").val(data["cliente"]);
				scope.compAnu(data["cliente"]);
				$("#anunciante").val(data["anunciante"]);
				$("#tipo_ot").val(data["tipo_ot"]);
				scope.compNit(data["cliente"]);
				$("#aplicacion").val(data["aplicacion"]);
				$("#val-impresos").val(data["valor_impresion"]);
				$("#val-radio").val(data["valor_radio"]);
				$("#val-television").val(data["valor_television"]);
				$("#val-internet").val(data["valor_internet"]);
				$("#val-analisis").val(data["valor_analisis"]);
				$("#observ_cierre").val(data["observaciones"]);
				$("#marca").val(data["marca"]);
				$("#entorno").val(data["entorno"]);
				$("#competencias").val(data["competencias"]);
				$("#sectores").val(data["sectores"]);
				$("#categoria").val(data["categoria"]);
				$("#desde").val(data["desde"]);
				$("#hasta").val(data["hasta"]);
				$("#observaciones_2").val(data["observaciones_2"]);
				validar = 0;
			},error: function(){

			}
		})
	}

	/**
	 * TRAER DATOS DEL ANUNCIANTE
	 */
	orden.prototype.compAnu = function( element ){
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
				}else{
					alert("asdasd")
				}
			},error: function(){
				alert("Ha ocurrido un error");
			}
		})
	}

	/**
	 * CARGAR EL NIT DEL CLIENTE
	 */
	orden.prototype.compNit = function(element){
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
	}

	return orden;

}())

$(document).ready(function(){
	orden = new orden;
})
