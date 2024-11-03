<?php include_once("connection.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Defence Fraud Report System - Cyber Safety Quiz</title>
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
    </style>
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke px-0">
                <h1><a class="navbar-brand" href="index.php"><span class="fa fa-shield"></span> Defence FRS</a></h1>
                <!-- Navbar toggler, links, and other header code -->
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
    </script>
</body>
</html>
