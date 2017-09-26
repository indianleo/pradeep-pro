<!doctype html>
<html>
  <head>
      <?php include('header.html'); ?>
      <link rel="stylesheet" href="resi.css" type="text/css"/>
      <script src="resi.js"></script>

  </head>
  <body>
      <div id="header container-fluid" class="header">
          <?php include('menu.html'); ?>
      </div>
      <div class="top_banner container-fluid" id="top_banner">
         <div class="resi_banner">
              <div class="back"></div>
             <div class="resi_banner_inner">
                 <h1 class="side_border" style="color:#fff;">ARY Infra Realcon Projects</h1>
                 <h4 style="color:#fff;">You can explore project details and location here.</h4>
                 <div class="top_banner_btn">
                    <a href="#ald" style="color:#fff;text-decoration:none;"><h4>Explore</h4></a>
                 </div>
             </div>
          </div>
      </div>
      <div class="top_banner_temp container-fluid" id="top_banner_temp">
      </div>
      <div class="main_section container-fluid">
          <div class="row">
              <div class="col-sm-2 side_menu">
                  <div class="side_menu_items controls" id="plot_find" onclick="show_side_menu_item(this)">
                      Plot Availbility
                  </div>
                  <div class="side_menu_items" id="ald">
                      Allahabad
                  </div>
                  <div class="side_submenu" city="ald">
                      <div class="side_submenu_items controls" id="ald_pryag_valley" onclick="show_side_menu_item(this)">
                          Pryag Valley
                      </div>
                      <div class="side_submenu_items controls"id="ald_royal_pryag" onclick="show_side_menu_item(this)">
                          Royal Pryag
                      </div>
                      <div class="side_submenu_items controls"id="ald_stallion" onclick="show_side_menu_item(this)">
                          Royal Stallion Country
                      </div>
                      <div class="side_submenu_items controls"id="ald_green" onclick="show_side_menu_item(this)">
                          Green Estate
                      </div>
                  </div>
                  <div class="side_menu_items" id="lko">
                      Lucknow
                  </div>
                  <div class="side_submenu" city="lko">
                      <div class="side_submenu_items controls" id="lko_diamond" onclick="show_side_menu_item(this)">
                          Diamond City
                      </div>
                      <div class="side_submenu_items controls" id="lko_manglamGreen" onclick="show_side_menu_item(this)">
                          Mangalam&Green
                      </div>
                  </div>
              </div>
              <div class="col-sm-10 content">
                  <div class="in_content" id="in_content">
                      <div class="tips">
                        <h1 style="border-left:3px solid #4ec2e6;padding:10px;">Project Informations</h1>
                        <h4>You can explore all the things about the 
                            <span class="c_theme">Projects</span> accordingto <span class="c_theme">City</span> here. 
                            This is a platform which provides a safe and fast service to their coustomers. 
                        </h4>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer" id="footer">
          <?php include('footer.html'); ?>
      </div>
  </body>
</html>
