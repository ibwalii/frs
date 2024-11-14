<?php include_once("connection.php"); ?>

<?php
// Query to get published blog posts
$blog_sql = "SELECT * FROM blog_posts WHERE status = 1 ORDER BY post_id DESC";
$blog_result = mysqli_query($conn, $blog_sql);
$blog_row = mysqli_fetch_assoc($blog_result);
$blog_rows = mysqli_num_rows($blog_result);

mysqli_close($conn);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Police Fraud Report System - Blog</title>
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke px-0">
                <h1> <a class="navbar-brand" href="index.php">
                        <span class="fa fa-shield"></span> Police FRS
                    </a>
                </h1>
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-5 mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        
                        <li class="nav-item active">
                            <a class="nav-link" href="#">FAQ</a>
                        </li>
                    </ul>
                    <div class="top-quote mt-lg-0">
                        <a href="blog.php" class="btn btn-style btn-primary"><span class="fa fa-lock"></span> Security Center
                        </a>
                    </div>
                    <div class="top-quote mt-lg-0">
                        <a href="report.php" class="btn btn-style btn-primary"><span class="fa fa-send"></span> Report
                            Now</a>
                    </div>
                    &nbsp;
                </div>
            </nav>
        </div>
    </header>
    <!--/header-->

    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about pt-5">
            <div class="container pt-lg-5 py-3">
            </div>
        </div>
    </section>
    <section class="w3l-breadcrumb">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.php">Home</a></li>
                <li class="active"><span class="fa fa-angle-right mx-2" aria-hidden="true"></span> Fraud Report List</li>
            </ul>
        </div>
    </section>
    
    <!-- Blog Posts Section -->
    <section class="w3l-news" id="news">
        <div class="container py-5">
            <h3 class="title-big text-center">Recent Blog Posts</h3>
            <div class="row">
                <?php
                if ($blog_rows > 0) {
                    do { ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card blog-post">
                                <img class="card-img-top" src="assets/images/blog_thumbnail.jpg" alt="Blog thumbnail">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="blog_single.php?post_id=<?php echo $blog_row['post_id']; ?>">
                                            <?php echo $blog_row['title']; ?>
                                        </a>
                                    </h5>
                                    <p class="card-text"><?php echo substr($blog_row['content'], 0, 150); ?>...</p>
                                    <a href="blog_single.php?post_id=<?php echo $blog_row['post_id']; ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                <?php 
                    } while ($blog_row = mysqli_fetch_assoc($blog_result));
                } else {
                    echo "<p>No blog posts available</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Quiz Start Section -->
    <section class="quiz-start-section py-5">
        <div class="container text-center">
            <h3 class="title-big">Test Your Cyber Security Awareness</h3>
            <p>Are you aware of the latest cyber threats and how to protect yourself online? Take our quiz and find out how prepared you are!</p>
            <button class="btn btn-primary btn-lg mt-3" data-toggle="modal" data-target="#quizModal">Start the Quiz</button>
        </div>
    </section>

    <!-- Quiz Confirmation Modal -->
    <div class="modal fade" id="quizModal" tabindex="-1" role="dialog" aria-labelledby="quizModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quizModalLabel">Ready to Test Your Knowledge?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This quiz will test your awareness on various security threats and how to stay safe. Are you ready to begin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="quiz.php" class="btn btn-primary">Yes, Start Quiz</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <section class="w3l-footers-20">
        <div class="footers20">
            <div class="container">
                <div class="footers20-content">
                    <p class="copy-footer-29 text-center">© 2024 Police Fraud Reporting Portal. All rights reserved.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery and Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/theme-change.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <!-- MENU-JS -->
     <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
        </script>
        <!-- //MENU-JS -->
</body>
</html>
