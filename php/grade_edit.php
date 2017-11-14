<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title> <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/header.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/home-style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/student.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/admin.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../vendors/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<?php
include_once "../php/teacher_commands.php";
?>
<div class="header">
    <div class="logo">
        <span class="unselectable">Classbook</span>
    </div>
    <div class="dropdown">
        <span class="unselectable">Commands</span>
        <div class="dropdown-content">
            <button onclick="location.href = '../pages/teacher.php';" class="addTeacherToDep">Home</button>
            <button onclick="location.href = '../pages/ungraded_students.php';" class="addTeacherToDep">Ungraded students</button>
        </div>
    </div>
    <div class="logout">
        <a href="../php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    </div>
</div>
<div class="main">
    <form method="post">
        <div class="student_row">
            <span><?php echo showStudentDetails($_GET['id'])[0]; ?></span>
            <span><?php echo showStudentDetails($_GET['id'])[1]; ?></span>
            <input type="number" name="newGrade" min="1" max="10"
                   value="<?php echo showStudentDetails($_GET['id'])[2] ?>"/>
            <input type="submit" name="update_grade" placeholder="Submit"/>
        </div>
    </form>
</div>
<?php
if (isset($_POST['update_grade'])) {
    updateGrade($_GET['id'], $_POST['newGrade']);
}

?>
</body>
</html>