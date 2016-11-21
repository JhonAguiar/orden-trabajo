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

		//Guardar o Editar el formulario
		$( "#form-user" ).on( "submit" , function(e){
			e.preventDefault();
			scope.envioDatos( this );
                        scope.subirFoto();
		} )

		//Completar registro
		$( document ).on( "click" ,  ".editar-registro" , function(e){
			e.preventDefault();
			scope.completarRegistro( this );
		} )

		//Eliminar un registro
		$( document ).on( "click" , ".eliminar-registro" , function(e){
			e.preventDefault();
			scope.eliminarRegistro( this );
		} )

		//Subir Foto
		$( "#subir-foto" ).on( "click" , function(e){
			e.preventDefault();
			$("#foto").click();
		} )

		$( "#foto" ).on( "change" , function(e){
			e.preventDefault();
			var cad = this.value;
			var cad = cad.split("").reverse().join("");
			var cad = cad.split(/\\/);
			var cad = cad[0].split("").reverse().join("");
			$( "#nom-foto" ).text(cad);
		} )
	}

	Usuario.prototype.eliminarRegistro = function( element ){
		if(confirm("Desea eliminar el registro")){
			var elemento = $(element).parent().parent();
			var iden = $(element).parent().parent().attr("id");
			$.ajax({
				data: "a=eliminarUsuario&id="+iden,
				url: "../controller/UserController.php",
				method: "POST",
				success: function( data ){
					alert(data)
				},error: function(){

				}
			})
			$(elemento).fadeOut();
		}else{
			
		}
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
				$( "#id_usuario" ).val(data.id_usuario);
				$( "#identificacion" ).val(data.identificacion);
				$( "#usuario" ).val(data.usuario);
				$( "#fec_nac" ).val(data.fec_nac);
				$( "#direccion" ).val(data.direccion);
				$( "#ciudad").val(data.ciudad);
				$( "#correo" ).val(data.correo);
				$( "#contrasena" ).val(data.contrasena);
				$( "#telefono" ).val(data.telefono);
				$( "#rol" ).val(data.rol);
				validar = 0;
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
						$( "<tr>" , { "id" : v.identificacion } ).append(
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
			data: "a=envioDatos&valid="+validar+"&"+$(element).serialize(),
			url: "../controller/UserController.php",
			method: "POST",                        
			success: function( data ){
                            console.log(data);
			},error: function(){

			}
		})
	};
        
        
        Usuario.prototype.subirFoto = function(){
            var formData = new FormData($('#form-user')[0]);
            $.ajax({
                url: '../controller/fotoUserController.php',
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (datos)
                {
                    console.log(datos);
                }
            });
        }

	return Usuario;
}() );

/**
 * Eventos al cargar el DOM
 */
$(document).ready(function(){
	Usuario = new Usuario;
});