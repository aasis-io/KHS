<?php
include('class/user.class.php');
include('class/area.class.php');
include('class/profession.class.php');

session_start();

$area = new Area();
$areaList = $area->retrieve();

$profession = new Profession();
$professionList = $profession->retrieve();

$user = new User();
$userList = $user->retrieve();

// Filter the user list based on selected options
if (isset($_POST['filterArea']) || isset($_POST['occupation'])) {
    $filteredUsers = array_filter($userList, function ($user) {
        return ($_POST['filterArea'] == '' || $user['area'] == $_POST['filterArea']) &&
            ($_POST['occupation'] == '' || $user['occupation'] == $_POST['occupation']);
    });
   }
// else {
//     // If no filter options are selected, set $filteredUsers to NULL
//     $filteredUsers = NULL;
// }


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
    echo "<tr><td colspan='5' style='text-align: center;'>No users found.</td></tr>"; // Display "No users found" message
} else {
    foreach ($filteredUsers as $key => $u) {
        echo "<tr>";
        echo "<td>" . ($key + 1) . "</td>";
        echo "<td>" . $u['fullname'] . "</td>";
        echo "<td>" . $u['area'] . "</td>";
        echo "<td>" . $u['occupation'] . "</td>";
        echo "<td>" . $u['phone'] . "</td>";
        echo "</tr>";
    }
}
