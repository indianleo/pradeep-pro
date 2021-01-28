<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
        <link href="css/search.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div class="menu_holder index_top">
            <?php include_once('menu.html'); ?>
        </div>
        <div style="height:55px;"></div>
        <div class="search_pane container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <br />
                    <div class="input-group search_bar">
                        <input type="search" class="form-control login_inputs" name="search_input" id="search_input" aria-describedby="user_id" placeholder="Enter content, Keywords, Tags, Places, Name and Connections to Search here." />
                        <span class="input-group-addon login_label" onclick="find(this)">Search</span>
                    </div>
                    <br/>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br/>
                    <div class="search_box box_bottom" id="search_data">
                        <br/>
                        <h1 class="center">
                            Welcome in <span style="color:#C70039;padding:0 5px;">Information</span> Hub
                        </h1>
                        <h3 class="center">
                            Here you can search any type of data
                        </h3>
                        <h4 class="center">
                            This is the place where you can search data with 
                            relevent history or user openions.
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <?php include_once('footer.html'); ?>
        </div>
        <script>
            function setRating( node ) {
                let id = node.getAttribute('record_id');
                let type = node.getAttribute('type');
                let query = `action=setRating&id=${id}&type=${type}`;
                let trigger  = new XMLHttpRequest();
                trigger.onreadystatechange=function()
                {
                    if(trigger.readyState==4 && trigger.status==200)
                    {
                        console.log(trigger.responseText);	   
                    }
                    else
                    {
                        console.log("loading...");
                    }
                }
                trigger.open("POST","web_action.php?"+query,true);
                trigger.send();
            }

            function find(){
                var source = document.getElementById("search_input");
                var output = document.getElementById("search_data");
                var show=new XMLHttpRequest();
                show.onreadystatechange=function()
                {
                    if(show.readyState==4 && show.status==200)
                    {
                        output.innerHTML=show.responseText;	   
                    }
                    else
                    {
                        output.innerHTML="<div class='center'><img src='image/load.gif' alt='Loading'></div>";
                    }
                }
                show.open("POST","search_action.php?data="+source.value,true);
                show.send(); 
            }
        </script>
    </body>
</html>