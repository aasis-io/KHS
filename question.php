<?php
@session_start();

if (isset($_GET['v'])) {
    $msg = $_GET['v'];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHS - Seeker or Provider?</title>
    <link rel="stylesheet" href="css/home.min.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <?php if (isset($msg)) { ?>
        <div class="alert-container" id="alertContainer">
            <div class="alert alert-success"><?php echo $msg;  ?> <button class="alertTerminator" onclick="alertCloser()"><i class="bx bx-x"></i></button> </div>
        </div> <?php  } ?>

    <div id="wrapper">
        <div class="header">
            <a class="logo" href="index.php"><img src="images/logo.png" alt=""></a>
            <nav>
                <ul class="nav-list">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown"><a href="services.php">Services</a>

                        <!-- <ul class="dropdown-menu">
                            <li><a href="services.php">Plumber</a></li>
                            <li><a href="">Electrician</a></li>
                            <li><a href="">Carpenter</a></li>
                            <li><a href="">Painter</a></li>
                        </ul> -->

                    </li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <?php if (isset($_SESSION['email'])) {
                    ?>
                        <li class="profile-toggle">
                            <a href="#" class="profile-drop"><img src="images/<?php echo $_SESSION['image']; ?>" alt=""></a>
                            <ul class="profile-menu">
                                <li><a href="account.php?id=<?php echo $_SESSION['id'] ?>">Account</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>

                    <?php } else { ?>


                        <li class="loginBtn"><a href="login.php">Sign In</a></li>

                    <?php } ?>

                </ul>
            </nav>
        </div>
        <div class="container questionPage">

            <div class="questionWrap">
                <h2>Who are you?</h2>

                <div class="questionButtons">
                    <a href="seekerLogin.php" class="btn-grad">Service Seeker</a>
                    <a href="login.php" class="btn-grad btnWhite">Service Provider</a>
                </div>
            </div>

        </div>
    </div>

    <script src="js/script.js"></script>

    <script>
        var alertContainer = document.getElementById("alertContainer");

        setTimeout(function() {
            alertContainer.style.opacity = "0";
        }, 5000);
        setTimeout(function() {
            alertContainer.style.display = "none";
        }, 6000);

        document.addEventListener("DOMContentLoaded", function() {
            const profileDrop = document.querySelector('.profile-drop');
            const profileMenu = document.querySelector('.profile-menu');

            function toggleProfileMenu() {
                profileMenu.classList.toggle('show');
            }

            profileDrop.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default behavior of anchor tag
                toggleProfileMenu(); // Toggle the display of profile menu
            });
            window.addEventListener('click', function(event) {
                if (!event.target.closest('.profile-toggle')) {
                    profileMenu.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>