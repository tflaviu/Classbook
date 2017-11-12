<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <link href="../css/admin.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/header.css" rel="stylesheet" type="text/css" media="all"/>
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

    include_once "../php/connect.php";
?>
    <div class="header">
        <div class="logo">
            <span class="unselectable">Classbook</span>
        </div>
        <div class="dropdown">
            <span class="unselectable">Commands</span>
            <div class="dropdown-content">
                <button class="addTeacher" id="addTeacher">Add Teacher</button>
                <button class="addStudent" id="addStudent">Add Student</button>
                <button class="addAdministrator" id="addAdministrator">Add Admin</button>
                <button class="addDepartment" id="addDepartment">Add Department</button>
                <button class="addClass" id="addClass">Add Class</button>
                <button onclick="location.href = 'student_to_department.php';" class="addTeacherToDep">Add student to department</button>
                <button onclick="location.href = 'teacher_to_department.php';" class="addTeacherToDep">Add teacher to department</button>
            </div>
        </div>
        <div class="logout">
            <a href="../php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
    </div>

    <div class="main">
        <?php echo "<h2 class='welcome_text'>" . "Welcome " . $_SESSION['user_name'] . "</h2>"; ?>
        <div id="teacherForm" class="adminForm form-w3-agile" style="display:none;" >
            <h2>Teacher</h2>
            <form id="register-form" action="../php/admin_actions.php" method="post">
                <div class="form-sub-w3">
                    <input name="teacher_name" placeholder="Name" type="text" required="">
                    <div class="icon-agile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3">
                    <input name="teacher_email" placeholder="Email" class="mail" type="email" required="">
                    <div class="icon-agile">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3">
                    <input id="password" name="teacher_password" placeholder="Password" passwordCheck="passwordCheck"
                           type="password" required="">
                    <div class="icon-agile">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="submit-w3l">
                    <input name="teacher_submit" type="submit" value="Add teacher">
                </div>
            </form>
        </div>

        <div id="studentForm" class="adminForm form-w3-agile" style="display:none;" >
            <h2>Student</h2>
            <form id="register-form" action="../php/admin_actions.php" method="post">
                <div class="form-sub-w3">
                    <input name="student_name" placeholder="Name" type="text" required="">
                    <div class="icon-agile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3">
                    <input name="student_email" placeholder="Email" class="mail" type="email" required="">
                    <div class="icon-agile">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3">
                    <input id="password" name="student_password" placeholder="Password" passwordCheck="passwordCheck"
                           type="password" required="">
                    <div class="icon-agile">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="submit-w3l">
                    <input name="student_submit" type="submit" value="Add student">
                </div>
            </form>
        </div>

        <div id="administratorForm" class="adminForm form-w3-agile" style="display:none;" >
            <h2>Administrator</h2>
            <form id="register-form" action="../php/admin_actions.php" method="post">
                <div class="form-sub-w3">
                    <input name="administrator_name" placeholder="Name" type="text" required="">
                    <div class="icon-agile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3">
                    <input name="administrator_email" placeholder="Email" class="mail" type="email" required="">
                    <div class="icon-agile">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3">
                    <input id="password" name="administrator_password" placeholder="Password" passwordCheck="passwordCheck"
                           type="password" required="">
                    <div class="icon-agile">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="submit-w3l">
                    <input id="administrator_submit" name="administrator_submit" type="submit" value="Add administrator">
                </div>
            </form>
        </div>

        <div id="departmentForm" class="adminForm form-w3-agile" style="display: none;">
            <h2>Department</h2>
            <form action="../php/admin_actions.php" method="post">
                <div class="form-sub-w3">
                    <input name="department" placeholder="Department" class="department" type="text" required="">
                </div>

                <input name="department_submit" type="submit" value="Add department">
            </form>
        </div>

        <div id="classForm" class="adminForm form-w3-agile" style="display: none;">
            <h2>Class</h2>
            <form action="../php/admin_actions.php" method="post">
                <div class="form-sub-w3">
                    <input name="class" placeholder="Class" class="class" type="text" required="">
                </div>
                <input name="class_submit" type="submit" value="Add class">
            </form>
        </div>
    </div>

    <script>
        $('#addTeacher').click(function() {
            $('#teacherForm').toggle('slow', function() {
                // Animation complete.
            });
        });

        $('#addDepartment').click(function() {
            $('#departmentForm').toggle('slow', function() {
                // Animation complete.
            });
        });

        $('#addClass').click(function() {
            $('#classForm').toggle('slow', function() {
                // Animation complete.
            });
        });

        $('#addStudent').click(function() {
            $('#studentForm').toggle('slow', function() {
                // Animation complete.
            });
        });

        $('#addAdministrator').click(function() {
            $('#administratorForm').toggle('slow', function() {
                // Animation complete.
            });
        });

//        $('#administrator_submit').click(function() {
//            $.get("../php/admin_actions", function(data){
//                if (data == "Success") {
//                    alert("Success");
//                }
//            });
//        });
    </script>

    <div class="footer">
        <span>© 2017 Online Classbook . All rights reserved</span>
    </div>

</body>
</html>