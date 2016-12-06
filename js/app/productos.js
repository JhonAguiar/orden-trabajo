var validar = 1;

//CLOSURE ESPECIFICO
var Producto = ( function(){

	function Producto (){
		this.bindEvents();
	}

	Producto.prototype.bindEvents = function() {
		
		var scope = this;

		//Completar tabla de productos
		scope.listarProductos();

		//Editar producto
		$( document ).on( "click" , ".editar-registro" ,  function(e){
			e.preventDefault();
			scope.editarProducto( this );
		} )

		//Eliminar Producto
		$( document ).on( "click" , ".eliminar-registro" , function(e){
			e.preventDefault();
			scope.eliminarProducto( this );
		} )

		$( "#form-producto" ).on("submit" , function(e){
			e.preventDefault();
			scope.enviarProducto( this );
		})
	};

	/**
	 * ENVIAR PRODUCTO
	 */
	Producto.prototype.enviarProducto = function(element){
		$.ajax({
			url: "../controller/GeneralController.php",
			data: "a=enviarProducto&valid="+validar+"&"+$(element).serialize(),
			method: "POST",
			success: function( data ){
				alert("Guardado Correctamente");
			},error: function(){
				alert("Ha ocurrido un problema");
			}
		})
	}

	/**
	 * LISTAR PRODUCTOS
	 */
	Producto.prototype.listarProductos = function(){
		$.ajax({
			url: "../controller/GeneralController.php",
			data: "a=listarProductos",
			method: "POST",
			success: function( data ){
				if(data.length >0){
					data = $.parseJSON(data);
					$.each(data , function(i , v){
						$("<tr>" , { "id" : v.id_producto }).append(
							$( "<td>", { "text" : v.id_producto }),
							$( "<td>" , { "text" : v.producto }),
							$( "<td>" ).append(
								$("<a>" , { "href" : "" , "class" : "eliminar-registro" ,"style": "color:red;"}).append(
									$("<i>" , { "class" : "fa fa-remove" })
								),
								$("<a>" , { "href" : "" ,"class" :"editar-registro" , "style": "margin-left:20px; color:blue;"  }).append(
									$("<i>" , { "class" : "fa fa-edit" })
								)
							)
						).appendTo("#mostrarProductos")
					})
				}
			},error: function(){

			}
		})
	}

	/**
	 * EDITAR PRODUCTO
	 */
	Producto.prototype.editarProducto = function( element ){
		$( "#taber-two" ).click();
		var element = $(element).parent().parent();
		var id = element.attr("id");
		var producto = element[0].childNodes[1];
		var producto = $(producto).text();

		$( "#cod_producto" ).val(id);
		$( "#producto" ).val(producto)
		validar = 0;
	}	

	/**
	 * ELIMINAR EL PRODUCTO
	 */
	Producto.prototype.eliminarProducto = function( element ){
		if(confirm("Desea eliminar el producto")){
			var element = $(element).parent().parent();
			var id = element.attr("id");
			$.ajax({
				data: "a=elimProducto&id="+id,
				url: "../controller/GeneralController.php",
				method: "POST",
				success: function( data ){
					alert("Registro Borrado");
				},error: function(){

				}
			})
			$(element).hide();
		}else{

		}	
	}
	return Producto;
}())


$(document).ready(function(){
	Producto = new Producto;
})