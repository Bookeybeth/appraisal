<?php
    require('variable.php');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        // sql to create table
        $users = "CREATE TABLE Users (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30),
            lastname VARCHAR(30),
            email VARCHAR(50),
            pword VARCHAR(255) NOT NULL,
            username VARCHAR(50) NOT NULL,
            tstamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
        )";

        $admin = "CREATE TABLE AdminUser (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(10)
        )";

        $director = "CREATE TABLE Director (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(10)
        )";

        $appraisal = "CREATE TABLE Appraisal (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(30),
            content VARCHAR(30),
            tstamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        $userappraisal = "CREATE TABLE UserAppraisal (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            approval BOOLEAN,
            dapproval BOOLEAN,
            tstamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            user_id INT(10),
            appraisal_id INT(10)
        )";

        $ratings = "CREATE TABLE Ratings (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            irating INT(10),
            arating INT(10),
            dirating INT(10),
            darating INT(10),
            userappraisal_int INT(10)
        )";
        
        // use exec() because no results are returned
        $conn->exec($users);
        $conn->exec($admin);
        $conn->exec($director);
        $conn->exec($appraisal);
        $conn->exec($userappraisal);
        $conn->exec($ratings);
        echo "Table MyGuests created successfully";
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
      
      $conn = null;