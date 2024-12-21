<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

unset($_SESSION['authorized']);
$_SESSION = [];
session_destroy();
header("Location: authorize.php");