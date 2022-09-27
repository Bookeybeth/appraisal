<?php if(isset($_SESSION['flash'])): ?> 
    <?php echo $_SESSION['flash']; $_SESSION['flash'] = null ?>
<?php endif; ?>

