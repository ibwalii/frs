<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php include_once("connection.php"); ?>
<?php


if(isset($_GET['r_id'])){
  $r_id = $_GET['r_id'];
}else{
  $r_id = 1;
}
$sql = "SELECT * FROM reports where r_id = {$r_id}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$related_sql = "SELECT * FROM reports where r_comm like '%{$row["r_comm"]}%'";
$related_result = mysqli_query($conn, $related_sql);
$related_row = mysqli_fetch_assoc($related_result);


// SUBMIT COMMENT
if(isset($_POST['comment_form'])){
  $r_id = $r_id;
  $rc_name = $_POST['rc_name'];
  $rc_email = $_POST['rc_email'];
  $rc_remark = $_POST['rc_remark'];

  $insert = "INSERT INTO reports_comments (r_id, rc_name, rc_email, rc_remark, rc_status, rc_priv)
VALUES ('{$r_id}', '{$rc_name}', '{$rc_email}', '{$rc_remark}', 0, 0)";

  if (mysqli_query($conn, $insert)) {
    $message = "successful";
  } else {
    $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

$comment_sql = "SELECT * FROM reports_comments where r_id = {$r_id} and rc_priv= 0 ";
$comment_result = mysqli_query($conn, $comment_sql);
$comment_row = mysqli_fetch_assoc($comment_result);

$admin_comment_sql = "SELECT * FROM reports_comments where r_id = {$r_id} and rc_priv= 1 ";
$admin_comment_result = mysqli_query($conn, $admin_comment_sql);
$admin_comment_row = mysqli_fetch_assoc($admin_comment_result);
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
                            <a class="nav-link" href="about.php">About</a>
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
                <li><a href="index.php">Home</a></li>
                <!-- <li class="active"><span class="fa fa-angle-right mx-2" aria-hidden="true"></span> Property</li>
                <li class="active"><span class="fa fa-angle-right mx-2" aria-hidden="true"></span> property single</li> -->
            </ul>
        </div>
    </section>
    <!--/blog-post-->
    <section class="w3l-blog post-content py-5">
        <div class="container py-lg-4 py-md-3 py-2">
            <div class="inner mb-4">
                <ul class="blog-single-author-date align-items-center">
                    <li><span class="fa fa-clock-o"></span> 
                        <?php if(isset($row['date']) && !empty($row['date'])) { echo $row['date']; }else{ echo "Not Assigned"; } ?>
                    </li>
                    <!-- <li><span class="fa fa-eye"></span> 250 views</li> -->
                </ul>
            </div>
            <div class="post-content">
                <h2 class="title-single">
                    <?php if(isset($row['r_title']) && !empty($row['r_title'])) { echo $row['r_title']; }else{ echo "Not Assigned"; } ?>
                </h2>
            </div>
            <div class="blo-singl mb-4">
                <ul class="share-post">
                    <a href="#url"
                        class="cost-estate m-o"><?php if($row['r_status'] ==0) { echo "Unverified";}else{ echo "Verified"; } ?></a>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-8 w3l-news">
                    <div class="blog-single-post">
                        <div class="single-post-image mb-5">
                            <div class="owl-blog owl-carousel owl-theme">
                                <div class="item">
                                    <div class="card">
                                        <img src="assets/images/p1.jpg" class="img-fluid radius-image" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single-post-content">
                            <h3 class="post-content-title mb-3">Description</h3>
                            <p class="mb-4">
                                <?php if(isset($row['r_any']) && !empty($row['r_any'])) { echo $row['r_any']; }else{ echo "Not Assigned"; } ?>
                            </p>
                            <div class="single-bg-white">
                                <h3 class="post-content-title mb-4">Report detail</h3>
                                <ul class="details-list">
                                    <li><strong>Fraud Type :</strong>
                                        <?php if(isset($row['r_cat']) && !empty($row['r_cat'])) { echo $row['r_cat']; }else{ echo "Not Assigned"; } ?>
                                    </li>
                                    <li><strong>Primary Communication :</strong>
                                        <?php if(isset($row['r_comm']) && !empty($row['r_comm'])) { echo $row['r_comm']; }else{ echo "Not Assigned"; } ?>
                                    </li>
                                    <li><strong>Investment opportunity :</strong>
                                        <?php if(isset($row['r_offer']) && !empty($row['r_offer'])) { echo $row['r_offer']; }else{ echo "Not Assigned"; } ?>
                                    </li>
                                    <li><strong>Job opportunity :</strong>
                                        <?php if(isset($row['r_offer2']) && !empty($row['r_offer2'])) { echo $row['r_offer2']; }else{ echo "Not Assigned"; } ?>
                                    </li>
                                </ul>
                                <hr>
                                <ul class="details-list">
                                    <li><strong>Media Platform used :</strong>
                                        <?php if(isset($row['r_platform']) && !empty($row['r_platform'])) { echo $row['r_platform']; }else{ echo "Not Assigned"; } ?>
                                    </li>
                                    <li><strong>Media Profile :</strong>
                                        <?php if(isset($row['r_profile']) && !empty($row['r_profile'])) { echo $row['r_profile']; }else{ echo "Not Assigned"; } ?>
                                    </li>
                                    <li><strong>Name :</strong>
                                        <?php if(isset($row['r_bearer']) && !empty($row['r_bearer'])) { echo $row['r_bearer']; }else{ echo "Not Assigned"; } ?>
                                    </li>
                                    <li><strong>Payment Method :</strong>
                                        <?php if(isset($row['r_payment']) && !empty($row['r_payment'])) { echo $row['r_payment']; }else{ echo "Not Assigned"; } ?>
                                    </li>
                                    <li><strong>Amount Requested :</strong>
                                        <?php if(isset($row['r_amount']) && !empty($row['r_amount'])) { echo $row['r_amount']; }else{ echo "Not Assigned"; } ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-bg-white">
                                <h3 class="post-content-title mb-4">Official Remark</h3>
                                <?php 
                  if (mysqli_num_rows($admin_comment_result) > 0) {
                  do{ ?>
                                <div class="col-lg-12 col-md-12 grids-feature">
                                    <h4><a href="#feature"
                                            class="title-head"><?php echo $admin_comment_row['rc_name']; ?></a></h4>
                                    <p>
                                        <?php echo $admin_comment_row['rc_remark']; ?>
                                    </p>
                                </div>
                                <hr>
                                <?php } while($admin_comment_row = mysqli_fetch_assoc($admin_comment_result)); 
                }
                ?>
                            </div>
                            <div class="single-bg-white">
                                <h3 class="post-content-title mb-0">Comments</h3>
                                <hr>
                <?php 
                 if (mysqli_num_rows($comment_result) > 0) {
                  do{ ?>
                                <div class="col-lg-12 col-md-12 grids-feature">
                                    <h4><a href="#feature" class="title-head"><?php echo $comment_row['rc_name']; ?></a>
                                    </h4>
                                    <p>
                                        <?php echo $comment_row['rc_remark']; ?>
                                    </p>
                                </div>
                                <hr>
                <?php 
                  } while($comment_row = mysqli_fetch_assoc($comment_result)); 
                 }else{
                  echo '<h4><a href="#feature" class="title-head">Be the first to confirm</a></h4>';
                 }
                ?>

                            </div>
                            <div class="single-bg-white">
                                <h3 class="post-content-title mb-4">Submit Comment</h3>
                                <p class="mb-4">Your email address will not be published. Required fields are marked *
                                </p>
                                <section class="w3l-contact-7" id="contact">
                                    <div class="contacts-9">
                                        <div class="container">
                                            <div class="row map-content-9">
                                                <div class="col-lg-12">
                                                    <div class="contact-form">
                                                        <form action="" method="post" name="comment_form">
                                                            <div class="form-grid">
                                                                <div class="input-field">
                                                                    <input type="text" name="rc_name" id="rc_name"
                                                                        placeholder="Your Name" required="">
                                                                </div>
                                                                <div class="input-field">
                                                                    <input type="email" name="rc_email" id="rc_email"
                                                                        placeholder="Email" required="">
                                                                </div>
                                                            </div>
                                                            <div class="input-field mt-4">
                                                                <textarea name="rc_remark" id="rc_remark"
                                                                    placeholder="Message"></textarea>
                                                            </div>
                                                            <input type="hidden" name="comment_form">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-style mt-3">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12 mt-lg-0 mt-5">
                    <aside class="sidebar">
                        <!-- Popular Post Widget-->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title">
                                <h4>Other Related Reports</h4>
                            </div>
                            <?php
                              do{ 
                                $related_comment_sql = "SELECT * FROM reports_comments where r_id={$related_row['r_id']}";
                                $related_comment_result = mysqli_query($conn, $related_comment_sql);
                                $related_comment_row = mysqli_fetch_assoc($related_comment_result);
                                $related_comment_row_count = mysqli_num_rows($related_comment_result);
                            ?>
                            <article class="post">
                                <figure class="post-thumb"><img src="assets/images/fraud-alert.png" class="radius-image" alt="">
                                </figure>
                                <div class="text">
                                  <a href="report_single.php?r_id=<?php echo $related_row['r_id']?>">
                                  <?php if(isset($related_row['r_title']) && !empty($related_row['r_title'])) { echo $related_row['r_title']; }else{ echo "[{$related_row['r_comm']}]"; } ?>
                                  </a>
                                    <div class="post-info"><?php echo  $related_comment_row_count; ?> comments</div>
                                </div>
                            </article>
                            <?php 
                              }while($related_row = mysqli_fetch_assoc($related_result));
                            ?>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--//blog-posts-->
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