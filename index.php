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
    <title>KHS - Home Page</title>
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
            <nav id="myNavbar" class="meroNavbar">
                <button id="navCloser" class="bandaGar"><i class='bx bx-x'></i></button>
                <ul class="nav-list">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown"><a href="javascript:void(0)">Services<i class='bx bxs-chevron-down'></i></a>

                        <ul class="dropdown-menu">
                            <li><a href="services.php">Plumber</a></li>
                            <li><a href="">Electrician</a></li>
                            <li><a href="">Carpenter</a></li>
                            <li><a href="">Painter</a></li>
                        </ul>

                    </li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <?php if (isset($_SESSION['email']) && $_SESSION['role'] == "user") { ?>

                        <li class="profile-toggle">
                            <a href="#" class="profile-drop"><img src="images/<?php echo $_SESSION['image']; ?>" alt=""></a>
                            <ul class="profile-menu">
                                <li><a href="account.php?id=<?php echo $_SESSION['id'] ?>">Account</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>

                    <?php } elseif (isset($_SESSION['email']) && $_SESSION['role'] == "seeker") { ?>

                        <li class="profile-toggle">
                            <a href="#" class="profile-drop seekerProfile">
                                <?php


                                $myString = $_SESSION['fullname'];

                                /* get First Character of string */
                                $char = substr($myString, 0, 1);

                                /* Echo resulted string */
                                echo $char;

                                ?>
                            </a>
                            <ul class="profile-menu">
                                <li><a href="seekerAccount.php?id=<?php echo $_SESSION['id'] ?>">Account</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>

                    <?php  } else { ?>


                        <li class="loginBtn"><a href="question.php">Sign In</a></li>

                    <?php } ?>

                </ul>
            </nav>
            <button id="toggleMenu" class="menuToggle">MENU <i class='bx bx-menu'></i></button>

        </div>
        <div class="container">
            <div class="hero-section">
                <div class="hero-content">
                    <h1 class="heading">Enhancing Capital’s <br> Homes through easy connections and skilled, efficient
                        services</h1>
                    <p class="hero-description">Connect with Confidence: Uncover Reliable <br>
                        Service Providers in Your Local Area for Seamless Solutions <br> and Trusted Expertise.</p>
                    <div class="buttons">
                        <a class="cta-explore" href="">Explore More</a>

                        <a class="cta-find" href="services.php">Find Now<i class='bx bxs-chevron-down'></i></a>
                    </div>
                </div>
                <div class="hero-image"><img src="images/banner-edited.png" alt=""></div>
            </div>

        </div>
    </div>

    <script src="js/script.js"></script>


    <script>
        

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