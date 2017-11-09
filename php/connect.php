<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 23.10.2017
 * Time: 13:05
 */
function dbConnect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "classbook";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>