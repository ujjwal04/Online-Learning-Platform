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

$quiz_id = $quiz->getQuizzes();

echo "<script>const quiz = $quiz_id;</script>";



if(isset($_POST['insert'])) {
    $quiz_id = $_POST['quiz_id'];
    $ques_content = $_POST['ques_content'];
    $option_1 = $_POST['option_1'];
    $option_2 = $_POST['option_2'];
    $option_3 = $_POST['option_3'];
    $option_4 = $_POST['option_4'];
    $correct_option = $_POST['correct_option'];
    $quiz->insertQuestion($quiz_id,$ques_content,$option_1,$option_2,$option_3,$option_4,$correct_option);
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
<form action="insertQuestion.php" method="POST">
            <h2 class="text-center mb-3">INSERT QUESTION</h1>
            <div class="form-group">
                <label for="quiz_id">Choose Quiz Id</label>
                <select class="form-control" id="quiz_id" name="quiz_id">
                </select>
            </div>
            <div class="form-group">
                <label for="ques_content">Enter Question Content</label>
                <input type="text" class="form-control" id="ques_content" name="ques_content" required>
            </div>
            <div class="form-group">
                <label for="option_1">Enter Option 1</label>
                <input type="text" class="form-control" id="option_1" name="option_1" required>
            </div>
            <div class="form-group">
                <label for="option_2">Enter Option 2</label>
                <input type="text" class="form-control" id="option_2" name="option_2" required>
            </div>
            <div class="form-group">
                <label for="option_3">Enter Option 3</label>
                <input type="text" class="form-control" id="option_3" name="option_3" required>
            </div>
            <div class="form-group">
                <label for="option_4">Enter Option 4</label>
                <input type="text" class="form-control" id="option_4" name="option_4" required>
            </div>
            <div class="form-group">
                <label for="correct_option">Enter Correct Option</label>
                <input type="text" class="form-control" id="correct_option" name="correct_option" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-register" name="insert">INSERT</button>
</form>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/insertQuestion.js"></script>
</body>
</html>