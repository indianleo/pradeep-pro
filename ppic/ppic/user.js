function ajaxFileUpload(upload_field)
{
// Checking file type
var re_text = /\.jpg|\.gif|\.jpeg/i;
var filename = upload_field.value;
if (filename.search(re_text) == -1) 
{
alert("File should be either jpg or gif or jpeg");
upload_field.form.reset();
return false;
}
document.getElementById('picture_preview').innerHTML = '<div><img src="im/load.gif" border="0" /></div>';
upload_field.form.action = 'process2.php';
upload_field.form.target = 'upload_iframe';
upload_field.form.submit();
upload_field.form.action = '';
upload_field.form.target = '';
return true;
}

function viewbox(id)
{
  var view=new XMLHttpRequest();
  var v_ref=id;
  var h_ref=document.getElementById("picture_preview").innerHTML="<img src='im/record.png' alt='Document Upload'>";
  view.onreadystatechange=function()
  {
	if(view.readyState==4 && view.status==200)
	{
		var o_ref=document.querySelector("#view_up");
        o_ref.innerHTML=view.responseText;	   
	}
    else
    {
		 var o_ref=document.querySelector("#view_up");
         o_ref.innerHTML="<img src='im/load.gif' alt='Loading'>";
    }
  }
  view.open("GET","v-action.php?str="+v_ref,true);
  view.send();  
 	
}
function viewbox2(id)
{
  var view=new XMLHttpRequest();
  var v_ref=id;
  view.onreadystatechange=function()
  {
	if(view.readyState==4 && view.status==200)
	{
		var o_ref=document.querySelector("#view-c");
        o_ref.innerHTML=view.responseText;	   
	}
    else
    {
		 var o_ref=document.querySelector("#view-c");
         o_ref.innerHTML="<img src='im/load.gif' alt='Loading'>";
    }
  }
  view.open("GET","v-action.php?str="+v_ref,true);
  view.send();  
 	
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
	
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
	$("#doc_actin").click(function()
	{
		$("#pre").hide();
    });
    $("#pic_inact").click(function()
	{
		$("#pre").show();
    });	
});
  