function summaryCheck(ref){
    switch(ref.value) {
        case 'sponsor_name' : 
                    $('.summary_group').hide();
                    $("#sponsor").parent().show();
        break;
        case 'project_name' : 
                    $('.summary_group').hide();
                    $("#project_name").parent().show();
        break;
        default :
                    $('.summary_group').hide();
                    $("#filter_value").parent().show();
        break;
    }

}

function view_records(ref){
    location.href = "records.php";
   // window.open("www.youraddress.com","_self");
}

function swicth_action_box(ref) {
    $("#back").show();console.log(ref.id);
    $("#cancel_btn").show();
    if(ref.id == "search_btn") {
        $("#edit_box").hide();
        $("#finder").show();
    } else {
        $("#finder").hide();
        $("#edit_box").show();
    }
}

function close_swicth_action_box(ref) {
    $("#back").hide();
    $("#edit_box").hide();
    $("#finder").hide();
    $("#"+ref.id).hide();
}

function checkPaymentType(ref){
    if(ref.value == "cheque") {
        $("#cheque_no").parent().show();
    } else {
        $("#cheque_no").parent().hide();
    }
}

function show_emi(details){
    var box = document.getElementById(details);
    document.getElementById('emi_box').style.display = "block";
    box.style.display = 'block';
}

function close_emi(details){
    var box = document.getElementById(details);
    document.getElementById('emi_box').style.display = "none";
    box.style.display = 'none';
}

function admin_show( elm ){
    var xhttp = new XMLHttpRequest();
    var id = elm.id;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("output").innerHTML = this.responseText;
        } else {
        document.getElementById("output").innerHTML = "<img src='image/loading.gif' alt='Loading...'/>";
        }
    };
    xhttp.open("POST", "process.php?action="+elm.id, true);
    xhttp.send();
}

$(document).ready(function(){
    $('.menu_icon').click(function(){
        $('.side_pane_menu').slideToggle('slow');
    });
    $('.main_item').click(function(){
        $('.side_pane_menu').hide('slow');
    });
});