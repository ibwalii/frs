<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
// Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST)){
    $r_cat = $_POST['r_cat'];
    $r_comm = $_POST['r_comm'];
    $offer1 = $_POST['offer1'];
    $offer2 = $_POST['offer2'];
    $r_platform = $_POST['r_platform'];
    $r_profile = $_POST['r_profile'];
    $r_todo = $_POST['r_todo'];
    $r_payment = $_POST['r_payment'];
    $r_amount = $_POST['r_amount'];
    $r_date = $_POST['r_date'];
    $r_any = $_POST['r_any'];
    $r_track = bin2hex(random_bytes(18));
}
$sql = "INSERT INTO reports (r_cat, r_comm, r_offer, r_offer2, r_platform, r_profile, r_todo, r_payment, r_amount, r_date, r_any, r_track)
VALUES ('{$r_cat}', '{$r_comm}', '{$offer1}', '{$offer2}', '{$r_platform}', '{$r_profile}', '{$r_todo}', '{$r_payment}', {$r_amount}, '{$r_date}', '{$r_any}', '{$r_track}')";

if (mysqli_query($conn, $sql)) {
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
                            <a class="nav-link" href="about.php">FAQ</a>
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
    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about pt-5">
            <div class="container pt-lg-5 py-3">
            </div>
        </div>
    </section>
    <section class="w3l-breadcrumb">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li class="active"><span class="fa fa-angle-right mx-2" aria-hidden="true"></span> Report Now</li>
            </ul>
        </div>
    </section>
    <!-- contacts -->
    <section class="w3l-contact-7 pt-5" id="contact">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/style-starter.css">
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            html {
                height: 100%;
            }

            /* Background color
#grad1 {
    background-color: : #9C27B0;
    background-image: linear-gradient(120deg, #FF4081, #81D4FA);
} */

            /*form styles*/
            #msform {
                text-align: center;
                position: relative;
                margin-top: 20px;
            }

            #msform fieldset .form-card {
                background: white;
                border: 0 none;
                border-radius: 0px;
                box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
                padding: 20px 40px 30px 40px;
                box-sizing: border-box;
                width: 94%;
                margin: 0 3% 20px 3%;

                /*stacking fieldsets above each other*/
                position: relative;
            }

            #msform fieldset {
                background: white;
                border: 0 none;
                border-radius: 0.5rem;
                box-sizing: border-box;
                width: 100%;
                margin: 0;
                padding-bottom: 20px;

                /*stacking fieldsets above each other*/
                position: relative;
            }

            /*Hide all except first fieldset*/
            #msform fieldset:not(:first-of-type) {
                display: none;
            }

            #msform fieldset .form-card {
                text-align: left;
                color: #9E9E9E;
            }

            #msform input,
            #msform textarea {
                padding: 0px 8px 4px 8px;
                border: none;
                border-bottom: 1px solid #ccc;
                border-radius: 0px;
                margin-bottom: 25px;
                margin-top: 2px;
                width: 100%;
                box-sizing: border-box;
                font-family: montserrat;
                color: #2C3E50;
                font-size: 16px;
                letter-spacing: 1px;
            }

            #msform input:focus,
            #msform textarea:focus {
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
                box-shadow: none !important;
                border: none;
                font-weight: bold;
                border-bottom: 2px solid skyblue;
                outline-width: 0;
            }

            /*Blue Buttons*/
            #msform .action-button {
                width: 200px;
                background: skyblue;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 0px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px;
            }

            #msform .action-button:hover,
            #msform .action-button:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
            }

            /*Previous Buttons*/
            #msform .action-button-previous {
                width: 100px;
                background: #616161;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 0px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px;
            }

            #msform .action-button-previous:hover,
            #msform .action-button-previous:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
            }

            /*Dropdown List Exp Date*/
            select.list-dt {
                border: none;
                outline: 0;
                border-bottom: 1px solid #ccc;
                padding: 2px 5px 3px 5px;
                margin: 2px;
            }

            select.list-dt:focus {
                border-bottom: 2px solid skyblue;
            }

            /*The background card*/
            .card {
                z-index: 0;
                border: none;
                border-radius: 0.5rem;
                position: relative;
            }

            /*FieldSet headings*/
            .fs-title {
                font-size: 25px;
                color: #2C3E50;
                margin-bottom: 10px;
                font-weight: bold;
                text-align: left;
            }

            /*progressbar*/
            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                color: lightgrey;
            }

            #progressbar .active {
                color: #000000;
            }

            #progressbar li {
                list-style-type: none;
                font-size: 12px;
                width: 25%;
                float: left;
                position: relative;
            }

            /*Icons in the ProgressBar*/
            #progressbar #account:before {
                font-family: FontAwesome;
                content: "\f023";
            }

            #progressbar #personal:before {
                font-family: FontAwesome;
                content: "\f007";
            }

            #progressbar #payment:before {
                font-family: FontAwesome;
                content: "\f09d";
            }

            #progressbar #confirm:before {
                font-family: FontAwesome;
                content: "\f00c";
            }

            /*ProgressBar before any progress*/
            #progressbar li:before {
                width: 50px;
                height: 50px;
                line-height: 45px;
                display: block;
                font-size: 18px;
                color: #ffffff;
                background: lightgray;
                border-radius: 50%;
                margin: 0 auto 10px auto;
                padding: 2px;
            }

            /*ProgressBar connectors*/
            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: lightgray;
                position: absolute;
                left: 0;
                top: 25px;
                z-index: -1;
            }

            /*Color number of the step and the connector before it*/
            #progressbar li.active:before,
            #progressbar li.active:after {
                background: skyblue;
            }

            /*Imaged Radio Buttons*/
            .radio-group {
                position: relative;
                margin-bottom: 25px;
            }

            .radio {
                display: inline-block;
                width: 204;
                height: 104;
                border-radius: 0;
                background: lightblue;
                box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
                box-sizing: border-box;
                cursor: pointer;
                margin: 8px 2px;
            }

            .radio:hover {
                box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
            }

            .radio.selected {
                box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
                border: #1dc973;
            }

            /*Fit image in bootstrap div*/
            .fit-image {
                width: 100%;
                object-fit: cover;
            }
        </style>
        <!-- MultiStep Form -->

        <!-- radio -->
        <style>
            .radioSection {
                display: flex;
                flex-flow: row wrap;
            }

            .radioSection div {
                flex: 1;
                padding: 0.5rem;
            }

            .radioSection input[type=radio] {
                display: none;
            }

            .radioSection input[type=radio]:not(:disabled)~label {
                cursor: pointer;
            }

            .radioSection input[type=radio]:disabled~label {
                color: #bcc2bf;
                border-color: #bcc2bf;
                box-shadow: none;
                cursor: not-allowed;
            }

            .radioSection label {
                height: 100%;
                display: block;
                background: white;
                border: 2px solid #20df80;
                border-radius: 20px;
                padding: 1rem;
                margin-bottom: 1rem;
                text-align: center;
                box-shadow: 0px 3px 10px -2px rgba(161, 170, 166, 0.5);
                position: relative;
            }

            .radioSection input[type=radio]:checked+label {
                background: #20df80;
                color: white;
                box-shadow: 0px 0px 20px rgba(0, 255, 128, 0.75);
            }

            .radioSection input[type=radio]:checked+label::after {
                color: #3d3f43;
                font-family: FontAwesome;
                border: 2px solid #1dc973;
                content: "";
                font-size: 24px;
                position: absolute;
                top: -25px;
                left: 50%;
                transform: translateX(-50%);
                height: 50px;
                width: 50px;
                line-height: 50px;
                text-align: center;
                border-radius: 50%;
                background: white;
                box-shadow: 0px 2px 5px -2px rgba(0, 0, 0, 0.25);
            }

            .radioSection input[type=radio].redSelect:checked+label {
                background: red;
                border-color: red;
            }

            p {
                font-weight: 900;
            }

            @media only screen and (max-width: 700px) {
                .radioSection {
                    flex-direction: column;
                }
            }
        </style>
        <!-- end radio -->
        <div class="container-fluid" id="grad1">
            <div class="row justify-content-center mt-0">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2><strong>Report a case</strong></h2>
                        <p>Request Sent</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform" method="post" action="report.html">
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title text-center">Information!</h2>
                                            <br><br>
                                            <?php if(isset($message) && $message === "successful"){ ?>
                                                <h3 class="text-center"><?php echo $message; ?></h3>
                                            <?php }else{ ?>
                                                <h3 class="text-center"><?php echo "Failed to Submit"; ?></h3>
                                            <?php } ?>
                                            <div class="row justify-content-center">
                                                <div class="col-3">
                                                <?php if(isset($message) && $message != "successful"){ ?>
                                                    <img src=" https://img.icons8.com/color/96/000000/minus.png"
                                                        class="fit-image">
                                                <?php }else{ ?>
                                                    <img src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                        class="fit-image">
                                                <?php } ?>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-7 text-center">
                                                <?php if(isset($message) && $message === "successful"){ 
                                                    // Create connection
                                                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                                                    // Check connection
                                                    if (!$conn) {
                                                    die("Connection failed: " . mysqli_connect_error());
                                                    }

                                                    $sql = "SELECT * FROM reports order by r_id desc limit 1";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                ?>
                                                    <h3 class="text-center"><?php echo $row['r_track']; ?></h3>
                                                    <a href="report_single.php?r_id=<?php echo $row['r_id']; ?>"> 
                                                        <input type="button" name="submit" class="next action-button" value="View Report" />
                                                    </a>
                                                <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->
    </section>
    <!-- //contacts -->
    <!-- footers 20 -->
    &nbsp;
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

    <!-- Start Multi -->
    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function () {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({ 'opacity': opacity });
                    },
                    duration: 600
                });
            });

            $(".previous").click(function () {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({ 'opacity': opacity });
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function () {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function () {
                return false;
            })

        });
    </script>
    <!-- end multi -->
    <script>
        $('.counter').countUp();
    </script>
    <!-- //stats number counter -->

    <!-- owlcarousel -->
    <script src="assets/js/owl.carousel.js"></script>
    <!-- script for blog post slider -->
    <script>
        $(document).ready(function () {
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
        $(document).ready(function () {
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
        $(document).ready(function () {
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
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
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