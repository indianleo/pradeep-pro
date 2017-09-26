<!doctype html>
<html>
  <head>
      <?php include('header.html'); ?>
      <link rel="stylesheet" href="main.css" type="text/css"/>
  </head>
  <body>
      <div id="header container-fluid" class="header">
          <?php include('menu.html'); ?>
      </div>
      <div class="map_box">
        <?php 
            $action = @$_REQUEST['map_name'];
            switch($action){
                case 'prayag_valley' : echo('Map not created');
                break;
                default : echo('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d858.6377787744304!2d81.83190605752235!3d25.452302648664727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399acadb44e83c49%3A0x2975855d0d08d435!2sMilan+Plaza%2C+Stretchy+Rd%2C+Civil+Lines%2C+Allahabad%2C+Uttar+Pradesh+211001!5e1!3m2!1sen!2sin!4v1491038048986" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>');
                break;
            }
        ?>
            
      </div>
      <div class="footer" id="footer">
          <?php include('footer.html'); ?>
      </div>
  </body>
</html>