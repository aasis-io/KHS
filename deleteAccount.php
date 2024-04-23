
<?php
$id = $_GET['id'];


session_start();

include('class/user.class.php');
include('class/seeker.class.php');

if ($_SESSION['role'] == 'user') {
  $user = new User();
  $user->set('id', $id);
  $status = $user->delete();
  if ($status == 'success') {
    header('location:index.php?v="Account Deleted Successfully!"');
  } else {
    header('location:account.php?v="Failed To Delete Account!"');
  }
} else {
  $seeker = new Seeker();
  $seeker->set('id', $id);
  $status = $seeker->delete();
  if ($status == 'success') {
    header('location:index.php?v="Account Deleted Successfully!"');
  } else {
    header('location:account.php?v="Failed To Delete Account!"');
  }
}


session_destroy();
setcookie('email', '',  Time() - 60 * 60);
?>