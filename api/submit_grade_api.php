<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 21.11.2017
 * Time: 15:15
 */

include_once "../php/teacher_commands.php";
$type = 'api';
$student = $_POST['student'];
$grade = $_POST['grade'];

submit_grade($type, $student, $grade);