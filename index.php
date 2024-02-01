<?php

if (isset($_GET['v'])) {
    $msg = $_GET['v'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>


    <?php if (isset($msg)) { ?>
        <div class="alert-container" id="alertContainer">
            <div class="alert alert-success"><?php echo $msg;  ?> <button class="alertTerminator" onclick="alertCloser()"><i class="bx bx-x"></i></button> </div>
        </div> <?php  } ?>


    <a href="register.php">Hello! Let's go back.</a>

    <script src="js/script.js"></script>
    <script>
        var alertContainer = document.getElementById("alertContainer");

        setTimeout(function() {
            alertContainer.style.opacity = "0";
        }, 5000);
        setTimeout(function() {
            alertContainer.style.display = "none";
        }, 6000);
    </script>
</body>

</html>