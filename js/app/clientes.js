var validar = 1;

/**
 * CLOSURE ESPECIFÍCO
 */
var Cliente = ( function(){
	//Constructor
	function Cliente(){	
		// Eventos
		this.bindEvents(); 
	}

	Cliente.prototype.bindEvents = function() {
		var scope = this;
		this.listarClientes();
		$("#form-cliente").on("submit" , function(e){
			e.preventDefault();
			scope.saveForm( this );
		})

		$(document).on("click", ".editar-registro" , function(e){
			e.preventDefault()
			scope.completarDatos( this );
		})
	};

	Cliente.prototype.listarClientes = function(){
		$.ajax({
			url: "../controller/ClienteController.php" ,
			method: "POST" ,
			data: "a=cliente",
			success: function( data ){
				if (data.length > 0) {
					data = $.parseJSON(data);
					$.each(data , function( i , v ){
						$( "<tr>" , {  "id" : v.consecutivo }).append(
							$( "<td>" , { "text" : v.nit }),
							$( "<td>" , { "text" : v.cliente }  ),
							$( "<td>" , { "text" : v.telefono_pagador } ),
							$( "<td>" , { "text" : v.direccion } ),
							$("<td>").append(
							$("<a>" , { "href" : "" , "class" : "eliminar-registro" ,"style": "color:red;"}).append(
								$("<i>" , { "class" : "fa fa-remove" })
							),
							$("<a>" , { "href" : "" ,"class" :"editar-registro" , "style": "margin-left:20px; color:blue;"  }).append(
								$("<i>" , { "class" : "fa fa-edit" })
							)
						)
						).appendTo("#listarClientes");
					})
				}else{
					alert("No hay Datos Disponibles");
				}
			},error: function( data ){
				alert("Ha ocurrido un problema");
			}
		})
	}

	Cliente.prototype.saveForm = function( element ) {
		var scope = this;
		console.log(validar);
		$.ajax({
			method: "POST",
			url: "../controller/ClienteController.php",
			data: "a=guardarCliente&valid="+validar+"&" + $(element).serialize(),
			success: function(data){
				alert(data);
				$("#listarClientes").empty();
				scope.listarClientes();
			},
			error: function(){

			}
		})
	};

	Cliente.prototype.completarDatos = function( element ){
		var scope = this;
		var padre = $(element).parent().parent();
		var iden = $(padre).attr("id");
		$.ajax({
			method: "POST",
			url: "../controller/ClienteController.php",
			data: "a=completarDatos2&id="+ iden,
			success: function( data ){
				if (data.length > 0) {
					data = $.parseJSON(data);
					// COMPLETAR INFORMACIÓN
					var nit = data.nit;
					nit = nit.split("-");
					$("#cliente").val(data.cliente);
					$("#nit").val(nit[0]);
					$("#dv").val(nit[1]);
					$("#nombre-corto").val(data.nombre_corto);
					$("#persona-contacto").val(data.persona_contacto);
					$("#pagador").val(data.pagador);
					$("#telefono-pagador").val(data.telefono_pagador);
					$("#movil-pagador").val(data.movil_pagador);
					$("#ciudad").val(data.ciudad);
					$("#correo").val(data.correo);
					$("#pagina-web").val(data.pagina_web);
					$("#cumpleanos").val(data.cumpleanos);
					$("#descrip-cliente").val(data.descripcion);
					$("#direccion").val(data.direccion);
					$("#consecutivo").val(data.consecutivo);
					$("#tipo-cliente").val(data.tipo_cliente);
					$("#taber-two").click();
					validar = 0;
				}
			},error: function(){

			}
		})
	}


	//Retornar Constructor
	return Cliente;
} () );

$(document).ready(function(){
	Cliente = new Cliente;
});