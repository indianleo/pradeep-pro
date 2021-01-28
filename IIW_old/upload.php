<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
        <link rel="stylesheet" type="text/css" href="css/upload.css" />
    </head>
    <body>
        <div class="menu_holder index_top">
            <?php include_once('menu.html'); ?>
        </div>
        <div style="height:70px;" ></div>
        <div class="side_menu">
            <div class="side_menu_items center" id="news_upload" onclick="fetchLayout(this)">
                News Upload
            </div>
            <div class="side_menu_items center" id="records_upload" onclick="fetchLayout(this)">
                Records Upload
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="interface" class="interface box_gray" >
                        <div class="center vFlex" style="height:100%;color:#f2f2f2;">
                            <h1>
                                Tell Everyone to what is Happening there.
                            </h1>
                            <h3>
                                Value on the display everyday.
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>

        <div>
            <?php include_once('footer.html'); ?>
        </div>

        <script>
            function fetchLayout( item ){
                var id = item.id;
                var req = new XMLHttpRequest();
				req.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("interface").innerHTML = this.responseText;
					} else {
						document.getElementById("interface").innerHTML = "<div style='margin:auto;'><i class='fa fa-spinner fa-3x'></div>";
					}
				};
				req.open("POST", "action.php?action="+id, true);
				req.send();
			}
            
			$(document).ready(function(){
				$('.side_menu_icon').click(function(){
					$('.side_menu').slideToggle('slow');
				});
				$('#output').click(function(){
					$('.side_pane_menu').hide('slow');
				});
			});
        </script>
    </body>
</html>