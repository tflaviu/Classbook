<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 02.11.2017
 * Time: 14:23
 */
include_once "connect.php";
$db = dbConnect();

if(isset($_POST['teacher_submit'])) {
    $name = $_POST['teacher_name'];
    $email = $_POST['teacher_email'];
    $password = $_POST['teacher_password'];

    $sql = "INSERT INTO users (user_name, email, password, user_type) VALUES ('$name', '$email', '$password', 1)";
    $result = $db->query($sql);
    if ($result) {
        header("Location: ../pages/admin.php");
    }
} elseif (isset($_POST['department_submit'])) {
    $department = $_POST['department'];

    $sql = "INSERT INTO departments (department_name) VALUES ('$department')";

    $result = $db->query($sql);
    if ($result) {
        header("Location: ../pages/admin.php");
    }
} elseif (isset($_POST['class_submit'])) {
    $class = $_POST['class'];
    $sql = "INSERT INTO classes (class_name) VALUES ('$class')";
    $result = $db->query($sql);

    if ($result) {
        header("Location: ../pages/admin.php");
    }

}  elseif (isset($_POST['student_submit'])) {
    $name = $_POST['student_name'];
    $email = $_POST['student_email'];
    $password = $_POST['student_password'];

    $sql = "INSERT INTO users (user_name, email, password, user_type) VALUES ('$name', '$email', '$password', 2)";
    $result = $db->query($sql);
    if ($result) {
        header("Location: ../pages/admin.php");
    }
} elseif (isset($_POST['administrator_submit'])) {
    $name = $_POST['administrator_name'];
    $email = $_POST['administrator_email'];
    $password = $_POST['administrator_password'];

    $sql = "INSERT INTO users (user_name, email, password, user_type) VALUES ('$name', '$email', '$password', 0)";
    $result = $db->query($sql);
    if ($result) {
        header("Location: ../pages/admin.php");
    } else {
        echo "Error";
    }
}