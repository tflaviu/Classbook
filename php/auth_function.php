<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 20.11.2017
 * Time: 11:53
 */
include_once "connect.php";

function login($type, $email, $password)
{
    $db = dbConnect();
//    if (!empty($_POST['email1']) && !empty( $_POST['password1'])) {
//        $email = $_POST['email1'];
//        $password = $_POST['password1'];
//    } else {
//        $email = $email_api;
//        $password = $password_api;
//    }
//    $email = $_POST['email1'];
//    $password = $_POST['password1'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Email.......";
    } else {
// Matching user input email and password with stored email and password in database.
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $db->query($sql);
//    $result = mysql_query("SELECT * FROM registration WHERE email='$email' AND password='$password'");
        $data = mysqli_num_rows($result);
        if ($data == 1) {
            session_start();
            $row = $result->fetch_assoc();
            $user_type = $row["user_type"];
            $user_name = $row["user_name"];
            $id_user = $row['id_user'];
            $_SESSION['loggedEmail'] = $email;
            $_SESSION['loggedIn'] = true;
            $_SESSION['user_type'] = $user_type;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['id_user'] = $id_user;
            if ($type == 'web') {
                echo $user_type;
            } else if ($type == 'api') {
                $data = [
                    "loggedEmail" => $_SESSION['loggedEmail'],
                    "loggedIn" => $_SESSION['loggedIn'],
                    "user_type" => $_SESSION['user_type'],
                    "user_name" => $_SESSION['user_name'],
                    "id_user" => $_SESSION['id_user']];
                $respone = ['status' => ['success' => true, 'error' => ''], 'data' => $data];
                echo json_encode($respone);
            }
            exit();
        } else {
            if ($type == 'web') {
                echo "Email or Password is wrong!";
            } else if ($type == 'api') {
                $data = '';
                $respone = ['status' => ['success' => false, 'error' => 'Email or password is wrong'], 'data' => $data];
                echo json_encode($respone);
            }
        }
    }
}

function register($type, $user_name, $email, $password, $confirm_password)
{
    $db = dbConnect();
    if ($password != $confirm_password) {
        if ($type == 'web') {
            echo "Passwords don't match!";
        } else if ($type == 'api') {
            $data = '';
            $respone = ['status' => ['success' => false, 'error' => 'Passwords don\'t match'], 'data' => $data];
            echo json_encode($respone);
        }

        die;
    } else {
        $sql = "INSERT INTO users (user_name, email, password, user_type) VALUES ('$user_name', '$email', '$password', '2')";
        $result = $db->query($sql);

        if ($result) {
            if ($type == 'web') {
                session_start();
                $_SESSION['loggedEmail'] = $email;
                $_SESSION['loggedIn'] = true;
                header("Location: ../pages/student.php");
            } else if ($type == 'api') {
//                $arr = ["logged_email" => $email, "loggedIn" => "true", "success" => "true"];
//                echo json_encode($arr);
                $data = [
                    "loggedEmail" => $email,
                    "loggedIn" => true,
                    ];
                $respone = ['status' => ['success' => true, 'error' => ''], 'data' => $data];
                echo json_encode($respone);
            }

        } else {
            if ($type == 'web') {
                echo "Error";
            } else if ($type == 'api') {
                $data = '';
                $respone = ['status' => ['success' => false, 'error' => ''], 'data' => $data];
                echo json_encode($respone);
            }
        }
    }
}