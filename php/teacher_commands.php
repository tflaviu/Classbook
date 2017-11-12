<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 08.11.2017
 * Time: 15:40
 */

function show_students() {
    include_once "../php/connect.php";

    $db = dbConnect();
    $id_teacher = $_SESSION['id_user'];

    $sql = "SELECT u.id_user, u.user_name, u.email
            FROM ((teacher_department td
            INNER JOIN student_department sd ON td.fk_department = sd.fk_department)
            INNER JOIN users u ON sd.fk_user = u.id_user)
            WHERE fk_teacher = '$id_teacher'";

    $result = $db->query($sql);

    echo "<form action='' method='post'>";
    while ($row = $result->fetch_assoc()) {
        echo "<input type='checkbox' name=\"student[]\" value="; echo $row['id_user']; echo "/>";
        echo "<span class=\"grade_span\">"; echo $row['user_name']; echo "</span>";
        echo "<span class=\"grade_span\">"; echo $row['email']; echo "</span>";
        echo "<input name = 'grade_input[]' step=0.1 type='number' placeholder='Grade' min='0' max='10'/>" . "<br>";
//        echo "<span class=\"grade_span\">"; echo $row['class_name']; echo "</span>" . "</br>";
    }
    echo "<input name = 'grade_submit' type='submit' value='Submit'/>";
    echo "</form>";
}

if (isset($_POST['grade_submit'])) {
    include_once "../php/connect.php";

    $db = dbConnect();
    $student = $_POST['student'];
    $grade = $_POST['grade_input'];

    print_r($student);
    echo "<br>";
    print_r($grade);
    $grade_array = array();
    foreach ($grade as $key => $n) {
        if ($n != "") {
            array_push($grade_array, $n);
        }
    }

    //selecteaza clasa profesorului logat
    $class_sql = "SELECT c.id_class
                  FROM ( classes c
                  INNER JOIN teacher_department td ON c.fk_teacher = td.fk_teacher)";

    $class_result = $db->query($class_sql);
    $class_row = $class_result -> fetch_assoc();
    $class = $class_row['id_class'];

//    cauta studentii care au note la materia aceasta
//    $gradedStudents_sql = "SELECT fk_student
//             FROM grades
//             WHERE fk_class = 2;";

    $gradedStudents_result = $db->query($gradedStudents_sql);
    $gradedStudents_array = array();
    while ($row = $gradedStudents_result -> fetch_assoc()) {
        array_push($gradedStudents_array, $row['fk_student']);
    }

    foreach ($grade_array as $key => $n) {
        $sql = "INSERT INTO grades (fk_student, grade, fk_class) VALUES ('$student[$key]', '$n', '$class')";
        $result = $db->query($sql);
        if ($result) {
            echo "Success";
        }
    }
}

include_once '../php/connect.php';
$db = dbConnect();

$test_sql = "SELECT fk_student 
             FROM grades 
             WHERE fk_class != 2;";

$test_result = $db->query($test_sql);

while ($row = $test_result -> fetch_assoc()) {
    echo $row['fk_student'];
}
//
////cauta studentii care au note la materia aceasta
//$gradedStudents_sql = "SELECT fk_student
//             FROM grades
//             WHERE fk_class = 2;";
//
//$gradedStudents_result = $db->query($gradedStudents_sql);
//$gradedStudents_array = array();
//while ($row = $gradedStudents_result -> fetch_assoc()) {
//    array_push($gradedStudents_array, $row['fk_student']);
//}
//
////cauta studentii fara nota
//$ungradedStudents_array = array();
//
//foreach ($student as $key => $n) {
//    foreach ($gradedStudents_array as $key2 => $n2) {
//        if ($student[$key] != $gradedStudents_array[$key2]) {
//            array_push($ungradedStudents_array, $student['$key']);
//        }
//    }