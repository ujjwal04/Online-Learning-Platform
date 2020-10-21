<?php

include("php/config.php");
include("php/classes/Constants.php");
include("php/classes/Account.php");

include("php/classes/Course.php");
include("php/classes/Tutor.php");
include("php/classes/Feedback.php");
include("php/classes/Quiz.php");

$tutor = new Tutor($con);
$course = new Course($con);

$tutor_names = $tutor->getAllTutorNames();
echo "<script>const tutorName = $tutor_names;
        console.log(tutorName);</script>";

if(isset($_POST['insert'])) {
    $course_name = $_POST['course_name'];
    $course_desc = $_POST['course_description'];
    $tutor_name = $_POST['tutor_name'];
    $course_video = $_POST['course_video'];
    $course_rating = $_POST['course_rating'];
    $course->insertCourse($course_name,$course_desc,$tutor_name,$course_video,$course_rating);
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
<form action="insertCourse.php" method="POST">
            <h2 class="text-center mb-3">INSERT COURSE</h1>
            <div class="form-group">
                <label for="username">Enter Course Name</label>
                <input type="text" class="form-control" id="course_name" placeholder="Course Name" name="course_name" required>
            </div>
            <div class="form-group">
                <label for="email">Enter Description</label>
                <input type="text" class="form-control" id="course_description" placeholder="Enter Description" name="course_description" required>
            </div>
            <div class="form-group">
                <label for="password">Choose Tutor</label>
                <select id="tutor_name" class="form-control" name="tutor_name">
                </select>
            </div>
            <div class="form-group">
                <label for="password">Enter Video Link</label>
                <input type="text" class="form-control" id="course_video" name="course_video" required>
            </div>

            <div class="form-group">
                <label for="password">Enter rating</label>
                <input type="text" class="form-control" id="course_rating" name="course_rating" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-register" name="insert">INSERT</button>
        </form>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/insertCourse.js"></script>

</body>
</html>