<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 20.11.2017
 * Time: 11:53
 */

function login($type, $email_api, $password_api)
{
    include_once "connect.php";

    $db = dbConnect();

    if (!empty($_POST['email1']) && !empty( $_POST['password1'])) {
        $email = $_POST['email1'];
        $password = $_POST['password1'];
    } else {
        $email = $email_api;
        $password = $password_api;
    }
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
                $session_array = [
                    "loggedEmail"=>$_SESSION['loggedEmail'],
                    "loggedIn" => $_SESSION['loggedIn'],
                    "user_type" => $_SESSION['user_type'],
                    "user_name" => $_SESSION['user_name'],
                    "id_user" => $_SESSION['id_user']];
                echo json_encode($session_array);
            }
            exit();
        } else {
            echo "Email or Password is wrong!";
        }
    }
}