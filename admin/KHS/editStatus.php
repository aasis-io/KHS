<?php

include('../../class/user.class.php');


$user = new User();
$user->set('id', $_GET['id']);
$retrieveUser = $user->getById();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHS - User Profile</title>
    <link rel="stylesheet" href="../../css/home.min.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="../../css/common.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>

    <div id="wrapper">
        <a onclick="history.back()" type="button" class="accHome"><i class="fa-solid fa-arrow-left"></i> Go back</a>
        <div class="container">
            <div class="userDetail">
                <div class="profileImg">
                    <img src="../../images/<?php echo $retrieveUser->image; ?>" alt="">
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
                    <div class="detail">
                        <p>Status: <?php if ($retrieveUser->status == 0) { ?><span class="pending">
                                    Pending
                                </span> <a href="changeStatus.php?id=<?php echo $retrieveUser->id ?>">Change Status</a>
                            <?php } else {
                            ?>
                                <span class="approved">
                                    Approved
                                </span><a href="changeStatus.php?id=<?php echo $retrieveUser->id ?>">Change Status</a>
                            <?php } ?>
                        </p>
                    </div>

                    <div class="detail linkButton">
                        <button style="background: red;" id="deletePopUp"><i class="fa-solid fa-trash"></i> &nbsp;Reject User</button>
                    </div>
                    <div class="deletePop">
                        <div class="deleteFace">
                            <h1>Confirm Rejection</h1>
                            <p>Are you sure you want to reject this user? This action cannot be undone.</p>
                            <button class="cancelPop">Cancel</button>
                            <a class="deleteAccount" href="rejectAccount.php?id=<?php echo $_GET['id'] ?>">Reject</a>
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