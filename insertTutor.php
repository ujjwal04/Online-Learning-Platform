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
$tutor = new Tutor($con);

$courses = $course->getCourses();

echo "<script>const course = $courses;</script>";

if(isset($_POST['insert'])) {
    $course_id = $_POST['course_id'];
    $tutor_name = $_POST['tutor_name'];
    $qualification = $_POST['qualification'];
    $tutor->insertTutor($course_id,$tutor_name,$qualification);
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
<form action="insertTutor.php" method="POST">
            <h2 class="text-center mb-3">INSERT TUTOR</h1>
            <div class="form-group">
                <label for="course_id">Enter Course Id</label>
                <input type="text" class="form-control" id="course_id" name="course_id" required>
                </select>
            </div>
            <div class="form-group">
                <label for="tutor_name">Enter Tutor Name</label>
                <input type="text" class="form-control" id="tutor_name" name="tutor_name" required>
            </div>
            <div class="form-group">
                <label for="qualification">Enter Qualification</label>
                <input type="text" class="form-control" id="qualification" name="qualification" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-register" name="insert">INSERT</button>
</form>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/insertTutor.js"></script>
</body>
</html>