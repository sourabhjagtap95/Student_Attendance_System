<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <style type="text/css">

        ul{
            margin-top: 5px;
        }
        .nav-tabs{
            border-bottom: 0px;
        }
           
        .logo
        {
            height:30px; 
            width:160px;
        }
        .navbar-nav
        {
            margin-top: 8px;
        }
        .navbar-right
        {
            margin-top: 5px;

        }
        nav
        {
            position: static;
        }
        </style>


</head>
<body>

    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"> 
        <a href="#" class="navbar-brand"><img src="mit_logo.png" class="logo" height="30px" width="160px" /></a>
    </div>
    <div>
        <ul class="nav navbar-nav">
           <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="campus.php">Campus</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="Sign_up_as.php"><button type="button" class="btn btn-primary">Create account</button></a></li>
            <li><a href="login.php"><button type="button" class="btn btn-info"> Sign In</button></a></li>
        </ul>
    </div>
    </div>
    </nav>
</body>
</html>