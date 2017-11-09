<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 03.11.2017
 * Time: 12:31
 */

include_once("../php/connect.php");
$db = dbConnect();

?>
<?php
    $sql = "SELECT id_user, user_name, email FROM users WHERE user_type = '2' AND id_user NOT IN ( SELECT fk_user FROM student_department )";
    $result = $db->query($sql);
    echo "<form action='../php/admin_actions.php' method='post'>";
    while ($row = $result->fetch_assoc()) {
        echo "<input type='checkbox' name=\"checked_student[]\" value="; echo $row['id_user']; echo "/>
            <select name=\"select_department[]\">";
                echo "<option value=\"dep\">Department</option>";
                $sql2 = "SELECT * FROM departments";
                $result2 = $db->query($sql2);
                while ($row2 = $result2->fetch_assoc()) {
                echo "<option value=\""; echo $row2['id_department']; echo "\">"; echo $row2['department_name']; echo "</option>";
                }
            echo "</select>" . ' ';
            echo $row['user_name'] . ' ' . $row['email'] . "<br>";
     }
    echo "<input method='post' action='../php/admin_actions' name = 'stdToDep_submit' type='submit' value='Submit'/>";
    echo "</form>";
