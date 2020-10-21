<?php

include("php/config.php");
include("php/classes/Course.php");
include("php/classes/Tutor.php");
include("php/classes/Feedback.php");
include("php/classes/Quiz.php");


$courses = new Course($con);
$user_name = $_SESSION['userLoggedIn'];

if(isset($_GET['name'])) {
    $courses->deleteCourseByName($_GET['name'],$user_name); 
    header("Location: userProfile.php");
}
$quizzes = new Quiz($con);
$course_names = $courses->getCoursesByUserName($user_name);
$scores = $quizzes->getScoresByUserName($user_name);
echo "<script>
        const courseNames = $course_names;
        const score = $scores;
        const user_name = $user_name;
    </script>
";


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
    <link rel="stylesheet" href="css/userProfile.css">

</head>
<body>
    <div class="container mt-4">
        <div class="row profile-section">
            <div class="col-2 profile-pic">
                <img src="java.jfif" alt="">
            </div>
            <div class="col-4 username">
                <h3 class="my-auto"><?php echo $user_name?></h3>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h1 class="display-4">Courses Taken</h1>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Course Name</th>
            <th scope="col">Rating</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="course-table">
            
        </tbody>
        </table>
    </div>

    <div class="container mt-4">
        <h1 class="display-4">Quizes Taken</h1>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Course Name</th>

            <th scope="col">Scores</th>
            </tr>
        </thead>
        <tbody class="quiz-table">
            
        </tbody>
        </table>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/userProfile.js"></script>
</body>
</html>