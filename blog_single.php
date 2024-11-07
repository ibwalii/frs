<?php
include_once("connection.php");

// Check if the post ID is provided
if (isset($_GET['post_id'])) {
    $post_id = intval($_GET['post_id']); // Convert to integer for security

    // Query to fetch the single blog post details
    $single_blog_sql = "SELECT * FROM blog_posts WHERE post_id = ? AND status = 1";
    $stmt = mysqli_prepare($conn, $single_blog_sql);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if post is found
    if ($blog_row = mysqli_fetch_assoc($result)) {
        $title = $blog_row['title'];
        $content = $blog_row['content'];
        $created_at = date("F j, Y", strtotime($blog_row['created_at']));
    } else {
        // Redirect or show an error if the post does not exist
        header("Location: blog.php");
        exit();
    }

    mysqli_stmt_close($stmt);
} else {
    // Redirect if no post ID is provided
    header("Location: blog.php");
    exit();
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($title); ?> - Defence FRS Blog</title>
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke px-0">
                <h1><a class="navbar-brand" href="index.php"><span class="fa fa-shield"></span> Defence FRS</a></h1>
                <button class="navbar-toggler collapsed bg-gradient" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-5 mr-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                    </ul>
                    <div class="top-quote mt-lg-0">
                        <a href="blog.php" class="btn btn-style btn-primary"><span class="fa fa-lock"></span> Security Center
                        </a>
                    </div>
                    <div class="top-quote mt-lg-0">
                        <a href="report.php" class="btn btn-style btn-primary"><span class="fa fa-send"></span> Report Now</a>
                    </div>
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
                <li><a href="blog.php">Post</a></li>
                <li class="active"><span class="fa fa-angle-right mx-2" aria-hidden="true"></span> Fraud Report List</li>
            </ul>
        </div>
    </section>

    <!-- Single Blog Post Section -->
    <section class="w3l-blog-single py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="title-big"><?php echo htmlspecialchars($title); ?></h1>
                    <p class="text-muted">Published on <?php echo $created_at; ?></p>
                    <hr>
                    <div class="blog-content">
                        <?php echo nl2br(htmlspecialchars($content)); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section class="w3l-footers-20">
        <div class="footers20">
            <div class="container">
                <div class="footers20-content">
                    <p class="copy-footer-29 text-center">© 2024 Defence Fraud Reporting Portal. All rights reserved.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery and Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/theme-change.js"></script>
</body>
</html>
