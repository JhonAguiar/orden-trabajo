var Producto = ( function(){

	function Producto (){
		this.bindEvents();
	}

	Producto.prototype.bindEvents = function() {
		
		var scope = this;

		//Completar tabla de productos
		scope.listarProcuctos();

		//Completar select
		scope.completarSelect();

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

	Producto.prototype.completarSelect = function(){
		$.ajax({
			data: "a=listarProductos",
			method: "POST",
			url: "../controller/GeneralController.php",
			success: function( response ){
				if(response.length > 0){
					data = $.parseJSON(response);
					$.each(data , function( i , v){
						$("#producto").append('<option value='+v.id_producto+'>'+v.producto+'</option>')
					})
				}else{
					console.log("Ha ocurrido un problema");
				}
			},error: function(){

			}
		})
	}

	Producto.prototype.editarProducto = function( element ){
		$( "#taber-two" ).click();
		var element = $(element).parent().parent();
		var id = element.attr("id");
		$( "#cod_producto" ).val(id);
		$( "#producto" ).val(id)
	}	

	return Producto;
}())


$(document).ready(function(){
	Producto = new Producto;
})