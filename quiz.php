<?php include_once("connection.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Defence Fraud Report System - Cyber Safety Quiz</title>
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
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog.php">Safety Tips</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                    </ul>
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
                <h2>Cyber Safety Quiz</h2>
            </div>
        </div>
    </section>
    
    <!-- Quiz Section -->
    <section class="w3l-news" id="quiz">
        <div class="container py-5">
            <h3 class="title-big text-center">Test Your Knowledge on Cyber Safety</h3>
            <form method="POST" action="">
                <?php
                $quiz_sql = "SELECT * FROM quiz_questions ORDER BY id ASC";
                $quiz_result = mysqli_query($conn, $quiz_sql);
                $question_number = 1;

                while ($question = mysqli_fetch_assoc($quiz_result)) {
                    echo "<div class='mb-4'>";
                    echo "<h5>Question $question_number: {$question['question_text']}</h5>";
                    foreach (['A', 'B', 'C', 'D'] as $option) {
                        echo "<label><input type='radio' name='answer[{$question['id']}]' value='$option'> {$question['option_' . strtolower($option)]}</label><br>";
                    }
                    echo "</div>";
                    $question_number++;
                }
                ?>
                <button type="submit" class="btn btn-primary">Submit Quiz</button>
            </form>
        </div>
    </section>

    <!-- PHP: Handle Quiz Submission -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['answer'])) {
        $score = 0;
        $total_questions = 0;

        foreach ($_POST['answer'] as $question_id => $user_answer) {
            $correct_sql = "SELECT correct_answer FROM quiz_questions WHERE id = $question_id";
            $correct_result = mysqli_query($conn, $correct_sql);
            $correct_row = mysqli_fetch_assoc($correct_result);

            if ($correct_row['correct_answer'] === $user_answer) {
                $score++;
            }
            $total_questions++;
        }

        echo "<div class='container text-center mt-4'><h4>Your Score: $score out of $total_questions</h4></div>";
    }
    mysqli_close($conn);
    ?>

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
