function show_side_menu_item(item){
    var xhttp = new XMLHttpRequest();
    document.getElementById('top_banner').style.display = "none";
    document.getElementById('top_banner_temp').style.display = "block";
    var id = item.id;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("in_content").innerHTML = this.responseText;
       } else {
          document.getElementById("in_content").innerHTML = "<img src='image/loading.gif' alt='Loading...'/>";
       }
    };
    xhttp.open("POST", "resi_choose.php?action="+item.id, true);
    xhttp.send();
}

$(document).ready(function(){
    $("#ald").click(function(){
        $('[city="ald"]').slideToggle('slow');
    });
    $("#lko").click(function(){
        $('[city="lko"]').slideToggle('slow');
    });
    $('.controls').click(function(){
      $(".active_project").removeClass('active_project');
      $(this).addClass('active_project');
    });
});
