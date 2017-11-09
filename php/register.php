<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 25.10.2017
 * Time: 13:30
 */

include_once "connect.php";

    $db = dbConnect();
    $user_name = $_POST['reg_user_name'];
    $email = $_POST['reg_email'];
    $password = $_POST['reg_password'];
    $confirm_password = $_POST['reg_confirm_password'];

    if ($password != $confirm_password) {
        echo "Passwords don't match!";
        die;
    }  else{
        $sql = "INSERT INTO users (user_name, email, password, user_type) VALUES ('$user_name', '$email', '$password', '2')";
        $result = $db->query($sql);

        if ($result) {
            session_start();
            $_SESSION['loggedEmail'] = $email;
            $_SESSION['loggedIn'] = true;
            header("Location: ../pages/student.php");
        } else {
            echo "Error";
        }
    }

