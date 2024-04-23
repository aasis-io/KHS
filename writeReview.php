<?php


@session_start();

if (isset($_GET['v'])) {
    $msg = $_GET['v'];
}





include('class/user.class.php');
include('class/rating.class.php');



$user = new User();
$user->set('id', $_GET['id']);
$retrieveUser = $user->getById();

$rating = new Rating();
$rating->set('u_id', $_GET['id']);




if (isset($_POST['submit'])) {

    $emptyName = $emptyEmail = $emptyRating = $emptyReview = '';


    if (empty($_POST['review_giver'])) {
        $emptyName = "Name Field Empty!";
    }

    if (empty($_POST['email'])) {
        $emptyEmail = "Email Field Empty!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $invalidEmail = "Invalid Email Format!";
    }


    if (empty($_POST['rating'])) {
        $emptyRating = "Rating Field Empty!";
    }
    if (empty($_POST['review'])) {
        $emptyReview = "Review Field Empty!";
    }

    if (empty($emptyName) && empty($emptyEmail) && empty($emptyRating) && empty($emptyReview)) {

        $rating->set('review_giver', $_POST['review_giver']);
        $rating->set('email', $_POST['email']);
        $rating->set('rating', $_POST['rating']);
        $rating->set('review', $_POST['review']);
        $rating->save();
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
    <link rel="stylesheet" href="css/home.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/common.min.css">


    <title>Review</title>
</head>

<body>
    <a href="#" class="accHome" onclick="history.go(-1)"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
    <?php if (isset($msg)) { ?>
        <div class="alert-container" id="alertContainer">
            <div class="alert alert-success"><?php echo $msg;  ?> <button class="alertTerminator" onclick="alertCloser()"><i class="bx bx-x"></i></button> </div>
        </div> <?php  } ?>

    <?php if (isset($ErrMsg)) { ?>
        <div class="alert-container">
            <div class="alert alert-danger"><?php echo $ErrMsg;  ?> <button class="alertTerminator" onclick="alertCloser()"><i class="bx bx-x"></i></button> </div>
        </div> <?php  } ?>

    <?php if (isset($globalError)) { ?>
        <div class="alert-container">
            <div class="alert alert-danger"><?php echo $globalError; ?> <button class="alertTerminator" onclick="alertCloser()"><i class="bx bx-x"></i></button> </div>
        </div> <?php  } ?>
    <div class="review-wrapper">
        <div class="name-title">
            <h1>Tell Us, how was your experience?
                <span> With -> <?php echo $retrieveUser->fullname; ?></span>
            </h1>
        </div>
        <div class="review">
            <form action="" method="post" novalidate>
                <div class="input-area">
                    <label for="review_giver">Your Full Name</label>
                    <?php if (isset($emptyName)) { ?>

                        <small class="error-message"> <?php echo $emptyName; ?> </small>

                    <?php } ?>
                    <input type="text" name="review_giver" placeholder="Your name here" value="<?php if ($_SESSION['role'] == "seeker") {
                                                                                                    echo $_SESSION['fullname'];
                                                                                                } ?>">
                </div>
                <div class="input-area">
                    <label for="email">Your Email</label>
                    <?php if (isset($invalidEmail)) { ?>
                        <small class="error-message"> <?php echo $invalidEmail; ?></small>
                    <?php } ?>
                    <?php if (isset($emptyEmail)) { ?>
                        <small class="error-message"> <?php echo $emptyEmail; ?></small>
                    <?php } ?>
                    <input type="text" name="email" placeholder="Your email here" value="<?php if ($_SESSION['role'] == "seeker") {
                                                                                                    echo $_SESSION['email'];
                                                                                                } ?>">
                </div>
                <div class="input-area">
                    <label for="rating">How would you rate your experience?</label>
                    <?php if (isset($emptyRating)) { ?>
                        <small class="error-message"> <?php echo $emptyRating; ?></small>
                    <?php } ?>
                    <select name="rating" id="">
                        <option disabled selected>Rate your experience</option>
                        <option value="5">Excellent</option>
                        <option value="4">Very Good</option>
                        <option value="3">Average</option>
                        <option value="2">Poor</option>
                        <option value="1">Terrible</option>
                    </select>
                </div>
                <div class="input-area">
                    <label for="review">Write your review</label>
                    <?php if (isset($emptyReview)) { ?>
                        <small class="error-message"> <?php echo $emptyReview; ?></small>
                    <?php } ?>
                    <textarea name="review" id="" cols="30" rows="10" placeholder="Share your review"></textarea>
                </div>
                <div class="submit">
                    <button type="submit" name="submit">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/1f2d50e34f.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>