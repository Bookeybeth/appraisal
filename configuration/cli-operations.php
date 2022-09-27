<?php 
    require('connect.php');
    
    $username = $argv[1];
    $password = $argv[2];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    /* Insert query template. */
    $query = 'INSERT INTO Users (username, pwd, fname, lname) VALUES (:username, :pwd, :fname, :lname)';

    /* Values array for PDO. */
    $values = [':username' => $username, ':pwd' => $hash, ':fname'=>'Admin', ':lname'=>'Admin'];

    $admin_query = 'INSERT INTO Admin (user_id) VALUES (:user)';
    
    try {
        $res = $conn->prepare($query);
        $res->execute($values);

        $user = $conn->lastInsertId();
        
        $value_admin = [':user' => $user];
        $res_adm = $conn->prepare($admin_query);
        $res_adm->execute($value_admin);
        echo "\nadmin successfully created";
    }
    catch (PDOException $e) {
        /* Query error. */
        echo "\nQuery error. " . $e->getMessage();
        // die();
    }
?>