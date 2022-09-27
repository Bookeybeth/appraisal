<?php 
    include('configuration/connect.php');
    include('configuration/session.php'); 

    // clear_session();

    $flashmsg = null;
    $uname_err = null;
    $pwd_err = null;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // $uname=test_input($_POST['username']);
        // $pwd=test_input($_POST['password']);

        isset($_POST['username']) ? (
            !empty($_POST['username']) ? $uname = $_POST['username'] : $uname_err = 'Please enter your username' 
        )  : $uname_err = 'Please enter your username';

        isset($_POST['password']) ? (
            !empty($_POST['password'])? $pwd = $_POST['password'] : $pwd_err = 'Please enter your password'
        )  : $pwd_err = 'Please enter your password';  

        if( !empty($uname) && !empty($pwd)){
            $query = 'SELECT * FROM Users WHERE (username = :uname)';
            $values = [':uname' => $uname];

            try {
                $res = $conn->prepare($query);
                $res->execute($values);
            } catch (PDOException $e) {
                echo 'Query error, please refresh this page', 'warning';
                die();
            }
            
            $user = $res->fetch();

            if (is_array($user)) {
                if (password_verify($pwd, $user['pwd'])) {
                    /* The password is correct. */
                    $_SESSION["user"] = $user;
                    set_user_type($user['id'], $conn);
                    header("Location: dashboard.php");
                    $_SESSION['flash'] = flash('Login successful!', 'primary');
                    exit();
                } else {
                    $flashmsg = flash('invalid user credentials', 'danger');
                }
            } else {
                $flashmsg = flash('invalid user credentials', 'danger');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('components/header.php') ?>
    <body class="bg2">
        <?php include('components/nav.php') ?>
        <?php include('components/flash.php') ?>
        <div class="flex content space-evenly mt-40">
            <div>
                <div class="bg-white card">
                    <div class="card-head">
                        <h2 class="card-title">
                            Login
                        </h2>

                        <?php if(!empty($flashmsg)): ?> 
                            <?php echo $flashmsg; ?>
                        <?php endif; ?>
                    </div>
        
                    <div class="card-content">
                        <form method='post'>
                            <div class="form-control">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder="Enter username" required>
                                <?php if(!empty($uname_err)): ?> 
                                    <p>
                                        <small>
                                            <?php echo $uname_err; ?>
                                        </small>
                                    </p>
                                <?php endif; ?>
                            </div>
        
                            <div class="form-control">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter password" required>
                                <?php if(!empty($pwd_err)): ?> 
                                    <p>
                                        <small>
                                            <?php echo $pwd_err; ?>
                                        </small>
                                    </p>
                                <?php endif; ?>
                            </div>
        
                            <div class="form-control">
                                <input type="submit" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div>
                <div class="bg-white card">
                    <div class="card-head">
                        <h2 class="card-title">
                            Register
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

<!-- php -S localhost:4000 -t ./ -->