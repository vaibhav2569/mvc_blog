<?php
session_start();
// login checker
include_once '../assets/variables.php';
include_once BASE_PATH . '/assets/db/config.php';
if (isset($_GET)) {
    $result = User::find_by_email_and_pswd($_GET['email'], $_GET['pswd']);
    echo "<pre>"; 
    if ($result->email && $result->pswd) {
         $_SESSION['user']=$result->email;
        header('location:../View/home.php?');
    } else {
        header('location:../View/login.php?msg=Login Failed ,Please Try Again');
    }
}