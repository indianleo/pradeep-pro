$(function () 
	{
	  $('[data-toggle="tooltip"]').tooltip()
	});
$(document).ready(function()
{
	/*
			$(window).on(load,function()
			{

				var mapMarkers = {
					"markers": [
						{
							"latitude": "25.444321",
							"longitude":"81.782484",
							"icon": "icon/logo.png"
						}
					]
				};

				$("#map_canvas").mapmarker({
					zoom : 14,
					center: "25.444321, 81.782484",
					dragging:1,
					mousewheel:0,
					markers: mapMarkers,
					featureType:"all",
					visibility: "on",
					elementType:"geometry"
				});
			
			});

		*/

	$('.help_box_menu').on('click',function()
	{
		var target_content = $(this).attr('target');
		//alert(target_content);
		$('.help_target_box').find('.active').removeClass('active');
		$('#'+target_content).addClass('active');
	});

	$('a[href^="#"]').on('click',function (e) 
	{
	    e.preventDefault();
	    console.log($(this).attr('href'));
	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});

	$(window).scroll(function()
	{
		if ($(this).scrollTop() > 100) 
		{
			$('.top_scroll').fadeIn();
		} 
		else 
		{
			$('.top_scroll').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.top_scroll').click(function()
	{
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
});