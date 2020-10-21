<?php
include("php/config.php");
include("php/classes/Course.php");
include("php/classes/Tutor.php");
include("php/classes/Feedback.php");
include("php/classes/Quiz.php");

$quiz = new Quiz($con);

if(isset($_GET['id']) && isset($_GET['course_name'])) {
    $course_name = $_GET['course_name'];
    $_SESSION['course_name'] = $course_name;
    $question = $quiz->getQuestionsByQuizId($_GET['id']);

    $_SESSION['no_of_questions']=$quiz->getNoOfQues($_GET['id']);

    $_SESSION['question_ids']=$quiz->getQuestionIdsByQuizId($_GET['id']);
    echo "<script>const question=$question;</script>";
    $_SESSION['id'] = $_GET['id'];
}

if(isset($_POST['btn-submit'])) {
    $score=0;
    $number = implode($_SESSION['no_of_questions']);
    $real_number = $number{0};
    $question_id = $_SESSION['question_ids'];
    for ($i=0, $len=$real_number; $i<$len; $i++) {
        $real_id = implode($question_id[$i]);
        $real_id = $real_id{0};
        if(isset($_POST[$real_id])) {
            $correct_option = $quiz->getCorrectOption($real_id);
            $correct_option = $correct_option[0];
            $option_chosen = $_POST[$real_id];
            if($correct_option == $option_chosen) {
                $score++;
            }          
        }
    }
    $quiz->updateTotalScore($_SESSION['userLoggedIn'],$_SESSION['id'],$score);
    $id = $_SESSION['id'];
    header("Location: result.php?id=" . $id . "&score=" . $score . "&no_of_questions=" . $real_number);
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Learning Platform</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/quiz.css">

</head>
<body>
    <header class="container text-center"><h1><?php echo $course_name ?></h1></header>
    <div class="questions-section container">
    <form class="quiz-form" action="quiz.php" method="POST">
    </form>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/quiz.js"></script>

</body>
</html>