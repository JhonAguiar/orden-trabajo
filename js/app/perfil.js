$(document).ready(function () {

    function actualizar_perfil(datos) {
        $.ajax({
            url: '../controller/perfilController.php',
            type: 'post',
            data: datos,
            contentType: false,
            processData: false
        }).success(function (response) {
            console.log(response);
        });
    }

    $("#form-perfil").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($('#form-perfil')[0]);
        actualizar_perfil(formData);
    });

    $("#foto_perfil").on('change', function (e) {
        e.preventDefault();
        var cad = $(this).val();
        var cad = cad.split("").reverse().join("");
        var cad = cad.split(/\\/);
        var cad = cad[0].split("").reverse().join("");
        $("#nom-foto").text(cad);
    });

    $("#subir-foto").click(function () {
        $("#foto_perfil").trigger("click");
    });
});