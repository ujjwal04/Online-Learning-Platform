<?php
    include("php/config.php");
    include("./php/classes/Constants.php");
    include("php/classes/Account.php");

    $account = new Account($con);

    include("./php/handlers/registerHandler.php");
    include("./php/handlers/login-handler.php");

    if(isset($_GET['login'])) {
        echo "<script>alert('Successfully logged out')</script>";
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
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <form class="login-form" action="login.php" method="POST">
            <h1 class="display-4 text-center">LOG IN</h1>
            <div class="form-group">
                <label for="loginUsername">Username</label>
                <input type="text" class="form-control" id="loginUsername" placeholder="Enter username" name="loginUsername" required>
                <?php
                    if(isset($_POST['btn-login'])) {
                      echo $account->getError(Constants::$loginFailed); 
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="loginPassword" placeholder="Password" name="loginPassword" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="btn-login">LOG IN</button>
            <p class="text-center mt-3 signup-link">Don't have an account yet? Signup here</p>
            <a class="text-center mt-3 admin-login" href="adminLogin.php">Admin Login</a>
        </form>

        <form class="signup-form" action="login.php" method="POST">
            <h1 class="display-4 text-center mb-3">SIGN UP</h1>
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
            <button type="submit" class="btn btn-primary btn-block btn-register" name="registerBtn">REGISTER</button>
            <p class="text-center mt-3 login-link">Already have an account? Login here</p>
        </form>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/loginContainer.js"></script>
    <?php
    if(isset($_POST['registerBtn'])) {
        echo "<script>
                document.querySelector('.login-form').style.display = 'none';
                document.querySelector('.signup-form').style.display = 'block';
        </script>";
    }
    else {
        echo "<script>
                document.querySelector('.signup-form').style.display = 'none';
                document.querySelector('.login-form').style.display = 'block';
        </script>";
    }
    ?>
</body>
</html>