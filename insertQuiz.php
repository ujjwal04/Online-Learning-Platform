<?php
include("php/config.php");
include("php/classes/Constants.php");
include("php/classes/Account.php");

include("php/classes/Course.php");
include("php/classes/Tutor.php");
include("php/classes/Feedback.php");
include("php/classes/Quiz.php");

$quiz = new Quiz($con);
$course = new Course($con);

$courses = $course->getCourses();
echo "<script> const course = $courses;</script>";


if(isset($_POST['insert'])) {
    $course_id = $_POST['course_name'];
    $quiz->insertQuiz($course_id);
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
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<form action="insertQuiz.php" method="POST">
            <h1 class="display-4 text-center mb-3">INSERT QUIZ</h1>
            <div class="form-group">
                <label for="course_name">Choose Course Name</label>
                <select class="form-control" id="course_name" name="course_name" required>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-register" name="insert">INSERT</button>
</form>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/insertQuiz.js"></script>
</body>
</html>