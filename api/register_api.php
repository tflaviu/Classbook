<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 20.11.2017
 * Time: 13:20
 */

include_once "../php/auth_function.php";

$type = 'api';
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

register($type, $user_name, $email, $password, $confirm_password);