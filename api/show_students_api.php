<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 21.11.2017
 * Time: 13:44
 */
include_once "../php/teacher_commands.php";
$id_teacher = $_POST['id_teacher'];
showStudents($id_teacher);