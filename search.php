<?php include_once("connection.php"); ?>
<?php


if(isset($_GET['keyword'])){
    $r_keyword = $_GET['keyword'];
    $r_cat = $_GET['category'];
}else{
    $r_keyword = "";
    $r_cat = "";
}

    $search_sql = "SELECT * FROM reports where r_comm like '%{$r_cat}%' or r_profile='%{$r_keyword}%'";
    $search_result = mysqli_query($conn, $search_sql);
    $search_row = mysqli_fetch_assoc($search_result);
    $rows = mysqli_num_rows($search_result);

    if (mysqli_query($conn, $search_sql)) {
        $message = "successful";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 

mysqli_close($conn);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Police Fraud Report System - Report Suspicion call, sms, email - Home</title>

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>

    <!--header-->
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
                            <a class="nav-link" href="about.php">FAQ</a>
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
    <section class="locations-1" id="locations">
        <div class="locations py-5">
            <div class="container py-lg-5 py-md-4 py-2">
                <h3>Search Result for: <?php echo $r_keyword; ?></h3>
                <hr>
                <div class="row">
                    <?php
                if($rows>0){
                    do{ ?>
                    <div class="col-lg-4 col-md-6 listing-img">
                        <a href="#url">
                            <div class="box16">
                                <img class="img-fluid" src="assets/images/fraud-alert.png" alt="">
                                <div class="box-content">
                                    <h3 class="title">
                                        <?php 
                                            if($search_row['r_status']==1){ echo "Verified"; }else{ echo "Not Verified"; }
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <div class="listing-details blog-details align-self">
                            <h4 class="user_title agent">
                                <a href="report_single.php?r_id=<?php echo $search_row['r_id']; ?>">
                                    <?php echo $search_row['r_title']; ?>
                                    [<?php echo $search_row['r_comm']; ?>]
                                </a>
                            </h4>
                            <p class="user_position"><?php echo $search_row['r_any']; ?></p>
                        </div>
                    </div>
                    <?php 
                    }while($search_row = mysqli_fetch_assoc($search_result)); 
                }else{
                    echo "No Result Found";
                }
                ?>
                </div>
                
            </div>
        </div>
    </section>
    <!-- footers 20 -->
    <section class="w3l-footers-20">
            <div class="footers20">
                <div class="container">
                    <div class="footers20-content">
                        <div class="d-grid grid-col-3 grids-content1 bottom-border">
                            <div class="columns copyright-grid align-self">
                                <p class="copy-footer-29">© 2024 Police Fraud Reporting Portal. All rights reserved.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- move top -->
            <button onclick="topFunction()" id="movetop" title="Go to top">
                &#10548;
            </button>
            <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
            </script>
            <!-- /move top -->
        </section>

    <!-- jQuery and Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <script src="assets/js/theme-change.js"></script><!-- theme switch js (light and dark)-->

    <!-- stats number counter-->
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.countup.js"></script>
    <script>
    $('.counter').countUp();
    </script>
    <!-- //stats number counter -->

    <!-- owlcarousel -->
    <script src="assets/js/owl.carousel.js"></script>
    <!-- script for blog post slider -->
    <script>
    $(document).ready(function() {
        $('.owl-blog').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                480: {
                    items: 1,
                    nav: true
                },
                700: {
                    items: 1,
                    nav: true
                },
                1090: {
                    items: 1,
                    nav: true
                }
            }
        })
    })
    </script>
    <!-- //script for blog post slider -->

    <!-- script for tesimonials carousel slider -->
    <script>
    $(document).ready(function() {
        $("#owl-demo1").owlCarousel({
            loop: true,
            nav: false,
            margin: 50,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                736: {
                    items: 1,
                    nav: false
                }
            }
        })
    })
    </script>
    <!-- //script for tesimonials carousel slider -->

    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $('.popup-with-move-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
        });
    });
    </script>

    <!-- disable body scroll which navbar is in active -->
    <script>
    $(function() {
        $('.navbar-toggler').click(function() {
            $('body').toggleClass('noscroll');
        })
    });
    </script>
    <!-- disable body scroll which navbar is in active -->

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

    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>