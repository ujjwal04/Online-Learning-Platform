<?php

include("php/config.php");
include("php/classes/Course.php");
include("php/classes/Tutor.php");
include("php/classes/Feedback.php");


if(isset($_GET['id'])) {
    $courses = new Course($con);
    $feedback = new Feedback($con);
    $course = $courses->getCourseById($_GET['id']);
    $tutor_name = $courses->getTutorName($_GET['id']);
    $user_name = $feedback->getUserNames($_GET['id']);
    echo "<script>
            const course = $course;
            const tutorName = $tutor_name;
            const feedback = $user_name;
        </script>
    ";
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
    <link rel="stylesheet" href="css/courses.css">
</head>
<body>
        <div class="header-section"></div>

        <div class="description-section container"></div>

        <div class="feedback-section container">
        <h1 class="display-4">Feedback</h1>
        </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/courses.js"></script>
</body>
</html>