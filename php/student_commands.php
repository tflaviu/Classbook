<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 07.11.2017
 * Time: 12:43
 */

include_once "../php/connect.php";

function show_grades($type, $id_student)
{
    $db = dbConnect();
//    $id_student = $_SESSION['id_user'];
    $sql = "SElECT g.grade, g.date, c.class_name 
            FROM ((grades g 
            INNER JOIN users u ON g.fk_student = u.id_user)
            INNER JOIN classes c ON g.fk_class = id_class)
            WHERE fk_student = '$id_student'
            ORDER BY c.class_name";
    $result = $db->query($sql);

    if ($type == 'web') {
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
    } else if ($type = 'api') {
        $data = [];
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $data[$i] = ["class_name" => $row['class_name'], "grade" => $row['grade']];
            $i++;
        }
        $respone = ['status' => ['success' => true, 'error' => ''], 'data' => $data];
        echo json_encode($respone);
    }
}

function show_classes($type, $id_student)
{
    $db = dbConnect();
    $sql = "SElECT c.class_name 
            FROM ((grades g 
            INNER JOIN users u ON g.fk_student = u.id_user)
            INNER JOIN classes c ON g.fk_class = id_class)
            WHERE fk_student = '$id_student'
            ORDER BY c.class_name";

    $result = $db->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $data = [];
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $data[$i] = ["class" => $row['class_name']];
            $i++;
        }
        $response = ['status' => ['success' => true, 'error' => ''], 'data' => $data];
        echo json_encode($response);
    } else {
        $data = ["message" => "No classes found!"];
        $response = ['status' => ['success' => true, 'error' => ''], 'data' => $data];
        echo json_encode($response);
    }
}