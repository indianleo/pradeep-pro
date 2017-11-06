function modalLocal(node) {
    var ref = node.getAttribute('source');
    var data = document.querySelector("#"+ref).innerHTML;
    document.querySelector("#modal_content").innerHTML = data;
    $("#modal").fadeIn('slow');
}

function closeModal(){
    $("#modal").fadeOut('slow');
}
$(document).ready(function(){
    var height = screen.height;
    $(".menu_icon").click(function(){
        if( $(this).attr('state') == 'hide' ){
            $(".menu_items").css({'position':'initial','height':'30px'});
            $(".menu_back").css({'height':'30px'});
            $(this).attr('state','show');
        } else{
            $(".menu_items").css({'position':'absolute','height':'5px'});
            $(".menu_back").css({'height':'5px'});
            $(this).attr('state','hide');
        }
        $(".menu_items a").toggle();
    });
    $("#top_container").height(height-100);
});