<?php 
    session_start() ;

    function current_user() {
        if(isset($_SESSION['user'])){
            $id = [ 'id' => $_SESSION['user']['id'] ];
            $query = $conn->prepare('SELECT * FROM Users where id=:id');
            $query->execute($id);
            $me = $query->fetch();
            return $me;
        } else {
            return 'No user exist';
        }
    }

    function set_user_type($id, $conn) {
        $id = [ 'id' => $id ];
        // check admin
        $query = $conn->prepare('SELECT * FROM Admin where user_id=:id');
        $query->execute($id);
        $admin = $query->fetch();

        $query = $conn->prepare('SELECT * FROM Director where user_id=:id');
        $query->execute($id);
        $staff = $query->fetch();

        if (is_array($admin)) {
            $_SESSION["is_admin"] = True;
            $_SESSION["is_staff"] = False;
        } else if(is_array($staff)) {
            $_SESSION["is_admin"] = False;
            $_SESSION["is_staff"] = True;
        } else {
            $_SESSION["is_admin"] = False;
            $_SESSION["is_staff"] = False;
        }
    }

    function unset_session(){
        $_SESSION = array();
        unset($_SESSION['user']);
        unset($_SESSION['is_admin']);
        unset($_SESSION['is_staff']);
    }

    function clear_session(){
        $_SESSION = array();
        unset($_SESSION['user']);
        $_SESSION = array();
        session_destroy();
        echo('session cleared');
    }

    function flash($msg, $color) {
        return '<div class="alert '.$color. '"><p>' .$msg.'</p></div>';
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>