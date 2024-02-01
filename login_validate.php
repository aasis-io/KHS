<?php
@session_start();
if (array_key_exists('email', $_SESSION)) {
    header('location:index.php');
}


include('class/user.class.php');

$userObject = new User();
$error = [];

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $userObject->email = $_POST['email'];
    } else {
        $error['email'] = "This field is required!";
    }
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $userObject->password = $_POST['password'];
    } else {
        $error['password'] = "This field is required!";
    }

    if (count($error) < 1) {
        $status =  $userObject->login();
    }
}
