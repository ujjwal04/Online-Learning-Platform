<?php
    include("php/config.php");
    include("./php/classes/Constants.php");
    include("php/classes/Account.php");

    $account = new Account($con);

    include("./php/handlers/insertNewUserHandler.php");
    include("./php/handlers/login-handler.php");

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
<form action="insertUser.php" method="POST">
            <h1 class="display-4 text-center mb-3">INSERT USER</h1>
            <div class="form-group">
                <label for="username">Enter Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="userName" required>
                <?php
                    if(isset($_POST['registerBtn'])) {
                      echo $account->getError(Constants::$userNameTaken); 
                    }
                ?>

                <?php
                    if(isset($_POST['registerBtn'])) {
                      echo $account->getError(Constants::$userNameCharacters); 
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="email">Enter Your Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                <?php
                    if(isset($_POST['registerBtn'])) {
                      echo $account->getError(Constants::$emailInvalid); 
                    }
                ?>

                <?php
                    if(isset($_POST['registerBtn'])) {
                      echo $account->getError(Constants::$emailTaken); 
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password" class="form-control" id="password" name="password" required>

                <?php
                    if(isset($_POST['registerBtn'])) {
                      echo $account->getError(Constants::$passwordsDoNotMatch); 
                    }
                ?>

                <?php
                    if(isset($_POST['registerBtn'])) {
                      echo $account->getError(Constants::$passwordsCharacters); 
                    }
                ?>

            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-register" name="registerBtn">INSERT</button>
</form>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>