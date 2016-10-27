

var Producto = ( function(){

	function Producto (){
		this.bindEvents();
	}

	Producto.prototype.bindEvents = function() {
		var scope = this;
		scope.listarProcuctos();
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
						console.log(v.producto);
						$("<tr>").append(
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

	return Producto;
}())


$(document).ready(function(){
	Producto = new Producto;
})