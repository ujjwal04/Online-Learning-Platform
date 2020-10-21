<?php

function sanitizeFormUsername($inputText) {

    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ","",$inputText);
    return $inputText;
}

function sanitizeFormString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ","",$inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}

function sanitizeFormPassword($inputText) {
    $inputText = strip_tags($inputText);
    return $inputText;
}

if(isset($_POST['registerBtn'])) {
    $userName = sanitizeFormUsername($_POST['userName']);
    $email = sanitizeFormUsername($_POST['email']);
    $password = sanitizeFormPassword($_POST['password']);
    $confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);

    $wasSuccessful = $account->register($userName,$email,$password,$confirmPassword);
    if($wasSuccessful) {
        $_SESSION['userLoggedIn'] = $userName;
        header("Location: adminHome.php");
    }
}

?>