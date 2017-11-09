<?php
/**
 * Created by PhpStorm.
 * User: Flaviu
 * Date: 23.10.2017
 * Time: 14:48
 */
function logout($loggedEmail, $loggedIn) {

    session_start();
    unset ($_SESSION ['loggedEmail'] );
    unset($_SESSION['loggedIn']);
    header ('Location: ../index.php');
}

logout($_SESSION['loggedEmail'], $_SESSION['loggedIn']);

