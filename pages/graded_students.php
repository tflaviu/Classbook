<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <?php
    include_once "../php/teacher_commands.php";
    $array = show_graded_students();
    foreach ($array as $key => $n) { ?>
        <div class="student_row">
            <span><?php echo $array[$key][0]; ?></span>
            <span><?php echo $array[$key][1]; ?></span>
            <span><?php echo $array[$key][2]; ?></span>
            <span><?php echo $array[$key][3]; ?></span>
            <span><a href="grade_edit.php?id=<?php echo $array[$key][0];?>">Edit</a></span>
            <span><a href="grade_delete.php?id='<?php echo $array[$key][0];?>'">Delete</a></span>
        </div>
    <?php }
    ?>
</body>
</html>