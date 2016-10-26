var validar = 1;

/**
 * CLOSURE ESPECIFÍCO
 */
var Usuario = ( function(){
	function Usuario(){
		this.bindEvents();
	}

	Usuario.prototype.bindEvents = function(){
		var scope = this;
		
		this.listarU();

		$( "#form-user" ).on( "submit" , function(e){
			e.preventDefault();
			scope.envioDatos();
		} )
	}

	Usuario.prototype.listarU= function() {
		$.ajax({
			data: "a=listarUsuarios",
			url: "../controller/UserController.php",
			method: "POST",
			success: function( data ){
				if (data.length > 0) {
					data = $.parseJSON(data);
					$.each(data , function( i , v ){
						$( "<tr>" ).append(
							$( "<td>" , { "text" : v.identificacion } ),
							$( "<td>" , { "text" : v.nombre } ),
							$( "<td>" , { "text" : v.telefono } ),
							$( "<td>" , { "text" : v.direccion }),
							$("<td>").append(
								$("<a>" , { "href" : "" , "class" : "eliminar-registro" ,"style": "color:red;"}).append(
									$("<i>" , { "class" : "fa fa-remove" })
								),
								$("<a>" , { "href" : "" ,"class" :"editar-registro" , "style": "margin-left:20px; color:blue;"  }).append(
									$("<i>" , { "class" : "fa fa-edit" })
								)
							)
						).appendTo( "#mostrarUsuario" );
					});
				}
			},error: function(){

			}
		})
	};

	Usuario.prototype.envioDatos = function(element) {
		$.ajax({
			data: "",
			url: "",
			method: "",
			success: function( data ){

			},error: function(){

			}
		})
	};


	return Usuario;
}() );


$(document).ready(function(){
	Usuario = new Usuario;
});