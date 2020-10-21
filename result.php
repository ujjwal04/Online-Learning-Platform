<?php
include("php/config.php");
include("php/classes/Course.php");
include("php/classes/Tutor.php");
include("php/classes/Feedback.php");
include("php/classes/Quiz.php");

$quiz = new Quiz($con);

if(isset($_GET['id']) && isset($_GET['score']) && isset($_GET['no_of_questions'])) {

    $score = $_GET['score'];
    $no_of_questions = $_GET['no_of_questions'];
    $course_name = $quiz->getCourseNameByQuizId($_GET['id']);
    echo "<script>
            const score = $score;
            const noOfQuestions = $no_of_questions;
            const courseName = $course_name;
         </script>";
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
    <link rel="stylesheet" href="css/result.css">
</head>
<body>
<div class="jumbotron container">
</div>



<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/result.js"></script>
    
</body>
</html>