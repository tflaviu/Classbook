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

//    $sql = "SElECT g.grade, g.date, c.class_name
//            FROM ((grades g
//            INNER JOIN users u ON g.fk_student = u.id_user)
//            INNER JOIN classes c ON g.fk_class = id_class)
//            WHERE fk_student = '$id_student'
//            ORDER BY c.class_name";

    $sql = "SELECT u.user_name, u.email
            FROM ((teacher_department td
            INNER JOIN student_department sd ON td.fk_teacher = sd.fk_user)
            INNER JOIN users u ON sd.fk_user = u.id_user)
            WHERE fk_teacher = '$id_teacher'";

    $result = $db->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<span class=\"grade_span\">"; echo $row['user_name']; echo "</span>";
        echo "<span class=\"grade_span\">"; echo $row['email']; echo "</span>" . "<br>";
//        echo "<span class=\"grade_span\">"; echo $row['date']; echo "</span>" . "</br>";
    }

}