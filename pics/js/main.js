
$(document).ready(function()
{
	 $(window).load(function()
	  {
		$("#status").delay(495).fadeOut();
		$("#preload").delay(500).fadeOut();
	   });
	$('a[href^="#"]').on('click',function (e) 
	{
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
	$('#menu_btn').click(function()
	{
		$('#menu_box').toggle('slow');
		$('#menu_btn img').toggleClass('menu_spin');
		
	});
	$('.menu_item').hover(function()
	{
		$('#'+this.id).find('.menu_text').show('slow');
		
	},function()
	{
		$('#'+this.id).find('.menu_text').hide('slow');
	});
	//vendor script
	$('#header')
	.css({ 'top':-50 })
	.delay(1000)
	.animate({'top': 0}, 800);
	
	$('#footer')
	.css({ 'bottom':-15 })
	.delay(1000)
	.animate({'bottom': 0}, 800);
	
	//window resize
	var currentWidth = 1100;
	$(window).resize(function() {
		var winWidth = $(window).width();
		var conWidth;
		if(winWidth < 660) {
			conWidth = 440;
			col = 2
		} else if(winWidth < 880) {
			conWidth = 660;
			col = 3
		} else if(winWidth < 1100) {
			conWidth = 880;
			col = 4;
		} else {
			conWidth = 1100;
			col = 5;
		}
		
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			$('#container').width(conWidth);
			$('#container').BlocksIt({
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
		}
	});
	$.ajax({
			url: showroom.php,
			success: function(data) 
			{
				$('.show_box').html(data);
			},
			error:function()
			{
				$('.show_box').html("<b>Loading....</b>");

			}
		});
	$('#search_btn').click(function()
	{
		var str = $('#search_bar').val();
		$.ajax({
			url: "search.php?str="+str,
			success: function(data) 
			{
				$('.show_box').html(data);
			},
			error:function()
			{
				$('.show_box').html("<b>Loading....</b>");

			}
		});
	});
});