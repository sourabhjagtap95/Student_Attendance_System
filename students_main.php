<?php
require_once('student_header.php');
require_once('authentication.php');
if(!checkLogin()){
    header('Location: home.php');
}
?>
<html>
<head>
<style type="text/css">
body{
    text-align: center;
}
body{
                background-image: url(bg.jpg);
                background-repeat: no-repeat;
                background-size: cover;
        }
.well
 {
    text-align: center;
 }
 
 .col-md-4
 {
    margin-top: 200px;
 }

</style>

</head>
<body>
    <div class="container">
    <div class="row">
        
        <div class="col-md-4 col-md-offset-1">
            <a href="see_attendance.php"><div class="well" class="text-center">
            <img src="attendance.png" class="img-circle"><br><br>
            <b>SEE ATTENDANCE</b>
        </div></a>
    </div>
        <div class="col-md-4 col-md-offset-2">
            <a href="check_schedule.php"><div class="well">
            <img src="schedule.png" class="img-circle"><br><br>
            <b>CHECK SCHEDULE</b>
            </div></a>
        </div>
         <div class="col-md-2"></div>

</body>
</html>