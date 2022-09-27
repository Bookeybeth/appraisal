<?php 
       require('configuration/brand.php'); 
       require('components/flash.php');
       include('configuration/session.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('components/header.php') ?>
<body class="bg2">
    <?php include('components/nav.php') ?>
    <div class="flex content space-evenly mt-40">

        <div>
            <div class="bg-white card">
                <div class="card-head">
                    <h2 class="card-title">
                        Register a director
                    </h2>
                </div>
    
                <div class="card-content">
                    <form action="">
                        <div class="form-control">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" placeholder="Enter your firstname" required>
                        </div>
    
                        <div class="form-control">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" placeholder="Enter your lastname" required>
                        </div>
    
                        <div class="form-control">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter email" required>
                        </div>
    
                        <div class="form-control">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Enter username" required>
                        </div>
    
                        <div class="form-control">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter password" required>
                        </div>
    
                        <div class="form-control">
                            <input type="submit" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>