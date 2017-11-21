<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 21.11.2017
 * Time: 13:03
 */

include_once "../php/student_commands.php";
$type = 'api';

$id_student = $_POST['id_student'];
//show_grades($type, $id_student);
show_classes($type, $id_student);