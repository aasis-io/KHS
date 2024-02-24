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
        </div>
    <?php } ?>

    <div id="wrapper">
        <div class="header">
            <a class="logo" href="index.php"><img src="images/logo.png" alt=""></a>
            <nav>
                <ul class="nav-list">
                    <li><a href="">Home</a></li>
                    <li class="dropdown"><a href="javascript:void(0)">Services<i class='bx bxs-chevron-down'></i></a>

                        <ul class="dropdown-menu">
                            <li><a href="plumber.php">Plumber</a></li>
                            <li><a href="">Electrician</a></li>
                            <li><a href="">Carpenter</a></li>
                            <li><a href="">Painter</a></li>
                        </ul>

                    </li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <?php if (isset($_SESSION['email'])) { ?>
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
        <div class="container">
            <?php include('filter.php'); ?>
            <?php include('user_table.php'); ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/filter.js"></script>

</body>

</html>