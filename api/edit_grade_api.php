<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 21.11.2017
 * Time: 14:44
 */

include_once "../php/teacher_commands.php";

$type = 'api';
$id_student = $_POST['id_student'];
$new_grade = $_POST['new_grade'];
updateGrade($type, $id_student, $new_grade);