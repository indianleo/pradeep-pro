$(document).ready(function()
{
	 $(window).load(function()
	  {
		$("#status").delay(495).fadeOut();
		$("#preload").delay(500).fadeOut();
	   });
	$('#menu_btn').click(function()
	{
		$('#menu_box').toggle('slow');
		$('#menu_btn img').toggleClass('menu_spin');
		
	});
	$('#about_m').click(function()
	{
		$('#outbox').hide();
		$('#about').show('slow');
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
});
function page_out(name)
{
	var str=name;
	var out_ref=document.querySelector('#outbox');
	var page_str=new XMLHttpRequest();
	$('#about').hide();
	$('#outbox').show('slow');
	page_str.onreadystatechange=function()
	{
		if(page_str.status == 200 && page_str.readyState == 4)
		{
			out_ref.innerHTML = page_str.responseText;
		}
		else
		{
			out_ref.innerHTML = '<img class="load_img" src="image/load.gif" alt="Loading....">';
			console.log(out_ref.innerHTML);
		}
	}
	page_str.open("GET","user_action.php?str="+str,true);
	page_str.send();
}
