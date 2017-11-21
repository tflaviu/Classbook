<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 08.11.2017
 * Time: 15:40
 */

function check_teacher_class()
{
    include_once "../php/connect.php";
    $db = dbConnect();
    $id_teacher = $_SESSION['id_user'];
    $class_sql = "SELECT c.id_class
                  FROM ( classes c
                  INNER JOIN teacher_department td ON c.fk_teacher = td.fk_teacher)
                  WHERE c.fk_teacher = '$id_teacher'";

    $class_result = $db->query($class_sql);
    $class_row = $class_result->fetch_assoc();
    $class = $class_row['id_class'];

    return $class;
}

function show_graded_students()
{
    include_once "../php/connect.php";
    $db = dbConnect();
    $class = check_teacher_class();

    $gradedStudent_sql = "SELECT g.id_grade, g.grade, u.id_user, u.user_name, u.email
                          FROM (grades g
                          INNER JOIN users u ON g.fk_student = u.id_user)
                          WHERE fk_class = '$class'";
    $gradedStudent_result = $db->query($gradedStudent_sql);

    $students = array();
    $gradedStudent_array = array();
    while ($row = $gradedStudent_result->fetch_assoc()) {
        array_push($gradedStudent_array, array($row['id_user'], $row['user_name'], $row['email'], $row['grade']));
    }

    return $gradedStudent_array;
}

function show_students()
{
    include_once "../php/connect.php";

    $db = dbConnect();
    $id_teacher = $_SESSION['id_user'];
    $class = check_teacher_class();
    $gradedStudent_sql = "SELECT * FROM grades WHERE fk_class = '$class'";
    $gradedStudent_result = $db->query($gradedStudent_sql);

    $gradedStudent_array = array();
    while ($row = $gradedStudent_result->fetch_assoc()) {
        array_push($gradedStudent_array, $row['fk_student']);
    }

    $sql = "SELECT u.id_user, u.user_name, u.email
            FROM ((teacher_department td
            INNER JOIN student_department sd ON td.fk_department = sd.fk_department)
            INNER JOIN users u ON sd.fk_user = u.id_user)
            WHERE fk_teacher = '$id_teacher'";

    $result = $db->query($sql);

    $all_students = array();
    while ($row = $result->fetch_assoc()) {
        array_push($all_students, array($row['id_user'], $row['user_name'], $row['email']));
    }

    $ungradedStudents = array();
    foreach ($all_students as $key => $n) {
        $value = $all_students[$key][0];
        if (!in_array($value, $gradedStudent_array)) {
            array_push($ungradedStudents, $all_students[$key]);
        }
    }

    echo "<form action='' method='post'>";
    $i = 0;
    while ($i < count($ungradedStudents)) {
        echo "<div class='student_row'>";
        echo "<input type='checkbox' name=\"student[]\" value=";
        echo $ungradedStudents[$i][0];
        echo "/>" . ' ';
        echo "<input name = 'grade_input[]' step=0.1 type='number' placeholder='Grade' min='1' max='10'/>" . ' ';
        echo $ungradedStudents[$i][1] . ' ';
        echo $ungradedStudents[$i][2] . ' ';
        echo "</div>";
        $i++;
    }
    if (count($ungradedStudents) > 0) {
        echo "<input id='test' name = 'grade_submit' type='submit' value='Submit'/>";
    }
    echo "</form>";

}

if (isset($_POST['grade_submit'])) {
    include_once "../php/connect.php";

    $db = dbConnect();
    if (!isset($_POST['student']) && !isset($_POST['grade'])) { ?>
        <script>
            swal("Error!", "Looks like you didn't check a student or grade!");
        </script>
        <?php
    } else {
        $student = $_POST['student'];
        $grade = $_POST['grade_input'];

        $grade_array = array();
        foreach ($grade as $key => $n) {
            if ($n != "") {
                array_push($grade_array, $n);
            }
        }

        if (count($grade_array) < count($student)) { ?>
            <script>
                swal("Error!", "Looks like you didn't check a student or grade!");
            </script>
        <?php } else if (count($grade_array) > count($student)) { ?>
            <script>
                swal("Error!", "Looks like you didn't check a student or grade!");
            </script>
        <?php } else {

            $class = check_teacher_class();

            foreach ($grade_array as $key => $n) {
                $sql = "INSERT INTO grades (fk_student, grade, fk_class) VALUES ('$student[$key]', '$n', '$class')";
                $result = $db->query($sql);
                if ($result) {
                    $data = 1;
                }
            }
        }
    }
}

function updateGrade($type, $id_user, $new_grade)
{
    include_once "../php/connect.php";
    $db = dbConnect();
    $sql = "UPDATE grades
            SET grade='$new_grade'
            WHERE fk_student = '$id_user'";
    $result = $db->query($sql);
    if ($result) {
        header("Location: ../php/grade_edit.php?id=$id_user");
    } else {
        echo "Error";
    }
}

function showStudentDetails($id_user)
{
    include_once "../php/connect.php";
    $db = dbConnect();

    $sql = "SELECT u.id_user, u.user_name, u.email, g.grade
            FROM (users u
            INNER JOIN grades g ON u.id_user = g.fk_student)
            WHERE id_user='$id_user'";

    $result = $db->query($sql);

    $row = $result->fetch_assoc();

    $student_name = $row['user_name'];
    $email = $row['email'];
    $grade = $row['grade'];

    return array($student_name, $email, $grade);
}

function deleteGrade($id_user)
{
    include_once "connect.php";
    $db = dbConnect();
    $sql = "DELETE FROM grades WHERE fk_student = '$id_user'";
    $result = $db->query($sql);

    if ($result) {
        header("Location: ../pages/graded_students.php");
    } else { ?>
        <script>
            swal("Error!", "Something went wrong!");
        </script>
    <?php }
}

function showStudents($id_teacher)
{
    include_once "connect.php";
    $db = dbConnect();

    $sql = "SELECT u.id_user, u.user_name, u.email
                          FROM ((teacher_department td
                          INNER JOIN student_department sd ON td.fk_department = sd.fk_department)
                          INNER JOIN users u ON sd.fk_user = u.id_user)
                          WHERE fk_teacher = '$id_teacher'";

    $result = $db->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $arr = [];
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $arr[$i] = [
                "id_user" => $row['id_user'],
                "user_name" => $row['user_name'],
                "email" => $row['email']];
            $i++;
        }
        echo json_encode($arr);
    } else {
        echo "No classes found!";
    }

}