<?php
include('class/user.class.php');
include('class/area.class.php');
include('class/profession.class.php');
include('class/rating.class.php');


session_start();

$area = new Area();
$areaList = $area->retrieve();

$profession = new Profession();
$professionList = $profession->retrieve();

$user = new User();
$userList = $user->retrieve();

$rating = new Rating();


// $rating = new Rating();

// Filter the user list based on selected options
if (isset($_POST['filterArea']) || isset($_POST['occupation'])) {
    $filteredUsers = array_filter($userList, function ($user) {
        return ($_POST['filterArea'] == '' || $user['area'] == $_POST['filterArea']) &&
            ($_POST['occupation'] == '' || $user['occupation'] == $_POST['occupation']);
    });
} else {
    $filteredUsers = 1;
}



// Output the filtered user data as HTML
// foreach ($filteredUsers as $key => $u) {
//     echo '<tr>';
//     echo '<td>' . ($key + 1) . '</td>';
//     echo '<td>' . $u['fullname'] . '</td>';
//     echo '<td>' . $u['area'] . '</td>';
//     echo '<td>' . $u['occupation'] . '</td>';
//     echo '<td>' . $u['phone'] . '</td>';
//     echo '</tr>';
// }

if (empty($filteredUsers)) {
    echo "<tr><td colspan='6' style='text-align: center;'>No users found.</td></tr>"; // Display "No users found" message
} else {
    foreach ($filteredUsers as $key => $u) {
        // Assuming you have a function or method to count the reviews for a user
        $reviewCount = $rating->countReviewsForUser($u['id']);
        $averageRating = $rating->getAverageRatingOfUser($u['id']);


        echo "<tr>";
        echo "<td>" . ($key + 1) . "</td>";
        echo "<td class='img-name'><img src='images/" . $u['image'] . "' alt=''> <a href='view_user.php?id=" . $u['id'] . "'>" . $u['fullname'] . " </a> </td>";
        echo "<td>" . $u['area'] . "</td>";
        echo "<td>" . $u['occupation'] . "</td>";
        echo "<td>" . $u['phone'] . "</td>";

        if ($reviewCount > 0) {
            echo "<td>" . round($averageRating, 1) . " <i class='bx bxs-star'></i> • <a href='view_user.php?id=" . $u['id'] . "'>" . $reviewCount . " Reviews </a></td>";
        }
        else{
            echo "<td> Not reviewed yet </td>";
        }
        echo "</tr>";
    }
}
