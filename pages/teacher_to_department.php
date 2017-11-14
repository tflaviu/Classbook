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
</head>
<body>

<?php
session_start();
if ($_SESSION['loggedIn'] != true) {
    header("Location: ../index.php");
} elseif ($_SESSION['user_type'] == 1) {
    header("Location: teacher.php");
} elseif ($_SESSION['user_type'] == 2) {
    header("Location: student.php");
}
?>
<div class="header">
    <div class="logo">
        <span class="unselectable">Classbook</span>
    </div>
    <div class="back">
        <a href="admin.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>
</div>

<div class="test">
    <?php
    include_once("../php/connect.php");
    $db = dbConnect();

    $sql = "SELECT id_user, user_name, email FROM users WHERE user_type = '1' AND id_user NOT IN ( SELECT fk_teacher FROM teacher_department )";
    $result = $db->query($sql);
    echo "<form action='../php/admin_actions.php' method='post'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class=\"teacher_row\">";
        echo "<input type='checkbox' name=\"checked_teacher[]\" value=";
        echo $row['id_user'];
        echo "/>
            <select name=\"select_department[]\">";
        echo "<option value=\"dep\">Department</option>";
        $sql2 = "SELECT * FROM departments";
        $result2 = $db->query($sql2);
        while ($row2 = $result2->fetch_assoc()) {
            echo "<option value=\"";
            echo $row2['id_department'];
            echo "\">";
            echo $row2['department_name'];
            echo "</option>";
        }
        echo "</select>" . ' ';
        echo "<span class='teacher_span'>" . $row['user_name'] . "</span>" . ' ' . "<span class='email_span'>" . $row['email'] . "</span>" . "<br>";
        echo "</div>";
    }
    if (mysqli_num_rows($result) > 0) {
        echo "<input name = 'teacherToDep_submit' type='submit' value='Submit'/>";
    }

    echo "</form>";

    if (isset($_SESSION['error2'])) {
        echo "<div>"; echo $_SESSION['error2']; echo "</div>";
    }
    ?>
</div>
</body>
</html>
