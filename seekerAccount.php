<?php

include('class/seeker.class.php');


$seeker = new Seeker();
$seeker->set('id', $_GET['id']);
$retrieveSeeker = $seeker->getById();

session_start();

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
            <div class="userDetail">
                <div class="profileImg">
                    <img src="images/user.png" alt="">
                </div>
                <div class="allDetail">
                    <div class="detail">
                        <p>Full Name: <span><?php echo $retrieveSeeker->fullname ?></span></p>
                    </div>
                    <div class="detail">
                        <p>Email: <span><?php echo $retrieveSeeker->email ?></span></p>
                    </div>

                    <div class="detail">
                        <p>Phone Number: <span><?php echo $retrieveSeeker->phone ?></span></p>
                    </div>





                    <div class="detail linkButton">
                        <button style="background: red;" id="deletePopUp"><i class="fa-solid fa-trash"></i> &nbsp;Delete Account</button>
                        <a href="editUser.php" class="editButton"><i class="fa-solid fa-pen-to-square"></i> &nbsp;Edit Details</a>
                    </div>
                    <div class="deletePop">
                        <div class="deleteFace">
                            <h1>Confirm Deletion</h1>
                            <p>Are you sure you want to delete your account from database? This action cannot be undone.</p>
                            <button class="cancelPop">Cancel</button>
                            <a class="deleteAccount" href="deleteAccount.php?id=<?php echo $_GET['id'] ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/1f2d50e34f.js" crossorigin="anonymous"></script>
    <script>
        document.getElementById("deletePopUp").addEventListener("click", function() {
            document.getElementsByClassName("deletePop")[0].style.display = "block";
            document.getElementsByClassName("deletePop")[0].style.opacity = 1;

        });

        document
            .getElementsByClassName("cancelPop")[0]
            .addEventListener("click", function() {
                document.getElementsByClassName("deletePop")[0].style.display = "none";
                document.getElementsByClassName("deletePop")[0].style.opacity = 0;
            });
    </script>
</body>

</html>