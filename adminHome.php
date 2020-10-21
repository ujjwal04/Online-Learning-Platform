<?php

include("php/config.php");
include("php/classes/Constants.php");
include("php/classes/Account.php");

include("php/classes/Course.php");
include("php/classes/Tutor.php");
include("php/classes/Feedback.php");
include("php/classes/Quiz.php");

$users = new Account($con);
$courses = new Course($con);
$quiz = new Quiz($con);
$tutor = new Tutor($con);



if(isset($_POST['insert-btn'])) {
    $un = $_POST['insertUsername'];
    $em = $_POST['insertEmail'];
    $pw= $_POST['insertPassword'];
    $users->insertUserDetails($un,$em,$pw);
}


if(isset($_GET['user_id'])) {
    $users->deleteUserById($_GET['user_id']);
    header("Location: adminHome.php");
}

if(isset($_GET['course_id'])) {
    $courses->deleteCourseById($_GET['course_id']);
    header("Location: adminHome.php");
    echo "<script>alert('Course deleted successfully')</script>";
}

if(isset($_GET['quiz_id'])) {
    $quiz->deleteQuizById($_GET['quiz_id']);
    header("Location: adminHome.php");
    echo "<script>alert('Course deleted successfully')</script>";
}

if(isset($_GET['question_id'])) {
    $quiz->deleteQuestionById($_GET['question_id']);
    header("Location: adminHome.php");
    echo "<script>alert('Course deleted successfully')</script>";
}

if(isset($_GET['tutor_id'])) {
    $tutor->deleteTutorById($_GET['tutor_id']);
    header("Location: adminHome.php");
    echo "<script>alert('Course deleted successfully')</script>";
}

if(isset($_GET['enroll_course_id']) && isset($_GET['enroll_user_id'])) {
    $courses->deleteEnrollById($_GET['enroll_user_id'],$_GET['enroll_course_id']);
}

if(isset($_GET['score_quiz_id']) && isset($_GET['score_user_id'])) {
    $quiz->deleteScoreById($_GET['score_user_id'],$_GET['score_quiz_id']);
}

if(isset($_GET['feedback_id'])) {
    $courses->deleteFeedbackById($_GET['feedback_id']);
}


$userContent = $users->getUsers();
$courseContent = $courses->getCourses();
$quizContent = $quiz->getQuizzes();
$question = $quiz->getQuestions();
$tutors = $tutor->getTutors();
$enroll = $courses->getEnrolledIn();
$score = $quiz->getScores();
$feedback = $courses->getFeedbacks();
echo "<script>
        const userContent = $userContent;
        const courseContent = $courseContent;
        const quizContent = $quizContent;
        const question = $question;
        const tutor = $tutors;
        const enroll = $enroll;
        const score = $score;
        const feedback = $feedback;
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminHome.css">

</head>
<body>
    <div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <h1 class="display-4 text-center">Tables</h1>
            <div class="users tables text-center mt-4">USERS</div>
            <div class="courses tables text-center mt-4">COURSES</div>
            <div class="quizzes tables text-center mt-4">QUIZZES</div>
            <div class="questions tables text-center mt-4">QUESTIONS</div>
            <div class="tutors tables text-center mt-4">TUTORS</div>
            <div class="enrolled_in tables text-center mt-4">ENROLLED_IN</div>
            <div class="feedback tables text-center mt-4">FEEDBACK</div>
            <div class="score_in tables text-center mt-4">SCORE_IN</div>
        </div>
        <div class="col-10 table-container">
        <h1 class="display-4 text-center">Admin Page</h1>
        <div class="user-table"></div>
        <div class="course-table" style="display:none;"></div>
        <div class="quiz-table" style="display:none;"></div>
        <div class="question-table" style="display:none;"></div>
        <div class="tutor-table" style="display:none;"></div>
        <div class="enrolls_in-table" style="display:none;"></div>
        <div class="feedback-table" style="display:none;"></div>
        <div class="score-table" style="display:none;"></div>


        </div>
    
    </div>    



    </div>


<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/adminHome.js"></script>
</body>
</html>