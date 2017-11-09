<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 25.10.2017
 * Time: 12:46
 */

include_once "connect.php";

$db = dbConnect();

$email=$_POST['email1'];
$password=$_POST['password1'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Invalid Email.......";
}else{
// Matching user input email and password with stored email and password in database.
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result= $db->query($sql);
//    $result = mysql_query("SELECT * FROM registration WHERE email='$email' AND password='$password'");
    $data = mysqli_num_rows($result);
    if($data==1){
        echo "Successfully Logged in";
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
        if ($user_type == 0) {
            header("Location: ../pages/admin.php");
        } elseif ($user_type == 1) {
            header("Location: ../pages/teacher.php");
        } else {
            header("location: ../pages/student.php");
        }
    }else{
        echo "Email or Password is wrong!";
    }
}
?>


