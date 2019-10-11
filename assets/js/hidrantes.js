$(document).ready(function($) {

	$("ul.navbar-nav > li.nav-item > a").click(function(){
		$("ul.navbar-nav .submenu").fadeOut("fast");
		$(this).next().fadeIn("fast");
	});

	$("ul.navbar-nav li ul.submenu > li > a").click(function(){
		//$("ul.navbar-nav .submenu").fadeOut("fast");
		//$("section.pb_cover_v3 .container").hide();
		//$("section.pb_cover_v3 .container." + $(this).attr("contenedor")).fadeIn("fast");
	});

	$("ul.navbar-nav > li > a.seccion").click(function(){
		$("ul.navbar-nav .submenu").fadeOut("fast");
		//$("section.pb_cover_v3 .container").hide();
		//$("section.pb_cover_v3 .container." + $(this).attr("contenedor")).fadeIn("fast");
	});

	$(".form-group.ver_mapa a").click(function(){
		$("section.pb_cover_v3 .container").fadeOut("fast");
		//$(".container." + $(this).parent().attr("container")).addClass("previo");
	});

	$(".backbutton a").click(function(){
		$(".container").fadeIn("fast");
		//$(".container.previo").removeClass("previo");
	});
	$("#map div canvas").click(function(e){
		var localizacion = $("#location div").html();
		$("#locationCopied p span").html(localizacion);
		//$("#locationCopied").fadeOut("fast");
		$('#locationCopied').css({'top':e.pageY-50,'left':e.pageX, 'position':'absolute'});
		$("#locationCopied").fadeIn("fast");
		$(".form-group.localizacion input.localizacion").attr("value", localizacion);
	});
	$( "select.hidrante" ).change(function() {
		if($(this).find('option:checked').val() == 'n'){
			$(".form-group.localizacion").fadeIn("fast");
		}
		else{
			$(".form-group.localizacion").fadeOut("fast");
		}
	  });

});

