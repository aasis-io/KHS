<?php

include('class/user.class.php');
include('class/rating.class.php');



$user = new User();
$user->set('id', $_GET['id']);
$retrieveUser = $user->getById();


$rating = new Rating();
$rating->set('u_id', $_GET['id']);

$ratingList = $rating->getById();

// Assuming retrieve() returns an array of reviews
foreach ($ratingList as $review) {
    echo $review->review_giver . "<br>";
    echo $review->email . "<br>";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHS - User Profile</title>
    <link rel="stylesheet" href="css/home.min.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/common.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>

    <div id="wrapper">
        <a href="index.php" class="accHome"><i class="fa-solid fa-arrow-left"></i> Go to home page</a>
        <div class="container">
            <div class="userDetail viewBySeeker">
                <div class="userInfo">
                    <div class="profileImg">
                        <img src="images/<?php echo $retrieveUser->image; ?>" alt="">
                    </div>
                    <div class="allDetail">
                        <div class="detail">
                            <p>Full Name: <span><?php echo $retrieveUser->fullname ?></span></p>
                        </div>
                        <div class="detail">
                            <p>Email: <span><?php echo $retrieveUser->email ?></span></p>
                        </div>
                        <div class="detail">
                            <p>Age: <span><?php echo $retrieveUser->age ?></span></p>
                        </div>
                        <div class="detail">
                            <p>Phone Number: <span><?php echo $retrieveUser->phone ?></span></p>
                        </div>
                        <div class="detail">
                            <p>Gender: <span><?php echo $retrieveUser->gender ?></span></p>
                        </div>
                        <div class="detail">
                            <p>Occupation: <span><?php echo $retrieveUser->occupation ?></span></p>
                        </div>
                        <div class="detail">
                            <p>Area: <span><?php echo $retrieveUser->area ?></span></p>
                        </div>
                        <div class="detail">
                            <p>Address: <span><?php echo $retrieveUser->address ?></span></p>
                        </div>

                        <div class="detail linkButton">
                            <button id="callnow"><i class="fa-solid fa-phone"></i> &nbsp;<a href="tel:+977 9876909767">Call Now</a></button>
                        </div>

                    </div>
                </div>

                <div class="userReviews">
                    <ul class="reviewList">
                        <li>
                            
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/1f2d50e34f.js" crossorigin="anonymous"></script>

</body>

</html>