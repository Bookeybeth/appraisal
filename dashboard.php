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

        <?php if($_SESSION["is_admin"] && $_SESSION["is_staff"] == false): ?>
            <?php include('components/user-admin.php') ?>
        <?php elseif($_SESSION["is_admin"]==False && $_SESSION["is_staff"]): ?>
            <?php include('components/user-director.php') ?>
        <?php else: ?>
                    <?php include('components/user-null.php') ?>
        <?php endif; ?>
    </body>
</html>