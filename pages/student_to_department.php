<!DOCTYPE html>
<html>
<head>
    <link href="../css/admin.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/header.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/to_department.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anonymous+Pro" rel="stylesheet">
    <link href="../vendors/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../vendors/jquery-3.2.1.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 03.11.2017
 * Time: 12:31
 */

session_start();
if ($_SESSION['loggedIn'] != true) {
    header("Location: ../index.php");
} elseif ($_SESSION['user_type'] == 1) {
    header("Location: teacher.php");
} elseif ($_SESSION['user_type'] == 2) {
    header("Location: student.php");
}

include_once("../php/connect.php");
$db = dbConnect();
?>

<div class="header">
    <div class="logo">
        <span class="unselectable">Classbook</span>
    </div>
    <div class="back">
        <a href="admin.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>
</div>

<div>
    <?php
    $sql = "SELECT id_user, user_name, email FROM users WHERE user_type = '2' AND id_user NOT IN ( SELECT fk_user FROM student_department )";
    $result = $db->query($sql);
    echo "<form action='' method='post'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class=\"student_row\">";
        echo "<span>";
        echo "<input type='checkbox' name=\"checked_student[]\" id=\"checkbox-std\" value=";
        echo $row['id_user'];
        echo "/>";
        echo "</span>";
        echo "<select name=\"select_department[]\">";
        echo "<option value=\"dep\">Department</option>";
        $sql2 = "SELECT * FROM departments";
        $result2 = $db->query($sql2);
        while ($row2 = $result2->fetch_assoc()) {
            echo "<span>";
            echo "<option value=\"";
            echo $row2['id_department'];
            echo "\">";
            echo $row2['department_name'];
            echo "</option>";
            echo "</span>";
        }
        echo "</select>" . ' ';
        echo "<span class='student_span'>" . $row['user_name'] . "</span>" . ' ' . "<span class='email_span'>" . $row['email'] . "</span>";
        echo "</div>";
    }
    if (mysqli_num_rows($result) > 0) {
        echo "<input name = 'stdToDep_submit' type='submit' value='Submit'/>";
    }
    echo "</form>";
    ?>
</div>

<?php
if (isset($_POST['stdToDep_submit'])) {
    if (!isset($_POST['checked_student']) || !isset($_POST['select_department'])) { ?>
        <script>swal("Error!", "Looks like you didn't check a student or department!");</script>
    <?php die();
    } else {
    $student = $_POST['checked_student'];
    $department = $_POST['select_department'];

    $dep_array = array();
    foreach ($department as $key => $n) {
        if ($n != "dep") {
            array_push($dep_array, $n);
        }
    }

    if (count($student) != count($dep_array)) { ?>
        <script>swal("Error!", "Looks like you didn't check a student or department!");</script>
    <?php
    } else {
    foreach ($dep_array as $key => $n) {
    $sql = "INSERT INTO student_department (fk_department, fk_user) VALUES ('$n', '$student[$key]')";
    $result = $db->query($sql);
    if ($result) {
        header("Location: ../pages/student_to_department.php");
    }
    }
    }
    }
}
?>
</body>
</html>








