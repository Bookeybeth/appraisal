<?php
    include('configuration/session.php');
    unset_session();
    header("Location: index.php");
    $_SESSION['flash'] = flash('Logout successful', 'primary');
    exit();
?>