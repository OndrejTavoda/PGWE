<?php
session_start();
//require 'database/executioner.php';
//require 'model/user.php';
class userController {

    public static function isUserValid($username, $password) {
        //not yet implemented

    }
    public static function register($username,$password) {
        echo $username;
        echo $password;
        $executioner = new Executioner();
        $role = "Admin";
        $stmt = $executioner->establishConnection();
        $stmt = $stmt->prepare('INSERT INTO user (user_type, username, password) VALUES (?,?,?)');

        $stmt->bind_param("sss",$role, $username, $password);
        $return = $stmt->execute();
        $stmt->close();
        echo $return;
    }
    public static function isLoginValid($username, $password) {
        $pass = false;
        echo $username;
        echo $password;
        
        $executioner = new Executioner();
       
        $stmt = $executioner->establishConnection();
        $stmt = $stmt->prepare('SELECT username, password, id from USER WHERE username = ?');
        //echo $stmt->error;
        $stmt->bind_param('s', $username);
        //echo $stmt->error;
        $return = $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $user = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        print_r($user);
        if ($user[0]['username'] == $username && password_verify($password,$user[0]['password'])) {
            $_SESSION['user'] = $username;
            $_SESSION['userID'] = $user[0]['id'];
            $pass = true;
            echo "Success!";
        }

        return $pass;
    

    }

}
