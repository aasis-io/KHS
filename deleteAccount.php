
<?php
$id = $_GET['id'];

include('class/user.class.php');
$user = new User();
$user->set('id', $id);
$status = $user->delete();
if ($status == 'success') {
  header('location:index.php?v="Account Deleted Successfully!"');
} else {
  header('location:account.php?v="Failed To Delete Account!"');
}
session_start();
session_destroy();
setcookie('email', '',  Time() - 60 * 60);
?>