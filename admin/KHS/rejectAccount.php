<?php

include('../../class/user.class.php');

$id = $_GET['id'];
session_start();
$user = new User();
$user->set('id', $id);

$retrieveUser = $user->getById();

$status = $user->rejectAccount();
if ($status == 'success') {
    header('location:allUser.php?v="Account Rejected Successfully!"');
  } else {
    header('location:editStatus.php?v="Failed To Delete Account!"');
  }