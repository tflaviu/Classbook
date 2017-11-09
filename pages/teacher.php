<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title> <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/header.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/home-style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/student.css" rel="stylesheet" type="text/css" media="all"/>
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
        <div class="logout">
            <a href="../php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
    </div>

    <div class="main">
        <div class="grades_div">
            <?php show_students(); ?>
        </div>
    </div>
</body>
</html>
