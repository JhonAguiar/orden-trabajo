var Producto = ( function(){

	function Producto (){
		this.bindEvents();
	}

	Producto.prototype.bindEvents = function() {
		
		var scope = this;

		//Completar tabla de productos
		scope.listarProcuctos();

		$( document ).on( "click" , ".editar-registro" ,  function(e){
			e.preventDefault();
			scope.editarProducto( this );
		} )

	};

	Producto.prototype.listarProcuctos = function(){
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


	Producto.prototype.editarProducto = function( element ){
		$( "#taber-two" ).click();
		var element = $(element).parent().parent();
		var id = element.attr("id");
		var producto = element[0].childNodes[1];
		var producto = $(producto).text();

		$( "#cod_producto" ).val(id);
		$( "#producto" ).val(producto)
		console.log();
	}	

	return Producto;
}())


$(document).ready(function(){
	Producto = new Producto;
})