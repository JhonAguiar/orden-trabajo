var scope = {};

var validar = 1;
var start = 0;
var end = 10;
var listado;

/**
 * Función Listar Ciudades
 */
scope.listarCiudades = function(){
	$("#mostrarCiudades").empty();
	$.ajax({
		data: "a=listarCiudades",
		method: "POST",
  		url: "../controller/GeneralController.php",
		success: function(data) {
			if (data.length > 0) {
				listado = $.parseJSON(data);
                                show();
			}else{
				$( "<tr>" ).append(
					$( "<td>" , { "colspan" : "4" , "text" : "No hay ciudades disponibles" } )
				).appendTo("#mostrarCiudades");
			}
		},
		error: function(){
			console.log("error")
		}
	})
}

/**
 * Enviar datos
 */
scope.enviarCiudad = function( element ){
	$.ajax({
		method: "POST",
		url: "../controller/GeneralController.php",
		data: "a=crearCiudad&valid="+validar+"&" + $(element).serialize(),
		success: function(data){
			alert(data);
			$("#mostrarCiudades").empty();
			scope.listarCiudades();
		},
		error: function(){

		}
	})
}

/**
 * Eliminar Registro
 */
scope.eliminarRegistro = function( element ){
	var valid = confirm("Desea eliminar este registro");
	if(valid == true){
		parte = $(element).parent().parent()[0];
		$(parte).attr("id");
		var a = $(parte)[0];
		var b = $(a).attr("id").split("-")[1];
		$.ajax({
			url: "../controller/GeneralController.php",
			method: "POST",
			data: "a=eliminarCiudad&codigo="+b,
			success: function(response){

				$("#eliminarRegistroNo-"+b).css("display" , "none");
			}
		})
	}else{
		"No se puede eliminar el registro"
	}
}

/**
 * Editar Registro
 */
scope.completarDatos = function( element ){
	var padre = $(element).parent().parent();
	padre = $(padre).children("td");
	codigo = $(padre)[0];
	codigo = $(codigo).text();
	ciudad = $(padre)[1];
	ciudad = $(ciudad).text();
	departamento = $(padre)[2];
	departamento = $(departamento).text();
	$("#codigo").val(codigo);
	$("#ciudad").val(ciudad);
	$("#departamento").val(departamento);
	$("#taber-two").click();
	validar = 0;
};

function show(){
    var datos = listado.slice(start, end);
    $("#mostrarCiudades").html('');
    $.each( datos , function ( i , v ) {
        $("<tr>" , { "id" : "eliminarRegistroNo-"+v.codigo }).append(
            $("<td>", { "text": v.codigo } ),
            $("<td>", { "text": v.ciudad} ),
            $("<td>", { "text": v.departamento } ),
            $("<td>").append(
                    $("<a>" , { "href" : "" , "class" : "eliminar-registro" ,"style": "color:red;"}).append(
                            $("<i>" , { "class" : "fa fa-remove" })
                    ),
                    $("<a>" , { "href" : "" ,"class" :"editar-registro" , "style": "margin-left:20px; color:blue;"  }).append(
                            $("<i>" , { "class" : "fa fa-edit" })
                    )
            )
        ).appendTo("#mostrarCiudades");
    } );
}


function pagination(action){
    if(action === "add"){
        start += 10;
        end += 10;
    }
    if(action === "remove"){
        if(start >= 10){
            start -= 10;
            end -= 10;
        }
    }
    show();
}


$(".pagination #previous").on("click", function(){
    console.log("atras");
    pagination("remove");
});

$(".pagination #after").on("click", function(){
    console.log("adelante");
    pagination("add");
});


$(document).ready(function(){


	scope.listarCiudades();
	// Eventos envio de datos
	$("#form_ciudad").on("submit", function(e){
		e.preventDefault();
		scope.enviarCiudad( this );
	});

	//Evento eliminar registro
	$(document).on("click" , ".eliminar-registro" , function(e){
		e.preventDefault();
		scope.eliminarRegistro( this );
	})

	//Completar información registro
	$(document).on("click", ".editar-registro" , function(e){
		e.preventDefault()
		scope.completarDatos( this );
	})
})

