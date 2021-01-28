<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
    </head>
    <body>
        <div class="main-header" id="main-header">
            <?php include_once('menu.html'); ?>
        </div>
        <br/>
        <section class="card-bg">
            <div class="container card-bg">
                <div class="blog_controls menu_mr">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#Fashion_blog" post-type="Fashion">Fashion</a></li>
                        <li><a data-toggle="tab" href="#Technology_blog" post-type="Technology">Technology</a></li>
                        <li><a data-toggle="tab" href="#blog_update">Add Blogs</a></li>
                    </ul>
                    <div class="tab-content">
                        <br/>
                        <div id="blog_update" class="tab-pane fade">
                            <h3>Blog Update</h3>
                            <div class="blog_update_form">
                                <form role="form" action="action.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="update_post" />
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" required />
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="post_title" id="post_title" placeholder="Post Title" required />
                                    </div>
                                    <div class="col-md-12">
                                        <Select class="form-control" name="post_type" id="post_type" required>
                                            <option value="">Select Type</option>
                                            <option value="Fashion">Fashion</option>
                                            <option value="Technology">Technology</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="post_image" id="post_image" required />
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="post_content" id="post_content" rows="6" placeholder="Post Content" required></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="contact-button" value="Update Post" />
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="Fashion_blog" class="tab-pane fade in active">
                            <h3>Blog Show</h3>
                            <p>Loading...</p>
                        </div>
                        <div id="Technology_blog" class="tab-pane fade">
                            <h3>Blog Show</h3>
                            <p>Loading...</p>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <br/>
        </section>
        <br/>
        <br/>
        <?php include_once('footer.html'); ?>
        <script>
            AI = ReactItem();
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(event) {
                if (event.target.getAttribute('href') != "#blog_update") {
                    getBlogs(event.target.getAttribute('href'), event.target.getAttribute('post-type'));
                } 
            });
            $(document).ready(function() {
                getBlogs("#Fashion_blog", "Fashion");
            });
            function getBlogs(blogBox, type) {
                $.ajax({
                    url: 'action.php',
                    cache: false,
                    data: { 
                        action: 'get_post',
                        post_type: type
                    },
                    type: 'post',
                    success: function (response) {
                        try {
                            response = JSON.parse(response);
                            var blogHtml = AI.get_card(response)
                            document.querySelector(blogBox).innerHTML = blogHtml;
                        } catch(e) {
                            console.log(response,e);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
            function addNewBlogs() {
                
            }   
        </script>
    </body>
</html>