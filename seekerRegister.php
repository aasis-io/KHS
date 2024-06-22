<?php
include('class/seeker.class.php');

if (isset($_GET['v'])) {
    $errorMsg = $_GET['v'];
}
$seeker = new Seeker();
$pattern = '/^(98[4-9]|97[7-9]|96[6-9])\d{7}$/';
$passPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/';

if (isset($_POST['submit'])) {

    $emptyFullname = $emptyEmail = $emptyPassword = $emptyPhone = $invalidEmail = $invalidPhone = $invalidPasswordLength = $invalidPassword = '';

    if (empty($_POST['fullname'])) {
        $emptyName = "Name Field Empty!";
    }
    if (empty($_POST['email'])) {
        $emptyEmail = "Email Field Empty!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $invalidEmail = "Invalid Email Format!";
    }
    if (empty($_POST['phone'])) {
        $emptyPhone = "Phone Field Empty!";
    } elseif (strlen($_POST['phone']) != 10 || !preg_match($pattern, $_POST['phone'])) {
        $invalidPhone = "Invalid Phone Number!";
    }

    if (empty($_POST['password'])) {
        $emptyPassword = "Password Field Empty!";
    } elseif (strlen($_POST['password']) < 8 || !preg_match($passPattern, $_POST['password'])) {
        $invalidPasswordLength = "Invalid Password!";
    }

    if (empty($emptyName) && empty($emptyEmail) && empty($emptyPhone) && empty($emptyPassword) && empty($invalidEmail) && empty($invalidPhone) && empty($invalidPasswordLength) && empty($invalidPassword)) {

        $seeker->set('fullname', $_POST['fullname']);
        $seeker->set('email', $_POST['email']);
        $seeker->set('phone', $_POST['phone']);
        $seeker->set('password', $_POST['password']);

        $seeker->save();
    } else {
        $globalError = "Something went wrong! Please Check All the Fields!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeker - Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.min.css">
</head>

<body>
    <div id="wrapper">
        <?php if (isset($ErrMsg)) { ?>
            <div class="alert-container">
                <div class="alert alert-danger"><?php echo $ErrMsg;  ?> <button class="alertTerminator" onclick="alertCloser()"><i class="bx bx-x"></i></button> </div>
            </div> <?php  } ?>
        <?php if (isset($globalError)) { ?>
            <div class="alert-container">
                <div class="alert alert-danger"><?php echo $globalError; ?> <button class="alertTerminator" onclick="alertCloser()"><i class="bx bx-x"></i></button> </div>
            </div> <?php  } ?>

        <div class="form-container">
            <h2>Seeker Register</h2>
            <form method="post" novalidate>
                <div class="input-content">
                    <div class="label-container">
                        <label for="fullname">Fullname</label>
                    </div>
                    <input type="text" name="fullname" placeholder="Enter your fullname" class="inputs" required />
                    <?php if (isset($emptyName)) { ?>

                        <small class="error-message loginError"> <?php echo $emptyName; ?> </small>

                    <?php } ?>
                </div>
                <div class="input-content">
                    <div class="label-container">
                        <label for="email">Email</label>
                    </div>
                    <input type="text" name="email" placeholder="Enter your e-mail" class="inputs" required />
                    <?php if (isset($invalidEmail)) { ?>
                        <small class="error-message loginError"> <?php echo $invalidEmail; ?></small>
                    <?php } ?>
                    <?php if (isset($emptyEmail)) { ?>
                        <small class="error-message loginError"> <?php echo $emptyEmail; ?></small>
                    <?php } ?>
                </div>
                <div class="input-content">
                    <div class="label-container">
                        <label for="phone">Phone Number</label>
                    </div>
                    <input type="text" name="phone" placeholder="Enter your phone-number" class="inputs" required />
                    <?php if (isset($invalidPhone)) { ?>
                        <small class="error-message loginError"> <?php echo $invalidPhone; ?></small>
                    <?php } ?>

                    <?php if (isset($emptyPhone)) { ?>
                        <small class="error-message loginError"> <?php echo $emptyPhone; ?></small>
                    <?php } ?>
                </div>

                <div class="input-content">
                    <div class="label-container">
                        <label for="password">Password</label>
                    </div>
                    <input type="password" name="password" placeholder="Enter your password" class="inputs" id="passwordField" required />
                    <button id="showPassword" type="button"><i class="fa-solid fa-eye-slash"></i></button>
                    <button id="hidePassword" class="hide" type="button"> <i class="fa-solid fa-eye"></i></button>
                    <?php if (isset($emptyPassword)) { ?>
                        <small class="error-message loginError"> <?php echo $emptyPassword; ?></small>
                    <?php } ?>
                    <?php if (isset($invalidPasswordLength)) { ?>
                        <small class="error-message loginError"> <?php echo $invalidPasswordLength; ?></small>
                    <?php } ?>
                </div>

                <button type="submit" name="submit">Register</button>

            </form>
            <p>Already Registered? <a href="seekerLogin.php">Login</a></p>
        </div>
        <a href="index.php" class="homeRedirect">Go To Home Page &nbsp;<i class="fa-solid fa-up-right-from-square"></i></a>
    </div>

    <script src="https://kit.fontawesome.com/1f2d50e34f.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>