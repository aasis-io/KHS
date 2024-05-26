<?php
@session_start();
if ((!array_key_exists('username', $_SESSION) && array_key_exists('username', $_COOKIE)) || empty($_COOKIE) || empty($_SESSION)) {
    header('location:../index.php');
}
?>