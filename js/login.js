$(window).on("load" , function(){
	setTimeout(function(){ 
 		$('#cont-preload').fadeOut('slow');
		$('body').css({'overflow':'visible'});
 	}, 1000);
})