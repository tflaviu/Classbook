<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
include_once "../php/teacher_commands.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/header.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/home-style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/student.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/admin.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../vendors/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<?php
session_start();
if ($_SESSION['loggedIn'] != true) {
    header("Location: ../index.php");
} elseif ($_SESSION['user_type'] == 0) {
    header("Location: admin.php");
} elseif ($_SESSION['user_type'] == 2) {
    header("Location: student.php");
}

include_once "../php/teacher_commands.php";
?>

<div class="header">
    <div class="logo">
        <span class="unselectable">Classbook</span>
    </div>
    <div class="dropdown">
        <span class="unselectable">Commands</span>
        <div class="dropdown-content">
            <button onclick="location.href = 'teacher.php';" class="addTeacherToDep">Home</button>
            <button onclick="location.href = 'graded_students.php';" class="addTeacherToDep">Graded students
            </button>
            <button onclick="location.href = 'ungraded_students.php';" class="addTeacherToDep">Ungraded students
            </button>
        </div>
    </div>
    <div class="logout">
        <a href="../php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    </div>
</div>
<?php
$array = show_graded_students();
foreach ($array as $key => $n) { ?>
    <div class="student_row">
        <span><?php echo $array[$key][1]; ?></span>
        <span><?php echo $array[$key][2]; ?></span>
        <span><?php echo $array[$key][3]; ?></span>
        <span class="edit"><a href="../php/grade_edit.php?id=<?php echo $array[$key][0]; ?>">Edit</a></span>
        <span class="delete"><a href="../php/grade_delete.php?id=<?php echo $array[$key][0]; ?>">Delete</a></span>
    </div>
<?php }
?>
</body>
</html>