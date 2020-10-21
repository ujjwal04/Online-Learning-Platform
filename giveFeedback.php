<?php
include("php/config.php");
include("php/classes/Course.php");
include("php/classes/Tutor.php");
include("php/classes/Feedback.php");
include("php/classes/QUiz.php");

$feedback = new Feedback($con);
$courses = new Course($con);
$user_name = $_SESSION['userLoggedIn'];



if(isset($_GET['id'])) {
    $_SESSION['course_id'] = $_GET['id'];
}

if(isset($_POST['insert'])) {
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];
    $date = date("Y/m/d");
    $feedback->insertFeedbackByUserId($user_name,$_SESSION['course_id'],$comment,$date,$rating);
    $course_id = $_SESSION['course_id'];
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
<form action="giveFeedback.php" method="POST">
<h1 class="display-4 text-center mb-3">GIVE FEEDBACK</h1>
<div class="form-group">
    <label for="comment">Enter Comment</label>
    <input type="text" class="form-control" id="comment" name="comment" required>
    </select>
</div>
<div class="form-group">
    <label for="rating">Enter Rating</label>
    <input type="text" class="form-control" id="rating" name="rating" required>
    </select>
</div>
<button type="submit" class="btn btn-primary btn-block btn-register" name="insert">SUBMIT</button>
</form>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/courseContent.js"></script>
</body>
</html>
