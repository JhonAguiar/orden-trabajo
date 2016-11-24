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
	};

	orden.prototype.completarAnunciantes = function( element ){
		if(element != ""){
			$("#anunciante").removeAttr("disabled");
			$.ajax({
				url: "../controller/ordenController.php",
				data: "a=completarAnunciante&id="+element,
				method: "POST",
				success: function( data ){
					if(data.length > 0){
						data = $.parseJSON(data);
						$.each(data , function(i, v){
							$("<option>" , { "value" : v.id_anunciante , "text" : v.nombre } ).appendTo("#anunciante");
							$("#nit_anunciante").val(v.nit);
						})
					}
				},error: function(){
					alert("Ha ocurrido un error");
				}
			})
		}
	}

	return orden;

}())

$(document).ready(function(){
	orden = new orden;
})
