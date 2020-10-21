<?php
include("php/config.php");
include("php/classes/Course.php");
//session_destroy();

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
    header("Location: login.php");
}

$courses = new Course($con);
$content = $courses->getCourses();
echo "<script>
const content = $content;
console.log(content);
</script>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Learning Platform</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <header class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <!--<div class="input-group md-form form-sm form-2 pl-0 search-container">
                        <input class="form-control my-0 py-1 lime-border search-box" type="text" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <span class="input-group-text lime search-icon" id="basic-text1"><i class="fas fa-search text-grey"aria-hidden="true"></i></span>
                        </div>
                    </div>-->
                </div>
                <div class="col-4">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="quizInterface.php" title="Take Quiz">Quiz</a>
                        </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userProfile.php" title="User"><i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/handlers/logoutHandler.php" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="container courses-section mt-4">
        <h1 class="display-4 text-center">Courses You Might Like</h1>
        <div class="courses">
            <div class="row courses-row">
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>