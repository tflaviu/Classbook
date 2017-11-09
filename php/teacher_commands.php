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
//    AND id_user NOT IN ( SELECT fk_user FROM student_department )

    $result = $db->query($sql);
    $students_array = array();
    while ($row = $result->fetch_assoc()) {
        array_push($students_array, $row['id_user']);
    }
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

    foreach ($grade_array as $key => $n) {
        $sql = "INSERT INTO grades (fk_student, grade) VALUES ('$student[$key]', '$n')";
        $result = $db->query($sql);
        if ($result) {
            echo "Success";
        }
    }
}