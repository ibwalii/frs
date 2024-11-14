<?php include_once("connection.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Police Fraud Report System - Cyber Safety Quiz</title>
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <style>
        .quiz-container {
            max-width: 700px;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .question-header {
            font-weight: 700;
            color: #333;
        }
        .option-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        .option {
            background: #fff;
            border: 2px solid #ddd;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            flex: 1 1 calc(50% - 10px);
            text-align: center;
            transition: 0.3s ease;
        }
        .option input[type="radio"] {
            display: none;
        }
        .option.selected, .option:hover {
            background: #007bff;
            color: #fff;
            border-color: #007bff;
        }
        /* Modal styling */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
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
                <li class="active"><span class="fa fa-angle-right mx-2" aria-hidden="true"></span> Security Awareness Quiz</li>
            </ul>
        </div>
    </section>
    <hr>
    <!-- Quiz Section -->
    <section class="quiz-container" id="quiz">
        <h3 class="text-center">Test Your Knowledge on Cyber Safety</h3>
        <form method="POST" action="">
            <?php
            $quiz_sql = "SELECT * FROM quiz_questions ORDER BY id ASC";
            $quiz_result = mysqli_query($conn, $quiz_sql);
            $question_number = 1;

            while ($question = mysqli_fetch_assoc($quiz_result)) {
                echo "<div class='question-block'>";
                echo "<h5 class='question-header'>Question $question_number: {$question['question_text']}</h5>";
                echo "<div class='option-container'>";

                foreach (['A', 'B', 'C', 'D'] as $option) {
                    echo "<label class='option'>
                            <input type='radio' name='answer[{$question['id']}]' value='$option'>
                            {$question['option_' . strtolower($option)]}
                          </label>";
                }

                echo "</div></div>";
                $question_number++;
            }
            ?>
            <button type="submit" class="btn btn-primary mt-3">Submit Quiz</button>
        </form>
    </section>

    <!-- PHP: Handle Quiz Submission -->
      <!-- Modal for displaying quiz result -->
    <div id="resultModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="resultMessage"></div>
        </div>
    </div>

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
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var resultMessage = document.getElementById('resultMessage');
                    resultMessage.innerHTML = '<h4>Your Score: $score out of $total_questions</h4>';
                    document.getElementById('resultModal').style.display = 'block';
                });
              </script>";
    }
    mysqli_close($conn);
    ?>

    <!-- Footer and scripts as in your existing template -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/theme-change.js"></script>
    <script>
        // Highlight selected option
        document.querySelectorAll('.option').forEach(option => {
            option.addEventListener('click', () => {
                const parent = option.closest('.option-container');
                parent.querySelectorAll('.option').forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
                option.querySelector('input[type="radio"]').checked = true;
            });
        });

        // Close the modal
        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('resultModal').style.display = 'none';
        });

        // Close modal when clicking outside the modal
        window.onclick = function(event) {
            var modal = document.getElementById('resultModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    </script>
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
