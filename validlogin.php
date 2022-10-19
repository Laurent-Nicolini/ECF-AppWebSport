<?php
if (!isset($_SESSION['role'])){
    header('Location:login.php');
    exit();
}
if ($_SESSION['role'] == 0 && isset($_SESSION['usersid'])){
    $usersid = $_SESSION['usersid'];
    header("Location: partenaire.php?users_id=$usersid");
    exit();
} elseif ($_SESSION['role'] == 0 && !isset($_SESSION['usersid'])) {
    session_destroy();
    header("location:login.php");
    exit();
}
?>