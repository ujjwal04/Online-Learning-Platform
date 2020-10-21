<?php
include("php/config.php");
include("php/classes/Constants.php");
include("php/classes/Account.php");
include("php/classes/Course.php");
include("php/classes/Tutor.php");
include("php/classes/Feedback.php");
include("php/classes/Quiz.php");

$account = new Account($con);

if(isset($_POST['btn-admin'])) {
    $un = $_POST['adminUsername'];
    $pw = $_POST['adminPassword'];
    $account->adminLogin($un,$pw);
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
    <link rel="stylesheet" href="css/adminLogin.css">
</head>
<body>
    <div class="container">
    <form class="admin-login" action="adminLogin.php" method="POST">
            <h1 class="display-4 text-center">ADMIN LOGIN</h1>
            <div class="form-group">
                <label for="loginUsername">Username</label>
                <input type="text" class="form-control" id="loginUsername" placeholder="Enter username" name="adminUsername" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="loginPassword" placeholder="Password" name="adminPassword" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="btn-admin">LOG IN</button>
        </form>
    </div>
</body>
</html>