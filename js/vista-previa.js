var canvas1 = document.getElementById("previa1");
var canvas2 = document.getElementById("previa2");
var canvas3 = document.getElementById("previa3");
var ctx1 = canvas1.getContext('2d');
var ctx2 = canvas2.getContext('2d');
var ctx3 = canvas3.getContext('2d');

$("#firma1").on("change", function(e){
    manipularImagen(e, canvas1, ctx1);
});

$("#firma2").on("change", function(e){
    manipularImagen(e, canvas2, ctx2);
});

$("#firma3").on("change", function(e){
    manipularImagen(e, canvas3, ctx3);
});

function manipularImagen(e, canvas, ctx){
    var reader = new FileReader();
    reader.onload = function(event){
        var img = new Image();
        img.onload = function(){
            ctx.drawImage(img,0,0,388,90);
        }
        img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);     
}