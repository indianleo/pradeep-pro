function showdiv(id)
{
  var inf=document.getElementById("info").style.display="none";
  console.log(inf);
  var show=new XMLHttpRequest();
  var ref=id;
  show.onreadystatechange=function()
  {
	if(show.readyState==4 && show.status==200)
	{
	   var out=document.querySelector("#out");
       out.innerHTML=show.responseText;	   
	}
    else
    {
         var out2=document.querySelector("#out");
         out2.innerHTML="<img src='im/load.gif' alt='Loading'>";
    }
  }
  show.open("GET","action.php?str="+ref,true);
  show.send();  
 	
}

function find()
{
 var fr=document.querySelector("#ff").value;
 var inf=document.getElementById("container");
     inf.style.display="none";
 var inf2=document.getElementById("f_result");
     inf2.style.display="block";
 var show=new XMLHttpRequest();
  show.onreadystatechange=function()
  {
	if(show.readyState==4 && show.status==200)
	{
       inf2.innerHTML=show.responseText;	   
	}
    else
    {
         inf2.innerHTML="<img src='im/load.gif' alt='Loading'>";
    }
  }
  show.open("GET","action.php?str="+fr,true);
  show.send();
}  
  
$(document).ready(function()
{
  $(window).load(function()
  {
    $("#status").delay(495).fadeOut();
    $("#preload").delay(500).fadeOut();
	//blocksit define
	$('#container').BlocksIt({
			numOfCol: 5,
			offsetX: 8,
			offsetY: 8
		});
   });
   //$(".blur").blurjs({ source: 'body', radius: 10 });	 
	$("#btn1").click(function()
	{
		$("#grid").hide('slow');
		$("#f_result").show('slow');
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
	
	$("#l-btn").click(function()
	{
		 $("#feed-box").hide();
		 $("#l-show").show('slow').animate({left:'400px'},"slow");
	});	
    $("#l-close").click(function()
	{
      $("#l-show").hide('slow').animate({left:'100px'},"slow");
    });	  
	$("#f-btn").click(function()
	{
		  $("#l-show").hide();
		$("#feed-box").show('slow').animate({left:'420px'},"slow");
	});	
    $("#feed-close").click(function()
	{
      $("#feed-box").hide('slow');
    });	
});
  