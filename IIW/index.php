<?php 
    session_start();
    if ($data['error']) {
        echo "<script>aler('login Failed);</script>";
    }
?>
<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
    </head>
    <body>
        <div class="main-header" id="main-header">
            <nav class="navbar mynav navbar-fixed-top">
                <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="#">IIW</a> 
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#banner">Home</a></li>
                        <li><a href="#work">Blogs</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <?php if ($_SESSION['user']) echo '<li><a href="#contact"><img src="images/title.png" class="menu_icon"/></a></li>'; ?>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
        <div class="banner" id="banner">
            <div class="bg-overlay">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="banner-text">
                        <h2>Welcome to <span>Information</span> World</h2>
                        <p>A world is ready to be explore.</p>
                        <a href="blogs.php" class="banner-button">Our Blogs</a> 
                        <a href="login.php" class="banner-button">Login</a> 
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="features">
            <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-box media">
                    <div class="icon-box text-center pull-left media-object"> <i class="icon-bulb"></i> </div>
                    <div class="feature-text media-body">
                    <h4>Blogs and Reviews</h4>
                    <p class="feature-detail">Cras aliquet et mi id fermentum. Suspendisse eget sodales lorem, vestibulum euismod lectus.</p>
                    </div>
                </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-box media pull-left">
                    <div class="icon-box text-center pull-left media-object"> <i class="icon-eye"></i> </div>
                    <div class="feature-text media-body">
                    <h4>Graphics Designer</h4>
                    <p class="feature-detail">Cras aliquet et mi id fermentum. Suspendisse eget sodales lorem, vestibulum euismod lectus.</p>
                    </div>
                </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-box media pull-left">
                    <div class="icon-box text-center pull-left media-object"> <i class="icon-heart"></i> </div>
                    <div class="feature-text media-body">
                    <h4>Web/Mobile App Developements</h4>
                    <p class="feature-detail">Cras aliquet et mi id fermentum. Suspendisse eget sodales lorem, vestibulum euismod lectus.</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Portfolio -->
        <div id="work" class="portfolio">
            <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center text">
                <h3>Top Blogs</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                    <div class="portfolio-item"> <a href="#"> <img class="img-portfolio img-responsive" src="images/portfolio-1.jpg"> </a> </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                    <div class="portfolio-item"> <a href="#"> <img class="img-portfolio img-responsive" src="images/portfolio-2.jpg"> </a> </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                    <div class="portfolio-item"> <a href="#"> <img class="img-portfolio img-responsive" src="images/portfolio-3.jpg"> </a> </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                    <div class="portfolio-item"> <a href="#"> <img class="img-portfolio img-responsive" src="images/portfolio-4.jpg"> </a> </div>
                    </div>
                </div>
                <!-- /.row (nested) --> 
                <a href="#" class="view-more">Review Blogs</a> </div>
                <!-- /.col-lg-10 --> 
            </div>
            <!-- /.row --> 
            </div>
            <!-- /.container --> 
        </div>
        <div class="testimonials" id="projects">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="text-center">
                    <h3>Our Projects</h3>
                </div>
                </div>
                <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div id="owl-demo" class="owl-carousel owl-theme test">
                    <div class="item">
                    <p><sup><i class="fa fa-quote-left"></i></sup>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui ante, ornare eget est in, ultricies rutrum elit.<sup><i class="fa fa-quote-right"></i></sup></p>
                    <div class="test-img"> <img src="images/team-img-01.jpg"/>
                        <p><strong>Yogesh Singh</strong></p>
                    </div>
                    </div>
                    <div class="item">
                    <p><sup><i class="fa fa-quote-left"></i></sup>Proin tincidunt, orci vel volutpat blandit, purus turpis faucibus massa, sit amet posuere nunc diam in ex.<sup><i class="fa fa-quote-right"></i></sup></p>
                    <div class="test-img"> <img src="images/team-img-02.jpg"/>
                        <p><strong>Brad Will</strong></p>
                    </div>
                    </div>
                    <div class="item">
                    <p><sup><i class="fa fa-quote-left"></i></sup>Morbi velit mauris, hendrerit in convallis vel, laoreet et orci. Integer semper, est vel congue suscipit, nisl nibh convallis lorem, sit amet faucibus purus lacus eu nulla. Sed nec blandit ante, sed semper tellus.<sup><i class="fa fa-quote-right"></i></sup></p>
                    <div class="test-img"> <img src="images/team-img-03.jpg"/>
                        <p><strong>John Deo</strong></p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="call-to-action">
            <div class="call-overlay">
            <div class="container">
                <div class="row">
                <div class="col-md-8 col-sm-10">
                    <div class="subscribe-text">
                    <h3>Subscribe For Updates</h3>
                    <p>Join our 1000+ subscribers and get access to the latest tools, freebies, product announcements and much more!</p>
                    </div>
                </div>
                <div class="col-md-4 text-center"> <a href="#" class="subscribe-button">Subscribe Now</a> </div>
                </div>
            </div>
            </div>
        </div>
        <div class="about" id="about">
            <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                <h3>About Us</h3>
                </div>
                <div class="col-md-6">
                <div class="about-text">
                    <p>Donec velit ex, faucibus eu mauris in, sodales placerat augue. Phasellus feugiat ex id enim laoreet mattis. Quisque velit quam, pharetra non lorem vel, scelerisque ornare dolor. Etiam id ex justo. Nullam nec ipsum non augue convallis gravida. Praesent mattis placerat sodales. Pellentesque nec egestas neque. </p>
                    <p>Donec velit ex, faucibus eu mauris in, sodales placerat augue. Phasellus feugiat ex id enim laoreet mattis. Quisque velit quam, pharetra non lorem vel, scelerisque ornare dolor. Etiam id ex justo. Nullam nec ipsum non augue convallis gravida. Praesent mattis placerat sodales. Pellentesque nec egestas neque. </p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="col-md-6 col-sm-6 col-xs-6 block">
                    <div class="counter-item text-center">
                    <h5>Our Clients</h5>
                    <div class="timer" data-from="0" data-to="55" data-speed="5000" data-refresh-interval="50"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="counter-item text-center">
                    <h5>Projects completed</h5>
                    <div class="timer" data-from="0" data-to="88" data-speed="5000" data-refresh-interval="50"></div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="contact" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <div class="text-center">
                        <h3>Contact Us</h3>
                    </div>
                    </div>
                    <div class="col-md-7 col-sm-offset-0 col-sm-6 col-xs-offset-1 col-xs-10">
                    <div class="contact-form">
                        <form role="form">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" placeholder="Message" rows="6"></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="contact-button">Send Message</button>
                            </div>
                        </form>
                    </div>
                    </div>
                    <div class="col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-1 col-xs-10">
                    <div class="address">
                        <h4>Address</h4>
                        <p>123, This Appartment,<br>
                        Near Ocean Street<br>
                        New York<br>
                        <div class="email"><i class="fa fa-at"></i>william@iiw.world<br>
                        <i class="fa fa-mobile"></i>+91 7800794002</div>
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('footer.html'); ?>
        <script src="js/jquery.min.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/owl.carousel.min.js"></script> 
        <script type="text/javascript" src="js/jquery.countTo.js"></script> 
        <script type="text/javascript" src="js/jquery.waypoints.min.js"></script> 
        <script>
            $(document).ready(function() {
            
                $("#owl-demo").owlCarousel({
            
                    navigation : false, // Show next and prev buttons
                    slideSpeed : 500,
                    autoPlay : 3000,
                    paginationSpeed : 400,
                    singleItem:true
            
                    // "singleItem:true" is a shortcut for:
                    // items : 1, 
                    // itemsDesktop : false,
                    // itemsDesktopSmall : false,
                    // itemsTablet: false,
                    // itemsMobile : false
            
                });
        
            });

            /*$('.timer').each(count);*/
            jQuery(function ($) {
                // custom formatting example
                $('.timer').data('countToOptions', {
                    formatter: function (value, options) {
                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                    }
                });


                // start all the timers
                $('#testimonials').waypoint(function() {
                    $('.timer').each(count);
                });
        
                function count(options) {
                    var $this = $(this);
                    options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                    $this.countTo(options);
                    }
                });


                $(document).ready(function(){
                    // Add smooth scrolling to all links in navbar + footer link
                    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                    scrollTop: $(hash).offset().top
                    }, 900, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                });
            });
        </script>
    </body>
</html>