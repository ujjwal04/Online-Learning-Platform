<?php
    ob_start();
    session_start();

    $timezone = date_default_timezone_set("Asia/Kolkata");

    //$con = mysqli_connect("localhost","root","","online_platform");
    $con = mysqli_connect("sql306.epizy.com","epiz_27017295","DHGksBCaEwu0NB","epiz_27017295_online_platform");

    if(mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_errno();
    }
?>