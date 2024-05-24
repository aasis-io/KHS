<?php

include('../class/user.class.php');

$id = $_GET['id'];
session_start();
$user = new User();
$user->set('id', $id);

$retrieveUser = $user->getById();

if ($retrieveUser->status == 0) {
    $user->activeStatus();
}
else{
    $user->pendingStatus();

}