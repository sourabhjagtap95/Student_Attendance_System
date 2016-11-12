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
                <img src="success.jpg" class="img-circle"><br><br>
                <p><b>Data Inserted Successfully</p>
                <p>Click here to login</p>
                <button type="button" class="btn btn-info"><a href="login.php">Login</b></a></button>
            </div>
        </div>
    </div>
</div>
</body>
</html>