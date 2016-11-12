
<?php
require_once('header.php');
require_once('authentication.php');
if(!checkLogin()){
    header('Location: home.php');
}
?>

<html>
<head>
    <style type="text/css">
        body
        {
            background:url(bg.jpg);
        }
    </style>
</head>
<body>

<div class="container text-center">
    <br><br><br><br><br><br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="well">
                <img src="not_successful.jpg" class="img-circle"><br><br>
                <p><b>The username is already taken.</p>
                <p>Click here to sign up again</p>
                <button type="button" class="btn btn-info"><a href="teacher_sign_up.php" style="color: black;">Signup</b></a></button>
            </div>
        </div>
    </div>

</body>
</html>
