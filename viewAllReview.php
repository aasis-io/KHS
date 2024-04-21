<?php

include('class/user.class.php');
include('class/rating.class.php');



$user = new User();
$user->set('id', $_GET['id']);
$retrieveUser = $user->getById();


$rating = new Rating();
$rating->set('u_id', $_GET['id']);

$ratingList = $rating->getAllReviewsById();



$averageRating = $rating->getAverageRating();

$totalReviews = $rating->getTotalReviews();




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
        <a href="#" class="accHome" onclick="history.go(-1)"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
        <div class="container">
            <div class="userDetail viewBySeeker">

                <div class="userReviews">
                    <h2><?php echo $retrieveUser->fullname; ?></h2>
                    <span>Rated <?php echo round($averageRating, 1) ?> <i class='bx bxs-star'></i> : Based on <?php echo $totalReviews; ?> Reviews</span>
                    <ul class="reviewList">
                        <?php foreach ($ratingList as $review) {
                        ?>
                            <li>
                                <span class="reviewer"><?php echo $review->review_giver; ?></span>
                                <div class="rating">
                                    <?php for ($i = 0; $i < $review->rating; $i++) { ?>
                                        <i class="fa-solid fa-star"></i>
                                    <?php } ?>
                                </div>
                                <p><?php echo $review->review; ?></p>
                            </li>
                        <?php  }  ?>
                    </ul>
                    <ul class="buttonList">
                        <li><a href="writeReview.php?id=<?php echo $_GET['id']; ?>" class="stylishButton">Write a review</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/1f2d50e34f.js" crossorigin="anonymous"></script>

</body>

</html>