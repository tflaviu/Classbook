<!DOCTYPE html>
<html>
<head>
    <title>Api Documentation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/header.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/student.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/api_documentation.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<div class="header">
    <div class="title">
        <span class="title_span">Api Documentation</span>
        <span class="version">0.1.0</span>
    </div>
</div>

<div class="body">
    <div class="table_div">
        <table>
            <tr>
                <th>Api name</th>
                <th>Api url</th>
                <th>Parameters</th>
                <th>Response</th>
            </tr>
            <tr>
                <td>Register</td>
                <td>
                    api/register_api <br>
                    Method: Post
                </td>
                <td>
                    <ul>
                        <li>
                            user_name* (string)
                        </li>
                        <li>
                            email* (string)
                        </li>
                        <li>
                            password* (string)
                        </li>
                        <li>
                            confirm_password* (string)
                        </li>
                    </ul>
                </td>
                <td>
                    { <br>
                    &nbsp &nbsp &nbsp &nbsp "status":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "success":true, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "error":"" <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp}, <br>
                    &nbsp &nbsp &nbsp &nbsp "data":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "message":"Account succesfully created!"<br>
                    &nbsp &nbsp &nbsp &nbsp } <br>
                    } <br>
                </td>
            </tr>
            <tr>
                <td>Login</td>
                <td>
                    api/login_api <br>
                    Method: Post
                </td>
                <td>
                    <ul>
                        <li>
                            email* (string)
                        </li>
                        <li>
                            password* (string)
                        </li>
                    </ul>
                </td>
                <td>
                    { <br>
                    &nbsp &nbsp &nbsp &nbsp "status":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "success":true, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "error":"" <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp }, <br>
                    &nbsp &nbsp &nbsp &nbsp "data":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "loggedEmail":"student@student.ro"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "loggedIn":true<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "user_type":"2"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "user_name":"Student"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "id_user":"7"<br>
                    &nbsp &nbsp &nbsp &nbsp } <br>
                    } <br>
                </td>
            </tr>
            <tr>
                <td>Show students</td>
                <td>
                    api/show_students_api <br>
                    Method: Post
                </td>
                <td>
                    <ul>
                        <li>
                            id_teacher* (int)
                        </li>
                    </ul>
                </td>
                <td>
                    { <br>
                    &nbsp &nbsp &nbsp &nbsp "status":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "success":true, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "error":"" <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp }, <br>
                    &nbsp &nbsp &nbsp &nbsp "data":[ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp { <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "id_user":"36"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "user_name":"Flaaaviiiiuuuu"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ""email"":"test@test.ro"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp }, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp { <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "id_user":"7"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "user_name":"Student"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ""email"":"student@student.ro"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp }, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp { <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "id_user":"7"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "user_name":"Student"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ""email"":"student@student.ro"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp } <br>
                    &nbsp &nbsp &nbsp ] <br>
                    } <br>
                </td>
            </tr>
            <tr>
                <td>Submit grade</td>
                <td>
                    api/submit_grade_api <br>
                    Method: Post
                </td>
                <td>
                    <ul>
                        <li>
                            student* (string)
                        </li>
                        <li>
                            grade* (string)
                        </li>
                        <li>
                            id_teacher* (int)
                        </li>
                    </ul>
                </td>
                <td>
                    { <br>
                    &nbsp &nbsp &nbsp &nbsp "status":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "success":true, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "error":"" <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp }, <br>
                    &nbsp &nbsp &nbsp &nbsp "data":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "message":"Grade successfully submited!"<br>
                    &nbsp &nbsp &nbsp &nbsp } <br>
                    } <br>
                </td>
            </tr>
            <tr>
                <td>Edit grade</td>
                <td>
                    api/edit_grade_api <br>
                    Method: Post
                </td>
                <td>
                    <ul>
                        <li>
                            id_student* (int)
                        </li>
                        <li>
                            new_grade* (float)
                        </li>
                    </ul>
                </td>
                <td>
                    { <br>
                    &nbsp &nbsp &nbsp &nbsp "status":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "success":true, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "error":"" <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp }, <br>
                    &nbsp &nbsp &nbsp &nbsp "data":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "message":"Grade successfully edited!"<br>
                    &nbsp &nbsp &nbsp &nbsp } <br>
                    } <br>
                </td>
            </tr>
            <tr>
                <td>Classes</td>
                <td>
                    api/classes_api <br>
                    Method: Post
                </td>
                <td>
                    <ul>
                        <li>
                            id_student* (int)
                        </li>
                    </ul>
                </td>
                <td>
                    { <br>
                    &nbsp &nbsp &nbsp &nbsp "status":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "success":true, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "error":"" <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp }, <br>
                    &nbsp &nbsp &nbsp &nbsp "data":[ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp { <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "class":"Baze de date"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp }, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp { <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "class":"Romana"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp } <br>
                    &nbsp &nbsp &nbsp ] <br>
                    } <br>
                </td>
            </tr>
            <tr>
                <td>Grades</td>
                <td>
                    api/grades_api <br>
                    Method: Post
                </td>
                <td>
                    <ul>
                        <li>
                            id_student* (int)
                        </li>
                    </ul>
                </td>
                <td>
                    { <br>
                    &nbsp &nbsp &nbsp &nbsp "status":{ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "success":true, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "error":"" <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp }, <br>
                    &nbsp &nbsp &nbsp &nbsp "data":[ <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp { <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "class_name":"Baze de date"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "grade":"9"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp }, <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp { <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "class_name":"Romana"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "grade":"9"<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp } <br>
                    &nbsp &nbsp &nbsp ] <br>
                    } <br>
                </td>
            </tr>
        </table>

    </div>
</div>

<div class="footer">

</div>
</body>
</html>