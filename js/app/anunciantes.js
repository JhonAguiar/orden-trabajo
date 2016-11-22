var validar = 1;

/**
 * CLOSURE ANUNCIANTE
 */
var Anunciante = (function(){

	function Anunciante(){
		this.bindEvents();
	}

	/**
	 * EVENTOS 
	 */
	Anunciante.prototype.bindEvents = function() {
		var scope = this;
		
		this.listarAnunciantes();

		$( document ).on( "submit" , "#form-anunciante" , function(e){
			e.preventDefault();

			scope.guardarAnunciante( this );
		} )

		$( document ).on( "click" , ".editar-registro" , function(e){
			e.preventDefault();
			scope.completarAnunciante( this );
		})
	};

	/**
	 * LISTAR LOS ANUNCIANTES
	 */
	Anunciante.prototype.listarAnunciantes = function(){
		$.ajax({
			url: "../controller/ClienteController.php",
			data: "a=listAnunciante",
			method: "POST",
			success: function( data ){
				if(data.length > 0){
					data = $.parseJSON(data);
					$.each(data, function(i,v){
						$( "<tr>" , { "id" : v.id_anunciante }).append(
							$( "<td>" , { "text" : v.id_anunciante }),
							$( "<td>" , { "text" : v.nombre }),
							$( "<td>" , { "text" : v.nomb_cliente }),
							$( "<td>" ).append(
								$("<a>" , { "href" : "" , "class" : "eliminar-registro" ,"style": "color:red;"}).append(
                            		$("<i>" , { "class" : "fa fa-remove" })
			                    ),
			                    $("<a>" , { "href" : "" ,"class" :"editar-registro" , "style": "margin-left:20px; color:blue;"  }).append(
			                        $("<i>" , { "class" : "fa fa-edit" })
			                    )
							)
						).appendTo( "#listAnun" );
					})
				}
			},error: function(){

			}
		})
	}

	/**
	 * GUARDAR EL ANUNCIANTE
	 */
	Anunciante.prototype.guardarAnunciante = function( element ) {
		$.ajax({
			url: "../controller/ClienteController.php",
			data: "a=saveAnunciante&valid="+validar+"&"+$(element).serialize(),
			method: "POST",
			success: function( data ){
                            
			},error: function(){

			}
		})
	};

	/**
	 * COMPLETAR INFORMACIÓN DEL ANUNCIANTE
	 */
	Anunciante.prototype.completarAnunciante = function( element ){
		validar = 0;
		var ele = $(element).parent().parent();
		var id = $(ele).attr("id");
		$("#taber-two").click();
		$.ajax({
			url: "../controller/ClienteController.php",
			data: "a=completeAnun&id="+id,
			method: "POST",
			success: function( data ){
				if(data.length > 0){
					data = $.parseJSON(data);
					$.each( data , function(i , v){
						$("#id_anunciante").val(v.id_anunciante);
						$("#cliente").val(v.cliente);
						$("#anunciante").val(v.nombre);
						$("#sector").val(v.sector);
					} )
				}
			},error: function(){

			}
		})

	}

	return Anunciante;
}())


/**
 * CARGAR EL DOM
 */
$(document).ready(function(){
	Anunciante = new Anunciante;
})

