<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php include_once("connection.php"); ?>
<?php

    $search_sql = "SELECT * FROM reports where r_status = 1 order by r_id desc";
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

    <title>Defence Fraud Report System - Report Suspicion call, sms, email - Home</title>

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>

    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke px-0">
                <h1> <a class="navbar-brand" href="index.php">
                        <span class="fa fa-shield"></span> Defence FRS
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
                        <a href="report.php" class="btn btn-style btn-primary"><span class="fa fa-send"></span> Report
                            Now</a>
                    </div>
                    &nbsp;
                </div>
            </nav>
        </div>
    </header>
    <!--/header-->
    <section class="w3l-cover-3">
        <div class="cover top-bottom">
            <div class="container">
                <div class="middle-section text-center">
                    <div class="section-width">
                        <p>Are you suspecting of been frauded!</p>
                        <h2>You are in the right place</h2>
                        <div class="most-searches">

                        </div>
                        <form class="w3l-cover-3-gd" method="GET" action="search.php">
                            <input type="search" name="keyword" placeholder="Enter keywords" style="width: 450px;"
                                required>
                            <span class="input-group-btn">
                                <select class="btn btn-default" name="category" required>
                                    <option selected="">Select category</option>
                                    <option value="">All Category</option>
                                    <option Value="Phone Number">Phone Number </option>
                                    <option value="Email">Email Address</option>
                                    <option value="">Imposter scams</option>
                                    <option value="">Student loan or scholarship scams</option>
                                    <option value="">Prize, grants, and sweepstakes offers</option>
                                </select>
                            </span>
                            <button type="submit" class="btn-primary">Search</button>
                        </form>
                    </div>
                    <section id="bottom" class="demo">
                        <a href="#bottom"><span></span>Scroll</a>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--  News section -->
    <div class="w3l-news" id="news">
        <section id="grids5-block" class="py-5">
            <div class="container py-lg-5 py-md-4 py-2">
                <h3 class="title-big text-center">Recent Reportings</h3>
                <section class="locations-1" id="locations">
                    <div class="locations py-5">
                        <div class="container py-lg-5 py-md-4 py-2">
                            <div class="row">
                            <?php
                                if($rows>0){
                                    do{ ?>
                                                <div class="col-lg-4 col-md-6 listing-img">
                                                    <a href="#url">
                                                        <div class="box16">
                                                            <img class="img-fluid" src="assets/images/fraud-alert.png" alt="">
                                                            <div class="box-content">
                                                                <h3 class="title">verified</h3>
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
            </div>
        </section>
    </div>
    <!--  //News section -->
    <section class="w3l-index3" id="about">
        <div class="midd-w3 pb-5">
            <div class="container pb-lg-5 pb-md-4 pb-2">
                <div class="row">
                    <div class="col-lg-5 pr-lg-0">
                        <div class="w3l-left-img">
                        </div>
                    </div>
                    <div class="col-lg-7 pl-lg-0">
                        <div class="w3l-right-info">
                            <h6 class="title-small"></h6>
                            <h3 class="title-big">How Defence FRS Works</h3>
                            <p class="mt-4">We can't resolve your individual report, but we use reports to investigate
                                 and bring cases against fraud, scams, and bad business practices.
                            </p>
                            <p class="mt-3">But we help in sharing your experience to help others from falling as victims:</p>
                            <p class="mt-3">Your report is shared with:</p>
                            <ul class="w3l-right-book w3l-right-book-grid mt-md-5 mt-4">
                                <li><span class="fa fa-check" aria-hidden="true"></span>Law Enforcement Agencies</li>
                                <li><span class="fa fa-check" aria-hidden="true"></span>Government organizations</li>
                                <li><span class="fa fa-check" aria-hidden="true"></span>Banks</li>
                                <li><span class="fa fa-check" aria-hidden="true"></span>Individual</li>
                                <li><span class="fa fa-check" aria-hidden="true"></span>Specialist services</li>
                                <li><span class="fa fa-check" aria-hidden="true"></span>Policy makers</li>
                            </ul>
                            <a href="#services" class="btn btn-style btn-primary mt-4">Discover our services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="w3l-companies-hny-6 py-5">
            <!-- /grids -->
            <div class="container py-md-3">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-6 column">
                        <div class="company-gd">
                            <a href="#client"><img class="img-responsive" src="assets/images/partner_nfiu.png" alt="client">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 column">
                        <div class="company-gd">
                            <a href="#client"><img class="img-responsive" src="assets/images/partner_efcc.jpg" alt="client">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 column mt-md-0 mt-4">
                        <div class="company-gd">
                            <a href="#client"><img class="img-responsive" src="assets/images/partner_npf.jpg" alt="client">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 column mt-lg-0 mt-4">
                        <div class="company-gd">
                            <a href="#client"><img class="img-responsive" src="assets/images/partner_nia" alt="client">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 column mt-lg-0 mt-4">
                        <div class="company-gd">
                            <a href="#client"><img class="img-responsive" src="assets/images/partner_defence" alt="client">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 column mt-lg-0 mt-4">
                        <div class="company-gd">
                            <a href="#client"><img class="img-responsive" src="assets/images/partner_civil.jpg" alt="client">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //grids -->
        </section>
        <!-- footers 20 -->
        <section class="w3l-footers-20">
            <div class="footers20">
                <div class="container">
                    <div class="footers20-content">
                        <div class="d-grid grid-col-3 grids-content1 bottom-border">
                            <div class="columns copyright-grid align-self">
                                <p class="copy-footer-29">© 2022 Defence Fraud Reporting Portal. All rights reserved.
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