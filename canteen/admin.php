<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php include_once("header.html"); ?>
    <link href="css/products.css" rel="stylesheet" />
  </head>

  <body id="page-top">

  		  <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">ORDER AT YOUR FINGRTIP</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#items">Add Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#manage">Manage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item">
													<a href="profile.php">
                            <img src="./image/user.png" title="<?php echo $_SESSION['user']['name']; ?>" class="user nav-link js-scroll-trigger" href="User" />
													</a>
												</li>
                    </ul>
                </div>
            </div>
        </nav>

  		 <header class="masthead text-center text-white d-flex">
	      <div class="container my-auto">
	        <div class="row">
	          <div class="col-lg-10 mx-auto">
	            <h1 class="text-uppercase">
	              <strong>
	                Welcome Admin at Canteen 
	              </strong>
	            </h1>
	            <hr>
	          </div>
	          <div class="col-lg-8 mx-auto">
	            <p class="text-faded mb-5">
	              Here you can add new food items and See orders 
	            </p>
	            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#items">Add Products</a>
	          </div>
	        </div>
	      </div>
	    </header>

	    <section class="bg-info" id="items">
            <div class="container">
                <form action="action.php" class="" method="post" id="item_upload_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="item_upload" />
                    <div class="form-group row">
                        <label for="item_name" class="col-sm-2 col-form-label">Item Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Name" required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="item_image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                        <input type="file" class="form-control" id="item_image" name="item_image" placeholder="Select Image" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="item_amt" class="col-sm-2 col-form-label">Ammount</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" name="item_amt" id="item_amt" placeholder="Ammount" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-sm" id="submit_reg" value="Submit" />
                            <input type="reset" class="btn btn-sm" id="clear_reg" value="Clear" />
                        </div>
                    </div>
                </form>
            </div>
		</section>
			
		<section class="" id="manage">
	      <div class="container">
            <div class="btn-group">
              <button type="button" onclick="loadData('menu')" class="btn btn-primary">Menu</button>
              <button type="button" onclick="loadData('orderList')" class="btn btn-primary">Orders</button>
              <button type="button" onclick="loadData('emp')" class="btn btn-primary">Users</button>
            </div>
            <div id="layout">
            </div>
	      </div>
	    </section>

  	 	<?php include_once("footer.html"); ?>
       <script>
            function loadData(type){
                var show = new XMLHttpRequest();
                var out = document.querySelector("#layout");
								out.innerHTML='<img src="./image/loading.gif" style="width: 100%;"alt="Loading..." />';
								show.onreadystatechange=function() {
									if(show.readyState == 4 && show.status==200) {
                     //console.log(show.responseText);
											out.innerHTML=show.responseText;	
									} 
								}
								show.open("GET","action.php?action="+type,true);
								show.send(); 
            }

            function delItem(id,table){
                var show = new XMLHttpRequest();
								show.onreadystatechange=function() {
									if(show.readyState == 4 && show.status==200) {
											if(show.responseText == 'Deleted'){
                        document.querySelector("#"+table+"_"+id).className += ' disabled';
                      }	
									} 
								}
                console.log(id,table);
								show.open("GET","action.php?action=del&id="+id+"&table="+table,true);
								show.send(); 
            }

            function block(id,tag,table){
              var show = new XMLHttpRequest();
								show.onreadystatechange=function() {
									if(show.readyState == 4 && show.status==200) {
                    document.querySelector("#users_status_"+id).innerHTML = show.responseText;	
									} 
								}
								show.open("GET","action.php?action=block&id="+id+"&tag="+tag+"&table="+table,true);
								show.send();
            }

            function setOrder(id){
              var show = new XMLHttpRequest();
								show.onreadystatechange=function() {
									if(show.readyState == 4 && show.status==200) {
                    document.querySelector("#order_status_"+id).innerHTML = show.responseText;	
									} 
								}
								show.open("GET","action.php?action=setOrder&id="+id,true);
								show.send();
            }
       </script>
  </body>

 </html>