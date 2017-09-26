<?php
  $action = $_REQUEST['action'];
  switch($action){
    case 'plot_find' : plot_find();
    break;
    case 'ald_pryag_valley' : ald_pryag_valley();
    break;
    case 'ald_royal_pryag' : ald_royal_pryag();
    break;
    case 'ald_stallion' : ald_stallion();
    break;
    case 'ald_green'    : ald_green();
    break;
    case 'lko_diamond' : lko_diamond();
    break;
    case 'lko_manglamGreen' : lko_manglamGreen();
    break;
    default : echo "Un-Identified Action Performed !!!";
    break;
  }

  function plot_find(){
      $html = "<div class='container-fluid'>
                  <h3 class='title'>PLOT AVAILABILITY</h3>
                  <br/>
                  <div>
                    <form method='post' action='process.php'>
                      <div class='row form-group'>
                          <div class='col-sm-2'>
                              <label for='site_name'>Site Name</label>
                          </div>
                          <div class='col-sm-6'>
                              <input type='text' name='site_name' class='form-control' id='site_name' placeholder='Site Name'/>
                          </div>
                      </div>
                      <div class='row form-group'>
                          <div class='col-sm-2'>
                              <label for='sector'>Sector</label>
                          </div>
                          <div class='col-sm-6'>
                              <input type='text' name='sector' class='form-control' id='sector' placeholder='Sector'/>
                          </div>
                      </div>
                      <div class='row form-group'>
                          <div class='col-sm-2'>
                              <label for='block'>Block</label>
                          </div>
                          <div class='col-sm-6'>
                              <input type='text' name='block' class='form-control' id='block' placeholder='Block'/>
                          </div>
                      </div>
                      <div class='row form-group'>
                          <div class='col-sm-2'>
                              <label for='plot_no'>Plot No.</label>
                          </div>
                          <div class='col-sm-6'>
                              <input type='text' name='plot_no' class='form-control' id='plot_no' placeholder='Plot No.'/>
                          </div>
                      </div>
                      <div class='row form-group'>
                        <div class='col-sm-4'>
                            <input type='submit' name='submit_btn' class='btn btn-success' id='submit_btn' value='Submit'/>
                            <input type='reset' name='clear_btn' class='btn btn-danger' id='clear_btn' value='Clear'/>
                        </div>
                      </div>
                   </form>
                  </div>
                </div>
      ";
      echo $html;
  }

  function ald_pryag_valley(){
    $html = "<div class='container-fluid'>
                <div class='row'>
                  <div class='col-sm-9'>
                      <h3 class='title'>Prayag Valley</h3>
                      <br/>
                        <h3 class='title_bg'>Prayag Valley: 700/-</h3>
                        <br/>
                        <p>
                          ARY Infra Realcon's primary business is development of residential,
                          commercial and retail properties. The Company has a unique
                          business model with earnings arising from development ARY Infra Realcon
                          offers you the opportunity to live life in a relaxed yet
                          grand way. So while you sip on chai with your friends, or
                          read a book while enjoying the scenery or simply take a
                          walk with your loved once, we see to it that your home
                          and its amenities are a perfect blend of comfort and style.
                        </p>
                        <p>
                          An eco friendly approach is kept to design the layout of
                          the whole projects.Prayag Valley is a perfect place to
                          settle with your loved one. A project with modern
                          infrastructure yet connected to Mother Nature in deeper
                          sense which provides peace of mind and soul to the lives
                          of the people owning a home at Prayag Valley.
                        </p>
                        <br/>
                        <h3 class='title_bg'>AMENITIES AT THE PROJECT</h3>
                        <table class='table table-hover table-bordered'>
                            <tr class='warning'>
                                <td>Kids Park</td>
                                <td>Education Center</td>
                                <td>Yoga Center</td>
                            </tr>
                            <tr class='danger'>
                                <td>Hospitals</td>
                                <td>Railway Station</td>
                                <td>High Court</td>
                            </tr>
                            <tr class='success'>
                                <td>Airport</td>
                                <td>IIIT</td>
                                <td>Khelhgaon</td>
                            </tr>
                            <tr class='warning'>
                                <td>Commercial Centers</td>
                                <td>United Knowledge City</td>
                                <td>Drainage</td>
                            </tr>
                        </table>
                        <br/>
                        <h3 class='title_bg'>EMI Plans</h3>
                        <table class='table table-hover table-bordered'>
                          <tr class='danger'>
                              <th>Plot Name</th>
                              <th>Area sq.ft</th>
                              <th>Total Amount</th>
                              <th>Down Payment(40%)</th>
                              <th>Balnce</th>
                              <th>24 EMI</th>
                          </tr>
                          <tr>
                              <td>Plot-A(167)</td>
                              <td>1800(30x60)</td>
                              <td>12,60,000.00</td>
                              <td>5,04,000.00</td>
                              <td>7,56,000.00</td>
                              <td>31,500.00</td>
                          </tr>
                          <tr>
                              <td>Plot-B(94)</td>
                              <td>1500(25x60)</td>
                              <td>10,50,000.00</td>
                              <td>4,20,000.00</td>
                              <td>6,30,000.00</td>
                              <td>26,250.00</td>
                          </tr>
                          <tr>
                              <td>Plot-C(82)</td>
                              <td>1350(22.6x60)</td>
                              <td>9,45,000.00</td>
                              <td>3,78,000.00</td>
                              <td>5,67,000.00</td>
                              <td>23,635.00</td>
                          </tr>
                          <tr>
                              <td>Plot-D(17)</td>
                              <td>1250(25x50)</td>
                              <td>8,75,000.00</td>
                              <td>3,50,000.00</td>
                              <td>5,25,000.00</td>
                              <td>21,875.00</td>
                          </tr>
                          <tr>
                              <td>Plot-E(237)</td>
                              <td>900(20x45)</td>
                              <td>6,30,000.00</td>
                              <td>2,52,000.00</td>
                              <td>3,78,000.00</td>
                              <td>15,750.00</td>
                          </tr>
                          <tr>
                              <td>Plot-F(25)</td>
                              <td>1000(20x50)</td>
                              <td>7,00,000.00</td>
                              <td>2,80,000.000</td>
                              <td>4,20,000.00</td>
                              <td>17,500.00</td>
                          </tr>
                          <tr>
                              <td>Plot-G(16)</td>
                              <td>1500(30x50)</td>
                              <td>10,50,000.00</td>
                              <td>4,20,000.00</td>
                              <td>6,30,000.00</td>
                              <td>26,250.00</td>
                          </tr>
                        </table>
                        <br/>
                        <h3 class='title_bg'>PROJECT LOCATION DETAILS</h3>
                        <table class='table table-hover table-bordered'>
                          <tr class='warning'>
                              <td>
                                  Location :
                              </td>
                              <td>
                                  Jhalwa, Allahabad
                              </td>
                          </tr>
                        </table>
                        <br/>
                        <h3 class='title_bg'>Project Media</h3>
                        <div class='project_media'>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <img src='image/pryag_valley.jpg' class='project_image img-responsive' alt='pryag_valley'/>
                                </div>
                                <div class='col-sm-6'>
                                    <img src='image/pryag_valley_map.jpg' class='project_image img-responsive' alt='pryag_valley_map'/>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class='col-sm-3'>
                      <h3 class='title'>PLC Applicable</h3>
                      <br/>
                      <div class='side_box'>
                          Corner 10%
                      </div>
                      <div class='side_box'>
                          Park Face 10%
                      </div>
                      <div class='side_box'>
                          Commercial 10%
                      </div>
                      <div class='side_box'>
                          Max PLC charge Only 10%
                      </div>
                  </div>
             </div>
          </div>
    ";
    echo $html;
  }

  function ald_royal_pryag(){
    $html = "<div class='container-fluid'>
                <div class='row'>
                  <div class='col-sm-9'>
                      <h3 class='title'>Royal Prayag</h3>
                      <br/>
                        <h3 class='title_bg'>Royal Prayag: 800/-</h3>
                        <br/>
                        <p>
                          ARY Infra Realcon's primary business is development of residential,
                          commercial and retail properties. The Company has a unique
                          business model with earnings arising from development ARY Infra Realcon
                          offers you the opportunity to live life in a relaxed yet
                          grand way. So while you sip on chai with your friends, or
                          read a book while enjoying the scenery or simply take a
                          walk with your loved once, we see to it that your home
                          and its amenities are a perfect blend of comfort and style.
                        </p>
                        <p>
                          An eco friendly approach is kept to design the layout of
                          the whole projects. Royal Prayag is a perfect place to
                          settle with your loved one. A project with modern
                          infrastructure yet connected to Mother Nature in deeper
                          sense which provides peace of mind and soul to the lives
                          of the people owning a home at Royal Prayag.
                        </p>
                        <br/>
                        <h3 class='title_bg'>AMENITIES AT THE PROJECT</h3>
                        <table class='table table-hover table-bordered'>
                            <tr class='warning'>
                                <td>CC Road</td>
                                <td>Fully Devloped Parks</td>
                                <td>Commercial Space</td>
                            </tr>
                            <tr class='danger'>
                                <td>24x7 Security</td>
                                <td>Electric Poles</td>
                                <td>Drainage</td>
                            </tr>
                            <tr class='success'>
                                <td>Hospitals</td>
                                <td>Collage Space</td>
                                <td>Community Center</td>
                            </tr>
                            <tr class='warning'>
                                <td>Green Land</td>
                                <td>Plot Demcration</td>
                                <td>Commercial Places</td>
                            </tr>
                        </table>
                        <br/>
                        <h3 class='title_bg'>EMI PLANS</h3>
                        <table class='table table-bordered table-hover'>
                            <tr>
                                <th>Area of Sq.ft.</th>
                                <th>Rate</th>
                                <th>Total Amount</th>
                                <th>Down Payment 40%</th>
                                <th>Balance</th>
                                <th>30 EMI</th>
                            </tr>
                            <tr>
                                <td>1000</td>
                                <td>800</td>
                                <td>8,00,000.00</td>
                                <td>3,20,000.00</td>
                                <td>4,80,000.00</td>
                                <td>16,000.00</td>
                            </tr>
                            <tr>
                                <td>1800</td>
                                <td>800</td>
                                <td>14,40,000.00</td>
                                <td>5,76,000.00</td>
                                <td>8,64,000.00</td>
                                <td>28,800.00</td>
                            </tr>
                            <tr>
                                <td>2105</td>
                                <td>800</td>
                                <td>16,84,000.00</td>
                                <td>6,73,600.00</td>
                                <td>10,10,400.00</td>
                                <td>33,680.00</td>
                            </tr>
                        </table>
                        <br/>
                        <div class='alert alert-success' role='alert'>
                            EMI Plan <strong>40%</strong> booking and balnce <strong>60%</strong> will be divided by No. of <strong>30</strong> EMIs.
                        </div>
                        <h3 class='title_bg'>PROJECT LOCATION DETAILS</h3>
                        <br/>
                        <table class='table table-hover table-bordered'>
                          <tr class='warning'>
                              <td>
                                  Location :
                              </td>
                              <td>
                                  Iradatganj, Reewa Road
                              </td>
                          </tr>
                        </table>
                        <h3 class='title_bg'>Project Media</h3>
                        <div class='project_media'>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <img src='image/royal_prayag.jpg' class='project_image img-responsive' alt='royal_prayag'/>
                                </div>
                                <div class='col-sm-6'>
                                    <img src='image/royal_prayag_map.jpg' class='project_image img-responsive' alt='royal_prayag_map'/>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class='col-sm-3'>
                      <h3 class='title'>PLC Applicable</h3>
                      <br/>
                      <div class='side_box'>
                          Corner and black Top road 10% of BSP
                      </div>
                      <div class='side_box'>
                          Park Facing 10% of BSP
                      </div>
                      <div class='side_box'>
                          Max PLC charge Only 10%
                      </div>
                  </div>
             </div>
          </div>
    ";
    echo $html;
  }

  function ald_stallion(){
      $html ="
              <div class='container-fluid'>
                  <div class='row'>
                    <div class='col-sm-9'>
                        <h3 class='title'>Royal Stallion Country</h3>
                        <br/>
                          <h3 class='title_bg'>Royal Stallion Country: 600/-</h3>
                          <br/>
                          <p>
                            ARY Infra Realcon's primary business is development of residential,
                            commercial and retail properties. The Company has a unique
                            business model with earnings arising from development ARY Infra Realcon
                            offers you the opportunity to live life in a relaxed yet
                            grand way. So while you sip on chai with your friends, or
                            read a book while enjoying the scenery or simply take a
                            walk with your loved once, we see to it that your home
                            and its amenities are a perfect blend of comfort and style.
                          </p>
                          <p>
                            An eco friendly approach is kept to design the layout of
                            the whole projects. Royal Stallion Country is a perfect place to
                            settle with your loved one. A project with modern
                            infrastructure yet connected to Mother Nature in deeper
                            sense which provides peace of mind and soul to the lives
                            of the people owning a home at Royal Stallion Country.
                          </p>
                          <br/>
                          <h3 class='title_bg'>AMENITIES AT THE PROJECT</h3>
                          <table class='table table-hover table-bordered'>
                              <tr class='warning'>
                                  <td>Comercial Place</td>
                                  <td>Kids Park</td>
                                  <td>Educational Center</td>
                              </tr>
                              <tr class='danger'>
                                  <td>Hospitals</td>
                                  <td>Roads</td>
                                  <td>Yoga Center</td>
                              </tr>
                              <tr class='success'>
                                  <td>Electric Poll</td>
                                  <td>Comercial Centers</td>
                                  <td>Drainage</td>
                              </tr>
                          </table>
                          <h3 class='title_bg'>Payement Schedule</h3>
                          <br/>
                          <table class='table table-hover table-bordered'>
                              <tr class='danger'>
                                  <th>Plot Size</th>
                                  <th>Total Amount</th>
                                  <th>Down Payment(40%)</th>
                                  <th>EMI(36)</th>
                                  <th>Down Payment(25%)</th>
                                  <th>EMI(24)</th>
                              </tr>
                              <tr>
                                  <td>1800(30x60)</td>
                                  <td>10,80,000.00</td>
                                  <td>4,32,000.00</td>
                                  <td>18,000.00</td>
                                  <td>2,70,000.00</td>
                                  <td>33,750.00</td>
                              </tr>
                              <tr>
                                  <td>1250(25x25)</td>
                                  <td>7,50,000.00</td>
                                  <td>3,00,000.00</td>
                                  <td>12,500.00</td>
                                  <td>1,87,000.00</td>
                                  <td>33,438.00</td>
                              </tr>
                              <tr>
                                  <td>1000(20X50)</td>
                                  <td>6,00,000.00</td>
                                  <td>2,40,000.00</td>
                                  <td>10,000.00</td>
                                  <td>1,50,000.00</td>
                                  <td>18,750.00</td>
                              </tr>
                              <tr>
                                  <td>648(18X36)</td>
                                  <td>3,88,800.00</td>
                                  <td>1,55,520.00</td>
                                  <td>6,480.00</td>
                                  <td>97,200.00</td>
                                  <td>12,150.00</td>
                              </tr>
                          </table>
                          <br/>
                          <h3 class='title_bg'>PROJECT LOCATION DETAILS</h3>
                          <table class='table table-hover table-bordered'>
                            <tr class='warning'>
                                <td>
                                    Location :
                                </td>
                                <td>
                                    Gauhaniya, Allahabad
                                </td>
                            </tr>
                          </table>
                          <br/>
                          <h3 class='title_bg'>Project Media</h3>
                          <div class='project_media'>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <img src='image/royal_stallion.jpg' class='project_image img-responsive' alt='royal_stallion'/>
                                </div>
                                <div class='col-sm-6'>
                                    <img src='image/royal_stallion_map.jpg' class='project_image img-responsive' alt='royal_stallion_map'/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <h3 class='title'>PLC Applicable</h3>
                        <br/>
                        <div class='side_box'>
                            Corner 10%
                        </div>
                        <div class='side_box'>
                            Park Face 10%
                        </div>
                        <div class='side_box'>
                            Max PLC charge Only 10%
                        </div>
                    </div>
               </div>
            </div>
      ";
      echo $html;
  }
  function ald_green(){
    $html = "<div class='container-fluid'>
                <div class='row'>
                  <div class='col-sm-9'>
                      <h3 class='title'>Green Estate</h3>
                      <br/>
                        <h3 class='title_bg'>Green Estate: 1800/-</h3>
                        <p><b>ADA Approved plots also available @ 2400/- per square.</b></p>
                        <br/>
                        <p>
                          ARY Infra Realcon's primary business is development of residential,
                          commercial and retail properties. The Company has a unique
                          business model with earnings arising from development ARY Infra Realcon
                          offers you the opportunity to live life in a relaxed yet
                          grand way. So while you sip on chai with your friends, or
                          read a book while enjoying the scenery or simply take a
                          walk with your loved once, we see to it that your home
                          and its amenities are a perfect blend of comfort and style.
                        </p>
                        <p>
                          An eco friendly approach is kept to design the layout of
                          the whole projects. Green Estate is a perfect place to
                          settle with your loved one. A project with modern
                          infrastructure yet connected to Mother Nature in deeper
                          sense which provides peace of mind and soul to the lives
                          of the people owning a home at Green Estate.
                        </p>
                        <br/>
                        <h3 class='title_bg'>AMENITIES AT THE PROJECT</h3>
                        <table class='table table-hover table-bordered'>
                            <tr class='warning'>
                                <td>Comercial Place</td>
                                <td>Kids Park</td>
                                <td>Educational Center</td>
                            </tr>
                            <tr class='danger'>
                                <td>Hospitals</td>
                                <td>Roads</td>
                                <td>Shops</td>
                            </tr>
                            <tr class='success'>
                                <td>Electric Poll</td>
                                <td>Comercial Centers</td>
                                <td>Drainage</td>
                            </tr>
                        </table>
                        <br/>
                        <h3 class='title_bg'>Payement Schedule</h3>
                        <table class='table table-hover table-bordered'>
                            <tr class='danger'>
                                <th>Plot Name</th>
                                <th>Plot Size</th>
                                <th>Toala Amount</th>
                                <th>Down Payment(40%)</th>
                                <th>Balance</th>
                                <th>EMI(18)</th>
                            </tr>
                            <tr>
                                <td>Plot-GW(64)</td>
                                <td>900(20x45)</td>
                                <td>12,60,000.00</td>
                                <td>5,04,000.00</td>
                                <td>7,56,000.00</td>
                                <td>42,000.00</td>
                            </tr>
                            <tr>
                                <td>Plot-GX(100)</td>
                                <td>1000(20x50)</td>
                                <td>14,00,000.00</td>
                                <td>5,60,000.00</td>
                                <td>8,40,000.00</td>
                                <td>46,667.00</td>
                            </tr>
                            <tr>
                                <td>Plot-GY(20)</td>
                                <td>1350(30x45)</td>
                                <td>18,90,000.00</td>
                                <td>7,56,000.00</td>
                                <td>11,34,000.00</td>
                                <td>63,000.00</td>
                            </tr>
                            <tr>
                                <td>Plot-GZ(16)</td>
                                <td>1575(35x45)</td>
                                <td>22,05,000.00</td>
                                <td>8,82,000.00</td>
                                <td>13,23,000.00</td>
                                <td>73,500.00</td>
                            </tr>
                        </table>
                         <br/>
                        <h3 class='title_bg'>PROJECT LOCATION DETAILS</h3>
                        <table class='table table-hover table-bordered'>
                          <tr class='warning'>
                              <td>
                                  Location :
                              </td>
                              <td>
                                  Jhusi, Allahabad
                              </td>
                          </tr>
                        </table>
                  </div>
                  <div class='col-sm-3'>
                      <h3 class='title'>PLC Applicable</h3>
                      <br/>
                      <div class='side_box'>
                          Corner 10%
                      </div>
                      <div class='side_box'>
                          Park Face 10%
                      </div>
                      <div class='side_box'>
                          Max PLC charge Only 10%
                      </div>
                  </div>
             </div>
          </div>";
    echo $html;
  }
  function lko_diamond(){
    $html = "<div class='container-fluid'>
                <div class='row'>
                  <div class='col-sm-9'>
                      <h3 class='title'>Diamond City</h3>
                      <br/>
                        <h3 class='title_bg'>Diamond City: 851 & 951/-</h3>
                        <br/>
                        <p>
                          ARY Infra Realcon's primary business is development of residential,
                          commercial and retail properties. The Company has a unique
                          business model with earnings arising from development ARY Infra Realcon
                          offers you the opportunity to live life in a relaxed yet
                          grand way. So while you sip on chai with your friends, or
                          read a book while enjoying the scenery or simply take a
                          walk with your loved once, we see to it that your home
                          and its amenities are a perfect blend of comfort and style.
                        </p>
                        <p>
                          An eco friendly approach is kept to design the layout of
                          the whole projects. Diamond City is a perfect place to
                          settle with your loved one. A project with modern
                          infrastructure yet connected to Mother Nature in deeper
                          sense which provides peace of mind and soul to the lives
                          of the people owning a home at Diamond City.
                        </p>
                        <br/>
                        <h3 class='title_bg'>AMENITIES AT THE PROJECT</h3>
                        <table class='table table-hover table-bordered'>
                            <tr class='warning'>
                                <td>Comercial Place</td>
                                <td>New Jail</td>
                                <td>Kisan Path</td>
                            </tr>
                            <tr class='danger'>
                                <td>Hospitals</td>
                                <td>Cricket Stadium</td>
                                <td>IT City</td>
                            </tr>
                            <tr class='success'>
                                <td>SG PGI</td>
                                <td>Railway Station</td>
                                <td>Airport</td>
                            </tr>
                        </table>
                         <br/>
                        <h3 class='title_bg'>PROJECT LOCATION DETAILS</h3>
                        <table class='table table-hover table-bordered'>
                          <tr class='warning'>
                              <td>
                                  Location :
                              </td>
                              <td>
                                  New Jail Road NH 56-B (Outer Ring Road)
                              </td>
                          </tr>
                        </table>
                        <br/>
                          <h3 class='title_bg'>Project Media</h3>
                          <div class='project_media'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <img src='image/diamond.jpg' class='project_image img-responsive' alt='diamond'/>
                                </div>
                                
                            </div>
                        </div>
                  </div>
                  <div class='col-sm-3'>
                      <h3 class='title'>PLC Applicable</h3>
                      <br/>
                      <div class='side_box'>
                          Corner 5%
                      </div>
                      <div class='side_box'>
                          Park Face 5%
                      </div>
                      <div class='side_box'>
                          Commercial 10%
                      </div>
                      <div class='side_box'>
                          40 Ft. Road and Above 5%
                      </div>
                      <div class='side_box'>
                          Two Side Open Road 5%
                      </div>
                      <div class='side_box'>
                          Max PLC charge Only 20%
                      </div>
                  </div>
             </div>
          </div>
    ";
    echo $html;
  }

  function lko_manglamGreen(){
    $html = "<div class='container-fluid'>
                <div class='row'>
                  <div class='col-sm-9'>
                      <h3 class='title'>Mangalam & Green</h3>
                      <br/>
                        <p>
                          ARY Infra Realcon's primary business is development of residential,
                          commercial and retail properties. The Company has a unique
                          business model with earnings arising from development ARY Infra Realcon
                          offers you the opportunity to live life in a relaxed yet
                          grand way. So while you sip on chai with your friends, or
                          read a book while enjoying the scenery or simply take a
                          walk with your loved once, we see to it that your home
                          and its amenities are a perfect blend of comfort and style.
                        </p>
                        <p>
                          An eco friendly approach is kept to design the layout of
                          the whole projects. Diamond City is a perfect place to
                          settle with your loved one. A project with modern
                          infrastructure yet connected to Mother Nature in deeper
                          sense which provides peace of mind and soul to the lives
                          of the people owning a home at Diamond City.
                        </p>
                        <br/>
                          <div class='alert alert-success' role='alert'>
                            <strong>5%</strong> Discount on EMI plan for <strong>1 Year</strong> from date of booking.
                          </div>
                          <div class='alert alert-info' role='alert'>
                            <strong>3%</strong> Discount on EMI plan for <strong>2 Year</strong> from date of booking. 
                          </div>
                          <div class='alert alert-warning' role='alert'>
                            <strong>2%</strong> Discount on EMI plan for <strong>3 Year</strong> from date of booking.
                          </div>
                        <br/>
                        <h3 class='title_bg'>PROJECT PLANS</h3>
                        <table class='table table-bordered table-hover'>
                            <tr class='danger'>
                                <th></th>
                                <th>2400/sqft</th>
                                <th>1800/sqft</th>
                                <th>1250/sqft</th>
                                <th>900/sqft</th>
                                <th>600/sqft</th>
                            </tr>
                            <tr>
                                <th>Total Amount</th>
                                <td>15,62,400</td>
                                <td>11,71,800</td>
                                <td>8,13,450</td>
                                <td>5,85,900</td>
                                <td>3,90,600</td>
                            </tr>
                            <tr>
                                <th>Booking Amount</th>
                                <td>3,90,600</td>
                                <td>2,92,950</td>
                                <td>2,03,435</td>
                                <td>1,46,475</td>
                                <td>97,650</td>
                            </tr>
                            <tr>
                                <th>Rest Amount</th>
                                <td>11,71,800</td>
                                <td>8,78,850</td>
                                <td>6,10,312</td>
                                <td>4,39,425</td>
                                <td>2,92,950</td>
                            </tr>
                            <tr>
                                <th>12 Month Emi</th>
                                <td>97,650</td>
                                <td>73,238</td>
                                <td>50,859</td>
                                <td>36,619</td>
                                <td>1,24,413</td>
                            </tr>
                            <tr>
                                <th>24 Month Emi</th>
                                <td>48,825</td>
                                <td>36,619</td>
                                <td>25,430</td>
                                <td>18,309</td>
                                <td>12,206</td>
                            </tr>
                            <tr>
                                <th>36 Month Emi</th>
                                <td>32,550</td>
                                <td>24,413</td>
                                <td>16,953</td>
                                <td>12,206</td>
                                <td>8,138</td>
                            </tr>
                            <tr>
                                <th>48 Month Emi</th>
                                <td>24,413</td>
                                <td>18,309</td>
                                <td>12,515</td>
                                <td>9,155</td>
                                <td>6,103</td>
                            </tr>
                            <tr>
                                <th>60 Month Emi</th>
                                <td>19,530</td>
                                <td>14,648</td>
                                <td>10,172</td>
                                <td>7,324</td>
                                <td>4,883</td>
                            </tr>
                        </table>
                        <br/>
                        <h3 class='title_bg'>AMENITIES AT THE PROJECT</h3>
                        <table class='table table-hover table-bordered'>
                            <tr class='warning'>
                                <td>Comercial Place</td>
                                <td>Solar Road Light</td>
                            </tr>
                            <tr class='danger'>
                                <td>Hospitals</td>
                                <td>IT City</td>
                            </tr>
                            <tr class='success'>
                                <td>Roads</td>
                                <td>Park</td>
                            </tr>
                        </table>
                        <br/>
                        <h3 class='title_bg'>PROJECT LOCATION DETAILS</h3>
                        <table class='table table-hover table-bordered'>
                          <tr class='warning'>
                              <td>
                                  Location :
                              </td>
                              <td>
                                  Faizabad Road NH 28
                              </td>
                          </tr>
                        </table>
                  </div>
                  <div class='col-sm-3'>
                      <h3 class='title'>PLC Applicable</h3>
                      <br/>
                      <div class='side_box'>
                          Corner 5%
                      </div>
                      <div class='side_box'>
                          Park Face 5%
                      </div>
                      <div class='side_box'>
                          Commercial 10%
                      </div>
                      <div class='side_box'>
                          40 Ft. Road and Above 5%
                      </div>
                      <div class='side_box'>
                          Two Side Open Road 5%
                      </div>
                      <div class='side_box'>
                          Max PLC charge Only 20%
                      </div>
                  </div>
             </div>
          </div>
    ";
    echo $html;
  }
 ?>
