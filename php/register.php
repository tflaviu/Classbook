<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 25.10.2017
 * Time: 13:30
 */

include_once "auth_function.php";

$db = dbConnect();
$user_name = $_POST['reg_user_name'];
$email = $_POST['reg_email'];
$password = $_POST['reg_password'];
$confirm_password = $_POST['reg_confirm_password'];

register($user_name, $email, $password, $confirm_password);
