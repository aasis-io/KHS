<?php
@session_start();
if (array_key_exists('email', $_SESSION) && array_key_exists('email', $_COOKIE)) {
    header('location:index.php');
}


include('class/seeker.class.php');

$seekerObject = new Seeker();
$error = [];

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $seekerObject->email = $_POST['email'];
    } else {
        $error['email'] = "This field is required!";
    }
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $seekerObject->password = $_POST['password'];
    } else {
        $error['password'] = "This field is required!";
    }

    if (count($error) < 1) {
        $status =  $seekerObject->login();
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
    <div id="wrapper">
        <div class="form-container">
            <h2>Login</h2>
            <form method="post" novalidate>
                <div class="input-content">
                    <div class="label-container">
                        <label for="email">Email</label>
                    </div>
                    <input type="text" name="email" placeholder="Enter your e-mail" class="inputs" required />
                    <?php if (isset($error['email'])) { ?>
                        <small class="loginError"> <?php echo $error['email']; ?> </small>
                    <?php } ?>
                </div>
                <div class="input-content">
                    <div class="label-container">
                        <label for="password">Password</label>
                    </div>
                    <input type="password" name="password" placeholder="Enter your password" class="inputs" id="passwordField" required />
                    <i class="fa-solid fa-eye-slash" id="password-hidden"></i>
                    <i class="fa-solid fa-eye hide" id="password-shown"></i>
                    <?php if (isset($error['password'])) { ?>
                        <small class="loginError"> <?php echo $error['password']; ?> </small>
                    <?php } ?>
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
        <a href="index.php" class="homeRedirect">Go To Home Page &nbsp;<i class="fa-solid fa-up-right-from-square"></i></a>
    </div>

    <script src="https://kit.fontawesome.com/1f2d50e34f.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>


</body>

</html>