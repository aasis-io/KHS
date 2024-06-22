<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

@session_start();

if (array_key_exists('email', $_SESSION) && array_key_exists('email', $_COOKIE)) {
    header('location:view_user.php?id=' . $id);
} else {
    header('location:services.php?err=Login first to view the contact details!');
}
