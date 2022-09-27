<?php
    require('configuration/brand.php');
    // $_SESSION["user_type"];
?>

<div class="navbar flex space-btw align-vertical">
    <div class="brand">
        <h1><?php echo $brand ?></h1>
    </div>
    
    <?php if (isset($_SESSION['user'])): ?>
    <div class="links">
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <?php endif; ?>
    
</div>    