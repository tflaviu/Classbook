<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 25.10.2017
 * Time: 12:46
 */

$type = "web";
include_once("auth_function.php");
if (!empty($_POST['email1']) && !empty( $_POST['password1'])) {
    $email = $_POST['email1'];
    $password = $_POST['password1'];
}
login($type, $email, $password);

?>


