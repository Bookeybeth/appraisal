<?php
    include('configuration/connect.php');
    include('configuration/session.php');

    // clear_session();

    if (!isset($_SESSION["user"])) {
        header("Location: index.php");
        $_SESSION['flash'] = flash('Please login is required', 'warning');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('components/header.php') ?>
    <body class="bg2">
        <?php include('components/nav.php') ?>
        <?php include('components/flash.php') ?>
        
    </body>
</html>