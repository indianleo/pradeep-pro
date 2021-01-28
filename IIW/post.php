<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
    </head>
    <body>
        <div class="main-header" id="main-header">
            <?php include_once('menu.html'); ?>
        </div>
        <br/>
        <div class="container" id="blog_show">
           
        </div>
        <br/>
        <br/>
        <?php include_once('footer.html'); ?>
        <script>
            var url = = new URLSearchParams(window.location.href);
            $(document).ready(function() {
                getBlogs();
            });
            function getBlogsById(blogBox, type) {
                $.ajax({
                    url: 'action.php',
                    cache: false,
                    data: { 
                        action: 'get_post',
                        id: url.get('post_id'),
                        post_type: type
                    },
                    type: 'post',
                    success: function (response) {
                        try {
                            response = JSON.parse(response);
                            var reviewes = getBlogsReviews();
                            blogHtml = getblogHtml(response, reviewes);
                            document.querySelector("#blog_show").innerHTML = blogHtml;
                        } catch(e) {
                            console.log(response,e);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
            function getBlogsReviews() {
                $.ajax({
                    url: 'action.php',
                    cache: false,
                    data: { 
                        action: 'get_post_reviews', 
                        post_id: url.get('post_id')
                    },
                    type: 'post',
                    success: function (response) {
                        console.log(response);
                    }
                });
            }
            function getblogHtml(response, reviewes) {
                
            }
        </script>
    </body>
</html>