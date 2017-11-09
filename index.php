<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Credit Login / Register Form a Responsive Widget Template :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="Credit Login / Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <!-- Custom Theme files -->
    <link href="vendors/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/form_style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- //web font -->
</head>
<body>

<?php
session_start();
//    if ($_SESSION['loggedIn'] && $_SESSION['loggedIn'] == true) {
//        header("Location: student.php");
//    }
//?>

<h1>Online Classbook</h1>
<div class="main-agileits">
    <!--form-stars-here-->
    <div class="form-w3-agile">
        <h2>Classbook login form</h2>
        <form action="#" method="post">
            <div class="form-sub-w3">
                <input type="text"  id="login_email" name="login_email" placeholder="Email "/>
                <div class="icon-w3">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-sub-w3">
                <input type="password" name="login_password" id="login_password" placeholder="Password"/>
                <div class="icon-w3">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
            </div>
            <p class="p-bottom-w3ls">Are you new to Online Class?<a class="w3_play_icon1" href="#small-dialog1"> Register
                    here</a></p>

            <div class="submit-w3l">
                <input name="login_submit" id="login" type="button" value="Login">
            </div>
        </form>
    </div>

    <!--//form-ends-here-->
</div>
<div id="small-dialog1" class="mfp-hide">
    <div class="contact-form1">
        <div class="contact-w3-agileits">
            <h3>Register Form</h3>
            <form id="register-form" action="php/register.php" method="post">
                <div class="form-sub-w3ls">
                    <input name="reg_user_name" placeholder="Name" type="text">
                    <div class="icon-agile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3ls">
                    <input name="reg_email" placeholder="Email" class="mail" type="email">
                    <div class="icon-agile">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3ls">
                    <input id="password" name="reg_password" placeholder="Password" passwordCheck="passwordCheck"
                           type="password">
                    <div class="icon-agile">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3ls">
                    <input id="reg_confirm_password" placeholder="Confirm Password" name="reg_confirm_password"
                           type="password">
                    <div class="icon-agile">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    </div>
                </div>
        </div>
        <div class="submit-w3l">
            <input id="reg_submit" name="reg_submit" type="submit" value="Register">
        </div>
        </form>
    </div>
</div>

<!-- copyright -->
<div class="copyright w3-agile">
    <p> © 2017 Online Classbook . All rights reserved | Design by <a href="http://w3layouts.com/"
                                                                                 target="_blank">W3layouts</a></p>
</div>
<!-- //copyright -->
<script type="text/javascript" src="vendors/jquery-2.1.4.min.js"></script>
<!-- pop-up-box -->
<script src="vendors/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script src="js/form-validation.js"></script>
<!--//pop-up-box -->
<script>
    $(document).ready(function () {
        $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });
    });

    $("#register-form").validate({
        rules: {
            reg_user_name: "required",
            reg_email: "required",
            reg_password: {
                required: true,
                minlength: 8,
                passwordCheck: true
            },
            reg_confirm_password: {
                equalTo: "#password"
            },
            register_checkbox: "required"
        },
        messages: {
            reg_user_name: "Please enter your name.",
            reg_email: "Please provide an email account",
            reg_password: {
                required: "Please provide a password",
                minlength: "Password must be at least 8 characters",
                passwordCheck: "Password must contain at least a capital letter and a number"
            },
            reg_confirm_password: "Passwords don't match",
            register_checkbox: "Check the checkbox"
        },
        errorPlacement: function (label, element) {
            label.addClass('error_span');
            label.insertAfter(element);
        },
        wrapper: 'span'
    });

    jQuery.validator.addMethod("passwordCheck",
        function (value, element, param) {
            if (this.optional(element)) {
                return true;
            } else if (!/[A-Z]/.test(value)) {
                return false;
            } else if (!/[a-z]/.test(value)) {
                return false;
            } else if (!/[0-9]/.test(value)) {
                return false;
            }

            return true;
        },);

</script>
</body>
</html>