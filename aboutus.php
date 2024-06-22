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
    <title>About Kathmandu Home Solutions</title>
    <link rel="stylesheet" href="css/home.min.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* CSS styles can be added here for presentation */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        h1,
        h2 {
            text-align: center;
        }

        p {
            text-align: justify;
        }
    </style>
</head>

<body>

    <div id="wrapper">
        <div class="header">
            <a class="logo" href="index.php"><img src="images/logo.png" alt=""></a>
            <nav id="myNavbar" class="meroNavbar">
                <button id="navCloser" class="bandaGar"><i class='bx bx-x'></i></button>
                <ul class="nav-list">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown"><a href="services.php">Services
                            <!-- <i class='bx bxs-chevron-down'></i> -->
                        </a>

                        <!-- <ul class="dropdown-menu">
                            <li><a href="services.php">Plumber</a></li>
                            <li><a href="">Electrician</a></li>
                            <li><a href="">Carpenter</a></li>
                            <li><a href="">Painter</a></li>
                        </ul> -->

                    </li>
                    <li><a href="aboutus.php">About Us</a></li>
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
            <h1>About Kathmandu Home Solutions</h1>

            <p>Welcome to Kathmandu Home Solutions, your premier destination for reliable and accessible home services in the bustling Kathmandu Valley. As urbanization sweeps across our beloved city, the need for skilled tradespeople for essential home repairs and maintenance has never been more pressing.</p>

            <p>At Kathmandu Home Solutions, we have embarked on a mission to simplify your home service needs with a centralized platform that connects you directly to local plumbers, painters, electricians, and carpenters. Our goal is to streamline the hiring process, ensuring prompt service and superior quality, all at your fingertips.</p>

            <h2>Our Approach</h2>

            <p>We employ the structured Waterfall Model to meticulously develop our platform from inception to deployment and beyond. This approach allows us to prioritize detailed planning, thorough analysis, precise design, seamless implementation, rigorous testing, and ongoing maintenance. By adhering to these principles, we guarantee a robust and reliable platform tailored to meet the unique demands of Kathmandu's urban landscape.</p>

            <h2>Technological Foundation</h2>

            <p>Our frontend is crafted with HTML, CSS, and JavaScript, focusing on creating an intuitive, user-friendly interface that simplifies navigation and enhances user experience. Meanwhile, the backend is powered by PHP, providing the backbone for seamless integration of features such as user reviews, ensuring transparency and accountability in every service provided.</p>

            <h2>Tailored to Kathmandu</h2>

            <p>Understanding the distinctive context of Kathmandu, we apply structured analysis and design principles to ensure our platform resonates with the city's specific needs. This localized approach not only enhances service delivery but also empowers residents with valuable insights and fosters a community-driven resource.</p>

            <h2>Our Vision</h2>

            <p>Kathmandu Home Solutions aims to revolutionize home services by integrating technology seamlessly into daily life. Through iterative development and incorporation of user feedback, we strive to elevate the standard of essential home services in Kathmandu, becoming a trusted resource that contributes significantly to the overall improvement of service quality and accessibility.</p>

            <h2>Join Us</h2>

            <p>We invite you to explore Kathmandu Home Solutions and experience firsthand the convenience of reliable home services. Whether you require a quick fix or a major renovation, trust us to connect you with skilled professionals who deliver excellence with every task.</p>

            <p>Thank you for choosing Kathmandu Home Solutions as your partner in enhancing your home's comfort and efficiency. Together, let's build a better Kathmandu—one service at a time.</p>

            <p><em>Empowering Homes, Enriching Lives.</em></p>
        </div>
    </div>

</body>

</html>