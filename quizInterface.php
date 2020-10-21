<?php

include("php/config.php");
include("php/classes/Course.php");
include("php/classes/Tutor.php");
include("php/classes/Feedback.php");
include("php/classes/QUiz.php");

$courses = new Course($con);
$quiz = new Quiz($con);
$course = $courses->getCourses();
echo "<script>
            const course = $course;
      </script>
";

if(isset($_POST['btn-quiz'])) {
    $course_name = $_POST['quizCourse'];
    $quiz_id = $quiz->getQuizIdByCourseName($_POST['quizCourse']);
    $res = implode($quiz_id);
    $resStr = $res{0};
    header("Location: quiz.php?id='$resStr'&course_name='$course_name'");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Learning Platfrom</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/quizInterface.css">
</head>
<body>
    <div class="container">
        <form class="quiz-form" action="quizInterface.php" method="POST">
            <h1 class="display-4 text-center">QUIZ</h1>
            <div class="form-group">
                <label for="quizCourse">Choose Course</label>
                <select class="form-control" name="quizCourse" id="quizCourses">
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="btn-quiz">TAKE QUIZ</button>
        </form>
    </div>
</body>
</html>


    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/quizInterface.js"></script>
</body>
</html>