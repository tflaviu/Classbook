<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 18.11.2017
 * Time: 23:16
 */
include_once "../php/login_function.php";
$type = 'api';
//$user = "student@student.ro";
//$password = "Student123";
$user = $_POST['email'];
$password = $_POST['password'];
login($type, $user, $password);