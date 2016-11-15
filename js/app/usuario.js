var validar = 1;

/**
 * CLOSURE ESPECIFÍCO
 */
var Usuario = ( function(){
	
	function Usuario(){
		this.bindEvents();
	}

	//Eventos de Usuario
	Usuario.prototype.bindEvents = function(){
		var scope = this;
		
		this.listarU();

		$( "#form-user" ).on( "submit" , function(e){
			e.preventDefault();
			scope.envioDatos();
		} )

		$( document ).on( "click" ,  ".editar-registro" , function(e){
			e.preventDefault();
			scope.completarRegistro( this );
		} )
	}

	//Completar Registro
	Usuario.prototype.completarRegistro = function( element ) {
		$( "#taber-two" ).click();
		var iden = $(element).parent().parent().attr("id");
		$.ajax({
			url: "../controller/UserController.php",
			data: "a=datosUsuario&id="+iden,
			method: "POST",
			success: function( data ){
				data = $.parseJSON(data);
				$( "#nombre" ).val(data.nombre);
				$( "#identificacion" ).val(data.identificacion);
				$( "#usuario" ).val(data.usuario);
				$( "#fec_nac" ).val(data.fec_nac);
				$( "#direccion" ).val(data.direccion);
				$( "#correo" ).val(data.correo);
				$( "#contrasena" ).val(data.contrasena);
				$( "#telefono" ).val(data.telefono);
				$( "#rol" ).val(data.rol);
			},error: function(){

			}
		})
	};

	//Listar Usuarios
	Usuario.prototype.listarU= function(){
		$.ajax({
			data: "a=listarUsuarios",
			url: "../controller/UserController.php",
			method: "POST",
			success: function( data ){
				if (data.length > 0) {
					data = $.parseJSON(data);
					$.each(data , function( i , v ){
						$( "<tr>" , { "id" : v.id_usuario } ).append(
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

	//Envio de datos
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

/**
 * Eventos al cargar el DOM
 */
$(document).ready(function(){
	Usuario = new Usuario;
});