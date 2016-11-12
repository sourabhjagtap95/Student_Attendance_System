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
            position: static;;
        }
        </style>


</head>
<body>

    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"> 
        <a href="teachers_main.php" class="navbar-brand"><img src="mit_logo.png" class="logo" height="30px" width="160px" /></a>
    </div>
    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="teachers_main.php">Home</a></li>
            <li><a href="about_after_login.php">About</a></li>
            <li><a href="attendance.php">Enter Attendance</a></li>
            <li><a href="view_attendance.php">View Attendance</a></li>
            <li><a href="subject_details.php">Subject Details</a></li>
            <li><a href="teacher_profile.php">Your Profile</a></li>
            <a href="logout.php" style="margin-right:10px; float:right;" class="btn btn-danger">Logout</a>
        </ul>
       <!--  <ul class="nav navbar-nav navbar-right">
            <li><a href="Sign_up_as.php"><button type="button" class="btn btn-primary">Create account</button></a></li>
            <li><a href="login.php"><button type="button" class="btn btn-info"> Sign In</button></a></li>
        </ul> -->
    </div>
    </div>
    </nav>
</body>
</html>