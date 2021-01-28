<?php
    session_start();
?>
<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
    </head>
    <body>
        <div class="menu_holder index_top">
            <?php include_once('menu.html'); ?>
        </div>
        <div style="height:100px;"></div>
        <div class="container">
            <div class="center">
                <img 
                    src = "icon/user.png" 
                    alt = "propic" 
                    style = "height:150px;"
                />
            </div>
            <div class="center vFlex">   
                <h1>
                    <?php echo($_SESSION['user']['name']) ?>
                </h1>
                <h5>
                    <b>Welcome in Indian Information World</b>
                </h5>
                <p>
                    Explore Menu to find desired Place.
                </p>
            </div>
        </div>

        <div>
            <?php include_once('footer.html'); ?>
        </div>

    </body>
</html>