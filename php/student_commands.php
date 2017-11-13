<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 07.11.2017
 * Time: 12:43
 */

include_once "../php/connect.php";

function show_grades()
{
    $db = dbConnect();
    $id_student = $_SESSION['id_user'];
    $sql = "SElECT g.grade, g.date, c.class_name 
            FROM ((grades g 
            INNER JOIN users u ON g.fk_student = u.id_user)
            INNER JOIN classes c ON g.fk_class = id_class)
            WHERE fk_student = '$id_student'
            ORDER BY c.class_name";
    $result = $db->query($sql);
//    echo "<div class=\"student_row\">
//            <span class=\"grade_span\">Class</span>
//            <span class=\"grade_span\">Grade</span>
//            <span class=\"grade_span\">Date</span>
//        </div>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class=\"student_row\"";
        echo "<span class=\"grade_span\">";
        echo $row['class_name'];
        echo "</span>";
        echo "<span class=\"grade_span second_span\">";
        echo $row['grade'];
        echo "</span>";
        echo "<span class=\"grade_span\">";
        echo $row['date'];
        echo "</span>";
        echo "</div>";
    }
}