<?php
@session_start();
if (array_key_exists('email', $_SESSION) && array_key_exists('email', $_COOKIE)) {
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



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.min.css">
</head>

<body>
    <div class="form-container">
        <h2>Login</h2>
        <form method="post" novalidate>
            <div class="input-content">
                <div class="label-container">
                    <label for="email">Email</label>
                </div>
                <input type="text" name="email" placeholder="Enter your e-mail" class="inputs" required />
                <small><?php if (isset($error['email'])) {
                            echo $error['email'];
                        } ?></small>
            </div>
            <div class="input-content">
                <div class="label-container">
                    <label for="password">Password</label>
                </div>
                <input type="password" name="password" placeholder="Enter your password" class="inputs" id="passwordField" required />
                <i class="fa-solid fa-eye-slash" id="password-hidden"></i>
                <i class="fa-solid fa-eye hide" id="password-shown"></i>
                <?php if (isset($error['password'])) {
                    echo $error['password'];
                } ?></small>
                <?php
                if (isset($status)) {
                    echo "<small>$status</small>";
                }
                ?>
            </div>
            <button type="submit" name="submit">Sign In</button>
            <!-- <input type="submit" name="submit" value="Log In"> -->

        </form>
        <p>Not Registered? <a href="register.php">Sign Up Here</a></p>
    </div>

    <script src="https://kit.fontawesome.com/1f2d50e34f.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    

</body>

</html>