<?php
include('../class/user.class.php');
include('../class/area.class.php');
include('../class/profession.class.php');
include('../class/rating.class.php');


if (isset($_GET['v'])) {
    $msg = $_GET['v'];
}

session_start();

$user = new User();
$userList = $user->retrievePending();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Table</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/common.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php if (isset($msg)) { ?>
        <div class="alert-container" id="alertContainer">
            <div class="alert alert-success"><?php echo $msg;  ?> <button class="alertTerminator" id="closeAlerts"><i class="bx bx-x"></i></button> </div>
        </div>
    <?php } ?>
    <div class="table-container">
        <h2>Pending Approvals</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($userList as $key => $u) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $u['fullname']; ?></td>
                        <td><?php echo $u['email']; ?></td>
                        <td><?php echo $u['phone']; ?></td>
                        <td class="action"><a href="editStatus.php?id=<?php echo $u['id'] ?>" class="e-user"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            <a href="editStatus.php?id=<?php echo $u['id'] ?>" class="d-user"><i class="fa-solid fa-trash"></i> Reject</a>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>

        <div class="redirectLinks">
            <a href="allUser.php">View All Users <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <a href="../index.php">Go to site home page <i class="fa-solid fa-up-right-from-square"></i></a>
        </div>

    </div>

    <script src="../js/script.js"></script>
    <script src="https://kit.fontawesome.com/1f2d50e34f.js" crossorigin="anonymous"></script>
</body>

</html>